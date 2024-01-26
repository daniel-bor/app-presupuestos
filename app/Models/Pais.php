<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pais extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function filiales()
    {
        return $this->hasMany(Filial::class);
    }

    public function cuentas()
    {
        return $this->belongsToMany(Cuenta::class, 'cuenta_pais');
    }
}
