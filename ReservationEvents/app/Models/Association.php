<?php

namespace App\Models;

use App\Models\Evenement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Notifications\Notifiable;
class Association extends Model implements Authenticatable
{
    use HasFactory, Notifiable;
    use AuthenticableTrait;
    function evenement() {
        return $this->hasMany(Evenement::class);
     }
}
