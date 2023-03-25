<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuaris extends Model
{
    use HasFactory;

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
