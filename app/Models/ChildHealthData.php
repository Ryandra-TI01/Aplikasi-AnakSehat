<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildHealthData extends Model
{
    // use SoftDeletes;

    protected $table = 'child_health_data';
    protected $guarded = [];
    public function Child(){
        return $this->belongsTo(Child::class);
    }
}
