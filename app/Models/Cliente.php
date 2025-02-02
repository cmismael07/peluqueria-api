<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre', 'telefono', 'email'];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
