<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incidents extends Model
{
    use HasFactory;

    protected $table = 'incidents';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    public $timestamps = false;


    public function cartaTrucades()
    {
        return $this->hasMany(cartes_trucades::class, 'incidents_id');
    }

    public function tipusIncidents()
    {
        return $this->belongsTo(tipus_incidents::class, 'tipus_incidents_id');
    }
}
