<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresupuestoSecundario extends Model
{
    use HasFactory;

    public function presupuestoPrimario()
    {
        return $this->belongsTo(PresupuestoPrimario::class);
    }

    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }
}
