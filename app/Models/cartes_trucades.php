<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartes_trucades extends Model
{
    use HasFactory;

    protected $table = 'cartes_trucades';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    public $timestamps = false;


    public function interlocutors()
    {
        return $this->belongsTo(interlocutors::class, 'interlocutors_id');
    }

    public function tipusLocalitzacions()
    {
        return $this->belongsTo(tipus_localitzacions::class, 'tipus_localitzacions_id');
    }

    public function incidents()
    {
        return $this->belongsTo(incidents::class, 'incidents_id');
    }

    public function expedients()
    {
        return $this->belongsTo(expedients::class, 'expedients_id');
    }

    public function usuaris()
    {
        return $this->belongsTo(usuaris::class, 'usuaris_id');
    }

    public function provincies()
    {
        return $this->belongsTo(provincies::class, 'provincies_id');
    }

    public function municipis()
    {
        return $this->belongsTo(municipis::class, 'municipis_id');
    }

    public function cartaTrucadesHasAgencies()
    {
        return $this->hasMany(cartes_trucades_has_agencies::class, 'cartes_trucades_id');
    }
}
