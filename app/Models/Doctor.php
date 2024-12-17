<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = "doctors";
    protected $fillable = ["name", "email", "password", "phone_number", "certificate", "status"];

    public function article() {
        return $this->hasMany(Article::class);
    }
}
