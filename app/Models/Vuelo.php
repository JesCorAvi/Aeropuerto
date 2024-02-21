<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;

    public function aeropuertoLlegada()
    {
        return $this->belongsTo(Aeropuerto::class, 'aeropuerto_llegada_id');
    }

    // Relación con el aeropuerto de salida
    public function aeropuertoSalida()
    {
        return $this->belongsTo(Aeropuerto::class, 'aeropuerto_salida_id');
    }

    public function compañia(){
        return $this->belongsTo(Compañia::class);
    }

    public function reservas(){
        return $this->hasMany(Reserva::class);
    }
}
