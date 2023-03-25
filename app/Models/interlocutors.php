<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class interlocutors extends Model
{
    use HasFactory;

    protected $table = 'interlocutors';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    public $timestamps = false;

    public function cartaTrucades()
    {
        return $this->hasMany(cartes_trucades::class, 'interlocutors_id');
    }
}
