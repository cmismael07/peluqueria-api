<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    protected $fillable = ['cita_id', 'descripcion', 'fecha_atencion'];

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }
}
