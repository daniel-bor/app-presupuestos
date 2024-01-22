<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }

    public function presupuestoSecundario()
    {
        return $this->belongsTo(PresupuestoSecundario::class);
    }
}
