<?php

namespace App\Filament\Resources\PresupuestoMaestroResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PresupuestoSecundariosRelationManager extends RelationManager
{
    protected static string $relationship = 'presupuesto_secundarios';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
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
                    ->minDate('2024-01-02')
                    ->maxDate('2028-12-31'),
                Forms\Components\Radio::make('autorizado')
                    ->label('Autorizado')
                    ->boolean()
                    ->inline()
                    ->inlineLabel(false),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nombre')
            ->columns([
                Tables\Columns\TextColumn::make('nombre'),
                Tables\Columns\TextColumn::make('fecha_inicio'),
                Tables\Columns\TextColumn::make('fecha_fin'),
                Tables\Columns\TextColumn::make('total'),
                Tables\Columns\TextColumn::make('presupuestoPrimario.nombre'),
                Tables\Columns\IconColumn::make('autorizado')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]));
    }
}
