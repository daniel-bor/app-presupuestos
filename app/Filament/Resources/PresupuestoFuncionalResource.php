<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PresupuestoFuncionalResource\Pages;
use App\Filament\Resources\PresupuestoFuncionalResource\RelationManagers;
use App\Models\PresupuestoSecundario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PresupuestoFuncionalResource extends Resource
{
    protected static ?string $model = PresupuestoSecundario::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->autofocus()
                    ->required()
                    ->maxLength(255)
                    ->placeholder(__('Nombre del presupuesto funcional')),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->columnSpan(1)
                    ->minValue(0)
                    ->maxValue(9999999999.99),
                Forms\Components\Datepicker::make('fecha_inicio')
                    ->native(false)
                    ->seconds(false)
                    ->required()
                    ->columnSpan(1)
                    ->minDate('2024-01-01')
                    ->maxDate('2028-12-31'),
                Forms\Components\Datepicker::make('fecha_fin')
                    ->native(false)
                    ->seconds(false)
                    ->required()
                    ->columnSpan(1)
                    ->minDate('2024-01-01')
                    ->maxDate('2028-12-31'),
                Forms\Components\Select::make('presupuesto_primario_id')
                    ->relationship('presupuestoPrimario', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_inicio')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_fin')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('presupuestoPrimario.nombre')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
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
            RelationManagers\GastosRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPresupuestoFuncionals::route('/'),
            'create' => Pages\CreatePresupuestoFuncional::route('/create'),
            'edit' => Pages\EditPresupuestoFuncional::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Presupuestos Funcionales';
    }

    public static function getLabel(): string
    {
        return 'Presupuesto Funcional'; // Nombre en singular
    }

    public static function getPluralLabel(): string
    {
        return 'Presupuestos Funcionales'; // Nombre en plural
    }
}
