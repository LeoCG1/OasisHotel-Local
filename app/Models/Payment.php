<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'concepto',
        'direccion',
        'num_tarjeta',
        'total',
        'reservation_id'
    ];

    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }

}
