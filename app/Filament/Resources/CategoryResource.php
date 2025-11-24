<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Categories';
    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Category Info')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name_en')
                                    ->label('Name (English)')
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('slug', Str::slug($state));
                                    }),
                                TextInput::make('name_ar')->label('Name (Arabic)')->required(),
                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->unique(ignoreRecord: true) 
                                    ->helperText('Used in URLs or API routes'),
                                Select::make('parent_id')
                                    ->label('Parent Category')
                                    ->relationship('parent', 'name_en', fn ($query) => $query->whereNull('parent_id'))
                                    ->searchable()
                                    ->preload()
                                    ->helperText('Leave empty for a top-level category'),
                            ]),
                    ]),

                Section::make('')
                    ->columns(1)
                    ->schema([
                        FileUpload::make('image')
                            ->label('Category Image')
                            ->disk('public')
                            ->directory('category_images')
                            ->hint('Recommended: 300x300 pixels')
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->imagePreviewHeight(100),


                    ]),
                Section::make('Status & Display Order')
                    ->schema([
                        Grid::make(10)
                            ->schema([
                                Select::make('priority')
                                    ->label('Priority')
                                    ->options(
                                        collect(range(1, \App\Models\Category::count() ?: 10))
                                            ->mapWithKeys(fn($i) => [$i => "Priority $i"])
                                            ->toArray()
                                    )
                                    ->required()
                                    ->hint('Controls display order')
                                    ->columnSpan(6),


                                Toggle::make('is_active')
                                    ->label('Visible?')
                                    ->default(true)
                                    ->columnSpan(4)

                            ]),
                    ])
                    ->collapsible(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('public')
                    ->circular()
                    ->size(40)
                    ->label('Icon'),
                TextColumn::make('name_en')
                    ->label('Name (EN)')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name_ar')
                    ->label('Name (AR)')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('parent.name_en')
                    ->label('Parent')
                    ->sortable()
                    ->badge()
                    ->toggleable()
                    ->color('gray'),
                IconColumn::make('is_active')
                    ->label('Visible')
                    ->boolean(),
                TextColumn::make('priority')
                    ->sortable()
                    ->label('Priority'),

            ])
            ->defaultSort('priority', 'asc')
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Visible?')
                    ->trueLabel('Shown')
                    ->falseLabel('Hidden')
                    ->placeholder('All'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
