<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }

    public function paises()
    {
        return $this->belongsToMany(Pais::class, 'cuenta_pais');
    }

}
