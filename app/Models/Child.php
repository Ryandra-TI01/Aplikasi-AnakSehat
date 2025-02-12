<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Child extends Model
{
    use SoftDeletes,LogsActivity;
    protected $table = 'children';

    protected $fillable = [
        'name',
        'user_id',
        'tanggal_lahir',
        'umur',
        'jenis_kelamin',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'user.name', 'tanggal_lahir', 'umur', 'jenis_kelamin'])
        ->logOnlyDirty();
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Child_health_data(){
        return $this->hasMany(ChildHealthData::class);
    }
}
