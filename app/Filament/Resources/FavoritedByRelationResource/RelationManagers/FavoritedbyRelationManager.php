<?php

namespace App\Filament\Resources\FavoritedByRelationResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class FavoritedbyRelationManager extends RelationManager
{
    protected static string $relationship = 'favoritedby'; 

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('User Name'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
            ])
            ->headerActions([]) 
            ->actions([]) 
            ->bulkActions([]); 
    }
}
