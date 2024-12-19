<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationResponse extends Model
{
    protected $fillable = ['consultation_id', 'doctor_id', 'respon'];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}

