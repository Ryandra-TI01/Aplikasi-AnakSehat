<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildHealth extends Model
{
    use HasFactory;
    protected $table = "child_health_data";
    protected $fillable = ["child_id", "weight", "height", "recorded_at", "note"];

    public function children() {
        return $this->belongsTo(Children::class);
    }
}
