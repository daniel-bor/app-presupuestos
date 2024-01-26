<?php

namespace App\Filament\Resources\PresupuestoFuncionalResource\Pages;

use App\Filament\Resources\PresupuestoFuncionalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPresupuestoFuncional extends EditRecord
{
    protected static string $resource = PresupuestoFuncionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
