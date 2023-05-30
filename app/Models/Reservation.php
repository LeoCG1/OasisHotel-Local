<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'personas',
        'fecha_ingreso',
        'fecha_salida',
        'user_id',
        'client_id'
    ];
    public function clients(){
        return $this->belongsTo(Clients::class);
    }
    public function users(){
        return $this->belongsTo(Users::class);
    }
    public function room(){
        return $this->belongsToMany(Room::class, 'reservation_room', 'reservation_id', 'room_id', 'id', 'id')->withTimestamps();
    }
    public function payment(){
        return $this->hasOne(Payment::class);
    }
}
