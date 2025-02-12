<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ChildHealthData extends Model
{
    use LogsActivity;

    protected $table = 'child_health_data';
    protected $guarded = [];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['child.name','bulan','berat','tinggi','status_gizi'])
        ->logOnlyDirty();
    }
    public function Child(){
        return $this->belongsTo(Child::class);
    }
}
