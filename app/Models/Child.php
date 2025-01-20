<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Child extends Model
{
    use SoftDeletes;
    protected $table = 'children';

    protected $fillable = [
        'name',
        'user_id',
        'tanggal_lahir',
        'umur',
        'jenis_kelamin',
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Child_health_data(){
        return $this->hasMany(ChildHealthData::class);
    }
}
