<?php

namespace App\Filament\Resources\CityResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class AreasRelationManager extends RelationManager
{
    protected static string $relationship = 'areas';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name_en')
                ->label('Name (English)')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('name_ar')
                ->label('Name (Arabic)')
                ->required()
                ->maxLength(255),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_en')
                    ->label('English Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('name_ar')
                    ->label('Arabic Name')
                    ->searchable(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
