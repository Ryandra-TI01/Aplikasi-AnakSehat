<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildHealthData extends Model
{
    use HasFactory;
    protected $table = 'child_health_data';
    protected $fillable = [
        'child_id',
        'bulan',
        'tinggi',
        'berat',
        'status_gizi',
    ];
    public function child(){
        return $this->belongsTo(Child::class);
    }
}
