<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = "admins";
    protected $guard = "admin";
    protected $fillable = ["name", "email", "password", "phone_number"];
    public function hasRole($role)
    {
        return $this->role === $role;
    }

}
