<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estat_agencies extends Model
{
    use HasFactory;

    protected $table = 'estat_agencies';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    public $timestamps = false;

    public function cartaTrucadesHasAgencies()
    {
        return $this->hasMany(cartes_trucades_has_agencies::class, 'estat_agencies_id');
    }
}
