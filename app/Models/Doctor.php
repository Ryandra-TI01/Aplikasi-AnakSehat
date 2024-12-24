<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "doctors";
    protected $guard = "doctor";
    protected $fillable = ["name", "email", "password", "phone_number", "certificate", "status"];

    public function article() {
        return $this->hasMany(Article::class);
    }

    public function consultation() {
        return $this->hasMany(Consultation::class);
    }

    public function response() {
        return $this->hasMany(ConsultationResponse::class);
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }
}