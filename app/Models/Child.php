<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $table = 'children';
    public function childHealtData(){
        return $this->hasMany(ChildHealthData::class);
    }
    // protected $fillable = ['user_id','nama','tanggal_lahir','jenis_kelamin'];

}
