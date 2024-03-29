<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PresupuestoPrimario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['fecha_inicio', 'fecha_fin'];


    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }

    public function presupuestosSecundarios()
    {
        return $this->hasMany(PresupuestoSecundario::class);
    }

    public function presupuesto_secundarios()
    {
        return $this->hasMany(PresupuestoSecundario::class);
    }
}
