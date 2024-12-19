<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    /** @use HasFactory<\Database\Factories\ConsultationFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'child_id', 'pesan', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function child()
    {
        return $this->belongsTo(Child::class);
    }

    public function response()
    {
        return $this->hasOne(ConsultationResponse::class);
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
