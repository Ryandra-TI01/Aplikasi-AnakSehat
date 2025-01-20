<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = 'article_categories';
    protected $guarded = [];
    public function article(){
        return $this->hasMany(Article::class);
    }
}
