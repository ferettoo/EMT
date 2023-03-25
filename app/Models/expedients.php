<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expedients extends Model
{
    use HasFactory;

    protected $table = 'expedients';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    public $timestamps = false;

    public function cartaTrucades()
    {
        return $this->hasMany(cartes_trucades::class, 'expedients_id');
    }

    public function estatExpedients()
    {
        return $this->belongsTo(estat_expedients::class, 'estat_expedients_id');
    }
}
