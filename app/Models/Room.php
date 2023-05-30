<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'capacidad',
        'num_habitacion',
        'precio',
        'piso_id'
    ];
    public function empleados(){
        return $this->belongsToMany(Staff::class, 'staff_room', 'staff_id', 'room_id', 'id', 'id')->withPivot('fecha_staff', 'hora')->withTimestamps();
    }
    public function reservation(){
        return $this->belongsToMany(Reservation::class, 'reservation_room', 'reservation_id', 'room_id', 'id', 'id')->withTimestamps();
    }
    public function floor(){
        return $this->belongsTo(Floor::class);
    }

}
