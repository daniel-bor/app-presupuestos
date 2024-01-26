<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\PresupuestoMaestro;
use App\Models\PresupuestoPrimario;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PresupuestoMaestroResource\Pages;
use App\Filament\Resources\PresupuestoMaestroResource\RelationManagers;
use Illuminate\Database\Eloquent\Factories\Relationship;

class PresupuestoMaestroResource extends Resource
{
    protected static ?string $model = PresupuestoPrimario::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->maxLength(255)
                    ->columnSpanFull(),
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
                    ->minDate('2024-01-02')
                    ->maxDate('2028-12-31'),
                Forms\Components\Select::make('filial_id')
                    ->relationship('filial', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->columnSpan(1)
                    ->minValue(0)
                    ->maxValue(9999999999.99),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_inicio')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_fin')
                    ->searchable()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('duracion')
                //     ->formatStateUsing(function ($record) {
                //         // $fechaInicio = Carbon::parse($record->fecha_inicio);
                //         // $fechaFin = Carbon::parse($record->fecha_fin);

                //         // return $fechaFin->diffInMonths($fechaInicio) . ' meses'; // O el formato que prefieras
                //         return $record;
                //     }),
                Tables\Columns\TextColumn::make('filial.nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->searchable()
                    ->sortable()
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
            RelationManagers\PresupuestoSecundariosRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPresupuestoMaestros::route('/'),
            'create' => Pages\CreatePresupuestoMaestro::route('/create'),
            'edit' => Pages\EditPresupuestoMaestro::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Presupuestos Maestros';
    }

    public static function getLabel(): string
    {
        return 'Presupuesto Maestro'; // Nombre en singular
    }

    public static function getPluralLabel(): string
    {
        return 'Presupuestos Maestros'; // Nombre en plural
    }
}
