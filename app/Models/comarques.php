<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comarques extends Model
{
    use HasFactory;

    protected $table = 'comarques';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    public $timestamps = false;

    public function provincies()
    {
        return $this->belongsTo(provincies::class, 'provincies_id');
    }

    public function municipis()
    {
        return $this->hasMany(municipis::class, 'comarques_id');
    }
}
