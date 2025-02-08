<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;
    protected $table = 'articles';
    protected $guarded = [];
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('article_images')
            ->useDisk('public') // Simpan di storage/public
            ->singleFile(); // Hanya bisa punya 1 
    }
    public function User(){
        return $this->belongsTo(User::class, 'doctor_id');
    }
    public function ArticleCategory(){
        return $this->belongsTo(ArticleCategory::class, 'slug');
    }
}
