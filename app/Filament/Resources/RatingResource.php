<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RatingResource\Pages;
use App\Filament\Resources\RatingResource\RelationManagers;
use App\Models\Rating;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Illuminate\Support\Collection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RatingResource extends Resource
{
    protected static ?string $model = Rating::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Providers';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('provider_id')
                    ->relationship('provider', 'name_en')
                    ->searchable()
                    ->required(),

                TextInput::make('name')
                    ->label('Reviewer Name')
                    ->maxLength(255),

                Textarea::make('comment')
                    ->maxLength(1000),

                TextInput::make('rating')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5),

                Toggle::make('approved')
                    ->label('Approved'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('provider.name_en'),
                TextColumn::make('name'),
                TextColumn::make('rating'),
                TextColumn::make('comment')->limit(50),
                IconColumn::make('approved')->boolean(),
                TextColumn::make('created_at')->dateTime('d M Y'),
            ])
            ->bulkActions([
                BulkAction::make('approve')
                    ->label('Approve Selected')
                    ->icon('heroicon-o-check-circle')
                    ->action(fn(Collection $records) => $records->each->update(['approved' => true]))
                    ->requiresConfirmation()
                    ->color('success'),
                BulkAction::make('disapprove')
                    ->label('Disapprove Selected')
                    ->icon('heroicon-o-x-circle')
                    ->action(fn(Collection $records) => $records->each->update(['approved' => false]))
                    ->requiresConfirmation()
                    ->color('danger'),
                BulkAction::make('delete')
                    ->label('Delete Selected')
                    ->icon('heroicon-o-trash')
                    ->action(fn(Collection $records) => $records->each->delete())
                    ->requiresConfirmation()
                    ->color('danger'),
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
            'index' => Pages\ListRatings::route('/'),
            'create' => Pages\CreateRating::route('/create'),
            'edit' => Pages\EditRating::route('/{record}/edit'),
        ];
    }
}
