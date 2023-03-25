<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estat_expedients extends Model
{
    use HasFactory;

    protected $table = 'estat_expedients';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    public $timestamps = false;

    public function expedients()
    {
        return $this->hasMany(expedients::class, 'estat_expedients_id');
    }
}
