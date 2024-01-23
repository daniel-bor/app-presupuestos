<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    use HasFactory;

    public function presupuestosPrimarios()
    {
        return $this->hasMany(PresupuestoPrimario::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

}
