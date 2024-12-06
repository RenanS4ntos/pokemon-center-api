<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    //
    public function pokemon() {
        return $this->belongsTo(Pokemon::class);
    }
}
