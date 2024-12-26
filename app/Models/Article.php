<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = "articles";
    protected $fillable = ["title", "content", "date", "doctor_id", "image"];

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }
}
