<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provincies extends Model
{
    use HasFactory;

    protected $table = 'provincies';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    public $timestamps = false;

    public function cartaTrucades()
    {
        return $this->hasMany(cartes_trucades::class, 'provincies_id');
    }

    public function comarques()
    {
        return $this->hasMany(comarques::class, 'provincies_id');
    }
}
