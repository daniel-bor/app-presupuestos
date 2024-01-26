<?php

namespace App\Filament\Resources\PresupuestoMaestroResource\Pages;

use App\Filament\Resources\PresupuestoMaestroResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPresupuestoMaestros extends ListRecords
{
    protected static string $resource = PresupuestoMaestroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
