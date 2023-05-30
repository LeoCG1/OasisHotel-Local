<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Clients extends Model
{
    use HasFactory;
    protected $primaryKey = 'dni';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'dni',
        'nombre',
        'apellidos',
        'direccion',
        'telefono',
        'email',
        'tipo_cliente',
        'user_id'
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
    
    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
    public function payment():HasManyThrough
    {
        return $this->hasManyThrough(
            Payment::class, 
            Reservation::class,
            'client_id',
            'reservation_id',
            'dni',
            'id');
    }
}
