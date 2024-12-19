<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildHealthData extends Model
{
    protected $table = 'child_health_data';
    public function child(){
        return $this->belongsTo(Child::class);
    }
    protected $fillable = [
        'child_id',
        'bulan',
        'tinggi',
        'berat',
        'status_gizi',
    ];
}
