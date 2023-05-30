<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'franja_horaria',
    ];
    public function staff(){
        return $this->belongsToMany(Staff::class, 'staff_schedule', 'staff_id', 'schedule_id', 'id', 'id')->withPivot('fecha')->withTimestamps();
    }
}
