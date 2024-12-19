<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    /** @use HasFactory<\Database\Factories\ConsultationFactory> */
    use HasFactory;
    protected $table = "consultations";
    protected $fillable = ['user_id', 'child_id', 'pesan', 'status', 'doctor_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function child()
    {
        return $this->belongsTo(Children::class);
    }

    public function response()
    {
        return $this->hasOne(ConsultationResponse::class);
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
