<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationResponse extends Model
{
    use HasFactory;
    protected $table = "consultation_responses";
    protected $fillable = ["response", "consultation_id", "doctor_id"];

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function consultation() {
        return $this->belongsTo(Consultation::class);
    }
}
