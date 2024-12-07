<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    protected $table = 'appointments';

    protected $fillable = [
        'pokemon_id',
        'doctor_id',
        'appointment_date',
        'notes',
        'status',
    ];

    public function pokemon()
    {
        return $this->belongsTo(Pokemon::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}