<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gasto extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }

    public function presupuestoSecundario()
    {
        return $this->belongsTo(PresupuestoSecundario::class);
    }
}
