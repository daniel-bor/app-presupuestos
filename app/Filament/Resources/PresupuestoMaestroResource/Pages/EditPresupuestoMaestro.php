<?php

namespace App\Filament\Resources\PresupuestoMaestroResource\Pages;

use App\Filament\Resources\PresupuestoMaestroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPresupuestoMaestro extends EditRecord
{
    protected static string $resource = PresupuestoMaestroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
