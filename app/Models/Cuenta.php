<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuenta extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }

    public function paises()
    {
        return $this->belongsToMany(Pais::class, 'cuenta_pais');
    }

}
