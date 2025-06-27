<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FavoritedByRelationResource\RelationManagers\FavoritedbyRelationManager;
use App\Filament\Resources\ProviderResource\Pages;
use App\Models\Area;
use App\Models\City;
use App\Models\Provider;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Support\Enums\IconPosition;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class ProviderResource extends Resource
{
    protected static ?string $model = Provider::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Providers';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([

            Section::make('Provider Info')
                ->schema([
                    Grid::make(2)->schema([
                        Select::make('user_id')
                            ->label('User')
                            ->options(function () {
                                return User::where('role_id', 3)
                                    ->whereDoesntHave('provider')
                                    ->get(['id', 'name', 'email'])
                                    ->mapWithKeys(fn($user) => [
                                        $user->id => "{$user->name} ({$user->email})"
                                    ]);
                            })
                            ->searchable()
                            ->preload()
                            ->required(),


                        TextInput::make('business_name')->label('Business Name')->required(),

                        Select::make('subcategory_id')
                            ->label('Subcategory')
                            ->relationship('subcategory', 'name_en')
                            ->required(),

                        TextInput::make('profile.phone')->tel()->nullable(),
                        TextInput::make('profile.whatsapp')->tel()->nullable(),
                        Select::make('profile.city_id')
                            ->label('City')
                            ->reactive()
                            ->options(
                                City::orderBy(app()->getLocale() === 'ar' ? 'name_ar' : 'name_en')
                                    ->pluck(app()->getLocale() === 'ar' ? 'name_ar' : 'name_en', 'id')
                            )
                            ->searchable()
                            ->afterStateUpdated(fn($state, callable $set) => $set('area_id', null))
                            ->required(),

                        Select::make('area_id')
                            ->label('Area')
                            ->relationship('profile.area', 'name_en')
                            ->options(function (callable $get) {
                                $cityId = $get('profile.city_id');
                                if (!$cityId) return [];

                                return Area::where('city_id', $cityId)
                                    ->orderBy(app()->getLocale() === 'ar' ? 'name_ar' : 'name_en')
                                    ->pluck(app()->getLocale() === 'ar' ? 'name_ar' : 'name_en', 'id');
                            })
                            ->reactive()
                            ->preload()
                            ->searchable()
                            ->placeholder('Select Area')
                            ->required()
                            ->searchable(),
                        TextInput::make('profile.location')->label('Location')->nullable(),

                        TextInput::make('profile.latitude')->numeric()->nullable(),
                        TextInput::make('profile.longitude')->numeric()->nullable(),

                    ]),
                ]),

            Section::make('Media & Bio')
                ->schema([
                    Textarea::make('profile.bio')->label('Bio')->rows(3)->nullable(),
                    FileUpload::make('media.profile_image')
                        ->label('Profile Image')
                        ->image()
                        ->disk('public')
                        ->directory('provider_profiles')
                        ->imagePreviewHeight(100),

                    FileUpload::make('media.work_images')
                        ->label('Work Images')
                        ->disk('public')
                        ->directory('provider_work')
                        ->multiple()
                        ->image()
                        ->imagePreviewHeight(100)
                        ->reorderable(),

                    FileUpload::make('media.portfolio_file')
                        ->label('Portfolio File')
                        ->disk('public')
                        ->directory('provider_files')
                        ->acceptedFileTypes(['application/pdf', 'application/zip']),
                ]),

            Section::make('Visibility')
                ->schema([
                    Toggle::make('is_active')
                        ->label('Active')
                        ->default(false),

                    Toggle::make('is_featured')
                        ->label('Featured')
                        ->default(false),

                    Select::make('approval_status')
                        ->options([
                            'pending' => 'Pending',
                            'approved' => 'Approved',
                            'rejected' => 'Rejected',
                        ])
                        ->default('pending')
                        ->required(),

                    Textarea::make('rejection_reason')
                        ->label('Rejection Reason')
                        ->visible(fn($get) => $get('approval_status') === 'rejected')
                        ->nullable()
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table

            ->filters([
                SelectFilter::make('subcategory_id')
                    ->relationship('subcategory', 'name_en')
                    ->label('Subcategory'),

                TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->trueLabel('Active')
                    ->falseLabel('Inactive')
                    ->placeholder('All'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('approve')
                        ->label('Approve Providers')
                        ->icon('heroicon-o-check-circle')
                        ->iconPosition(IconPosition::Before)
                        ->requiresConfirmation()
                        ->action(fn($records) => $records->each->update(['approval_status' => 'approved'])),

                    BulkAction::make('reject')
                        ->label('Reject Providers')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->form([
                            Forms\Components\Textarea::make('rejection_reason')
                                ->label('Reason')
                                ->required(),
                        ])
                        ->action(function ($records, array $data) {
                            foreach ($records as $record) {
                                $record->update([
                                    'approval_status' => 'rejected',
                                    'rejection_reason' => $data['rejection_reason'],
                                ]);
                            }
                        }),

                    BulkAction::make('activate')
                        ->label('Activate')
                        ->icon('heroicon-o-bolt')
                        ->action(fn($records) => $records->each->update(['is_active' => true])),

                    BulkAction::make('deactivate')
                        ->label('Deactivate')
                        ->icon('heroicon-o-stop')
                        ->color('danger')
                        ->action(fn($records) => $records->each->update(['is_active' => false])),
                ]),
            ])
            ->columns([
                IconColumn::make('approval_status')
                    ->boolean()
                    ->label('Approval'),

                  IconColumn::make('is_active')
                    ->boolean()
                    ->label('Status'),
       
                ImageColumn::make('profile_image')
                    ->disk('public')
                    ->circular()
                    ->size(40)
                    ->label('Avatar'),

                TextColumn::make('user.name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('business_name')
                    ->label('Business')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subcategory.name_en')
                    ->label('Subcategory')
                    ->sortable()
                    ->badge()
                    ->color('info'),



                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d M Y')
                    ->sortable(),
                TextColumn::make('stat.views')
                    ->label('Views')
                    ->sortable(),

                TextColumn::make('stat.bookings_count')
                    ->label('Bookings')
                    ->sortable(),

                TextColumn::make('stat.reviews_count')
                    ->label('Reviews')
                    ->sortable(),

                TextColumn::make('stat.average_rating')
                    ->label('Rating')
                    ->sortable()
                    ->formatStateUsing(fn($state) => number_format($state, 1)),
                IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),


            ]);
    }

    public static function getRelations(): array
    {
        return [
            FavoritedbyRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProviders::route('/'),
            'create' => Pages\CreateProvider::route('/create'),
            'edit' => Pages\EditProvider::route('/{record}/edit'),
        ];
    }
}
