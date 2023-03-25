<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipus_incidents extends Model
{
    use HasFactory;

    protected $table = 'tipus_incidents';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    public $timestamps = false;

    public function incidents()
    {
        return $this->hasMany(incidents::class, 'tipus_incidents_id');
    }
}
