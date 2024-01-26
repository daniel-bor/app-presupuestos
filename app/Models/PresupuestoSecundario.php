<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PresupuestoSecundario extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function presupuestoPrimario()
    {
        return $this->belongsTo(PresupuestoPrimario::class);
    }

    public function gastos()
    {
        return $this->hasMany(Gasto::class, 'presupuesto_secundario_id');
    }
}
