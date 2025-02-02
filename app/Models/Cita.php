<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['cliente_id', 'fecha', 'hora', 'estado'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function atencion()
    {
        return $this->hasOne(Atencion::class);
    }
}
