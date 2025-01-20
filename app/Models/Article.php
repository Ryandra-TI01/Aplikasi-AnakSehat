<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $table = 'articles';
    protected $guarded = [];

    public function User(){
        return $this->belongsTo(User::class, 'doctor_id');
    }
    public function ArticleCategory(){
        return $this->belongsTo(ArticleCategory::class, 'slug');
    }
}
