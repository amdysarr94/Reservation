<?php

namespace App\Models;

use App\Models\Evenement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Association extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;
    function evenement() {
        return $this->hasMany(Evenement::class);
     }
}
