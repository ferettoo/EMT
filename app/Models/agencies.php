<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agencies extends Model
{
    use HasFactory;

    protected $table = 'agencies';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    public $timestamps = false;

    public function municipis()
    {
        return $this->belongsTo(municipis::class, 'municipis_id');
    }

    public function cartaTrucadesHasAgencies()
    {
        return $this->hasMany(cartes_trucades_has_agencies::class, 'agencies_id');
    }
}
