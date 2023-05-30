<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Staff extends Model
{
    use HasFactory;
    use Notifiable;
    protected $fillable = [
        'nombre',
        'apellidos',
        'fecha_nac',
        'direccion',
        'email',
        'p_trabajo',
        'user_id'
    ];
    public function room(){
        return $this->belongsToMany(Room::class, 'staff_room', 'staff_id', 'room_id', 'id', 'id')->withPivot('fecha_staff', 'hora')->withTimestamps();
    }
    public function schedule(){
        return $this->belongsToMany(Schedule::class, 'staff_schedule', 'staff_id', 'schedule_id', 'id', 'id')->withPivot('fecha')->withTimestamps();
    }
    public function users(){
        return $this->belongsTo(User::class);
    }

}
