<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartes_trucades_has_agencies extends Model
{
    use HasFactory;

    protected $table = 'cartes_trucades_has_agencies';
    // protected $primaryKey = 'id'; Cambiar el id por los ids de trucada y agencias.aaaa
    // public $incrementing = false;
    public $timestamps = false;

    // relacion ternaria preguntar a fransico


}
