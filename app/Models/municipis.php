<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipis extends Model
{
    use HasFactory;

    protected $table = 'municipis';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    public $timestamps = false;

    public function cartaTrucades()
    {
        return $this->hasMany(cartes_trucades::class, 'municipis_id');
    }

    public function comarques()
    {
        return $this->belongsTo(comarques::class, 'comarques_id');
    }

    public function agencies()
    {
        return $this->hasMany(agencies::class, 'municipis_id');
    }
}
