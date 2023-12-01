<?php

namespace App\Models;

use App\Models\Association;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;
    function association() {
        return $this->belongsTo(Association::class);
    }
    function reservation(){
        return $this->hasMany(Reservation::class);
    }

}
