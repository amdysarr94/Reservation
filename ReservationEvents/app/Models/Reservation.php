<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    function client(){
        return $this->belongsTo(Client::class);
    }
    function evenement(){
        return $this->belongsTo(Evenement::class);
    }
}
