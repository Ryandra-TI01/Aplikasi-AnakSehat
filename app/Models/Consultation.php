<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $table = "consultations";
    protected $fillable = ["question", "status", "user_id", "doctor_id"];

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function response() {
        return $this->hasMany(ConsultationResponse::class);
    }
}
