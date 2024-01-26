<?php

namespace App\Filament\Resources\PresupuestoFuncionalResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GastosRelationManager extends RelationManager
{
    protected static string $relationship = 'gastos';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('concepto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('descripcion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cantidad')
                    ->required()
                    ->numeric()
                    ->columnSpan(1)
                    ->minValue(0)
                    ->maxValue(9999999999.99),
                Forms\Components\TextInput::make('precio_unitario')
                    ->required()
                    ->numeric(2)
                    ->columnSpan(1)
                    ->minValue(0)
                    ->maxValue(9999999999.99),
                Forms\Components\Select::make('cuenta_id')
                    ->options(function () {
                        $presupuestoSecundario = $this->ownerRecord; // Acceder al modelo principal
                        if (!$presupuestoSecundario) {
                            return [];
                        }

                        $pais = $presupuestoSecundario->presupuestoPrimario->filial->pais;

                        return $pais->cuentas->pluck('nombre', 'id');
                    })
                    ->label('Cuenta')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Radio::make('ejecutado')
                    ->label('Ejecutado')
                    ->boolean()
                    ->inline()
                    ->inlineLabel(false),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('concepto')
            ->columns([
                Tables\Columns\TextColumn::make('concepto'),
                Tables\Columns\TextColumn::make('descripcion'),
                Tables\Columns\TextColumn::make('cantidad'),
                Tables\Columns\TextColumn::make('precio_unitario'),
                Tables\Columns\TextColumn::make('cuenta.nombre')
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
