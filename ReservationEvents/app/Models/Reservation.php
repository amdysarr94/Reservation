<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Reservation extends Model
{
    use HasFactory, Notifiable;
    function client(){
        return $this->belongsTo(Client::class);
    }
    function evenement(){
        return $this->belongsTo(Evenement::class);
    }
}
