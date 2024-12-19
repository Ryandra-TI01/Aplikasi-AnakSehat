<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;
    protected $table = "children";
    protected $fillable = ["name", "date_of_birth", "gender", "user_id"];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function childHealt() {
        return $this->hasMany(ChildHealth::class);
    }
}
