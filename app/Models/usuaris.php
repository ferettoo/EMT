<?php

namespace App\Models;


use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class usuaris extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuaris';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    public $timestamps = false;

    public function cartaTrucades()
    {
        return $this->hasMany(cartes_trucades::class, 'usuaris_id');
    }


    public function tipusUsuaris()
    {
        return $this->belongsTo(tipus_usuaris::class, 'tipus_usuaris_id');
    }
}


