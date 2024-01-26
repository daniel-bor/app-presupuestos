<?php

namespace App\Filament\Resources\PresupuestoFuncionalResource\Pages;

use App\Filament\Resources\PresupuestoFuncionalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPresupuestoFuncionals extends ListRecords
{
    protected static string $resource = PresupuestoFuncionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
