<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProviderResource\Pages;
use App\Models\Provider;
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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class ProviderResource extends Resource
{
    protected static ?string $model = Provider::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([

            Section::make('Provider Info')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('name_en')->label('Name (EN)')->required(),
                        TextInput::make('name_ar')->label('Name (AR)')->required(),

                        Select::make('subcategory_id')
                            ->label('Subcategory')
                            ->relationship('subcategory', 'name_en')
                            ->required(),

                        TextInput::make('phone')->tel()->nullable(),
                        TextInput::make('whatsapp')->tel()->nullable(),

                        TextInput::make('location_en')->label('Location (EN)')->nullable(),
                        TextInput::make('location_ar')->label('Location (AR)')->nullable(),

                        TextInput::make('latitude')->numeric()->nullable(),
                        TextInput::make('longitude')->numeric()->nullable(),
                    ]),
                ]),

            Section::make('Bio')
                ->schema([
                    Textarea::make('bio_en')->label('Bio (EN)')->rows(3)->nullable(),
                    Textarea::make('bio_ar')->label('Bio (AR)')->rows(3)->nullable(),
                ]),

            Section::make('Media')
                ->schema([
                    FileUpload::make('profile_image')
                        ->label('Profile Image')
                        ->image()
                        ->disk('public')
                        ->directory('provider_profiles')
                        ->imagePreviewHeight(100)
                        ->nullable(),

                    FileUpload::make('work_images')
                        ->label('Work Images')
                        ->disk('public')
                        ->directory('provider_work')
                        ->multiple()
                        ->image()
                        ->imagePreviewHeight(100)
                        ->reorderable()
                        ->nullable(),

                    FileUpload::make('portfolio_file')
                        ->label('Portfolio File')
                        ->disk('public')
                        ->directory('provider_files')
                        ->acceptedFileTypes(['application/pdf', 'application/zip', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                        ->nullable(),
                ]),

            Section::make('Visibility')
                ->schema([
                    Forms\Components\Toggle::make('is_active')
                        ->label('Active')
                        ->default(true),
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
            ->columns([
                ImageColumn::make('profile_image')
                    ->disk('public')
                    ->circular()
                    ->size(40)
                    ->label('Avatar'),

                TextColumn::make('name_en')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subcategory.name_en')
                    ->label('Subcategory')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d M Y')
                    ->sortable()
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
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
