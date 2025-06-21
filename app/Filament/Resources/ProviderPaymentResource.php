<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ProviderPaymentResource\Pages;
use App\Models\ProviderPayment;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;

class ProviderPaymentResource extends Resource
{
    protected static ?string $model = ProviderPayment::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Provider Payments';
    protected static ?string $navigationGroup = 'Finance';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('provider_id')
                ->relationship('provider', 'name_en')
                ->required()
                ->searchable(),

            DatePicker::make('payment_date')
                ->required(),

            TextInput::make('amount')
                ->numeric()
                ->required(),

            TextInput::make('method')
                ->label('Payment Method')
                ->default('cash')
                ->required(),

            TextInput::make('reference')
                ->label('Reference ID')
                ->nullable(),

            TextInput::make('period')
                ->label('Payment Period')
                ->placeholder('e.g. June 2025')
                ->nullable(),

            Textarea::make('notes')
                ->nullable()
                ->rows(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('provider.name_en')
                    ->label('Provider')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('payment_date')
                    ->date()
                    ->sortable(),

                TextColumn::make('amount')
                    ->money('USD', true)
                    ->sortable(),

                TextColumn::make('method')
                    ->label('Method'),

                TextColumn::make('period')
                    ->label('Period')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->label('Created'),
            ])
            ->defaultSort('payment_date', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProviderPayments::route('/'),
            'create' => Pages\CreateProviderPayment::route('/create'),
            'edit' => Pages\EditProviderPayment::route('/{record}/edit'),
        ];
    }
}
