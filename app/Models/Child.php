<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $table = "children";
    protected $fillable = ["nama", "tanggal_lahir", "jenis_kelamin", "user_id",'umur'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function childHealthData() {

        return $this->hasMany(ChildHealthData::class);
    }
}
