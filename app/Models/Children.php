<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;
    protected $table = "children";
    protected $fillable = ["nama", "tanggal_lahir", "jenis_kelamin", "user_id"];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function childHealt() {
        return $this->hasMany(ChildHealthData::class);
    }
}
