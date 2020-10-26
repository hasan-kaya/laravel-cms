<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Traits\ClearsResponseCache;

class Category extends Model implements TranslatableContract
{
    use Translatable;
    use ClearsResponseCache;

    public $translatedAttributes = [
        'name', 
        'description', 
        'slug',
    ];

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'status',
        'rank',
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'category_post')->where('status',1);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function children_categories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}
