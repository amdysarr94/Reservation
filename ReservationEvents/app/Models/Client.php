<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Notifications\Notifiable;
class Client extends Model implements Authenticatable
{
    use HasFactory, Notifiable;
    use AuthenticableTrait;
    function reservation(){
        return $this->hasMany(Reservation::class);
    }
    
}
