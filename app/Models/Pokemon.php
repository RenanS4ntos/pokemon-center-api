<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    //
    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }
    public function appointments() {
        return $this->hasMany(Appointment::class);
    }
    public function medicalRecords() {
        return $this->hasMany(MedicalRecord::class);
    }
}
