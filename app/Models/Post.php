<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use App\Traits\ClearsResponseCache;
use App\Traits\GenerateSitemap;
use BenSampo\Enum\Traits\CastsEnums;
use App\Enums\PostType;

class Post extends Model implements TranslatableContract,HasMedia
{
    use HasMediaTrait;
    use ClearsResponseCache;
    use GenerateSitemap;
    //use Translatable;
    //use CastsEnums;
    use CastsEnums, Translatable {
        Translatable::setAttribute insteadof CastsEnums;
    }

    public $translatedAttributes = [
        'name',
        'slug',
        'description',
        'content',
        'tags',
    ];

    protected $fillable = [
        'name',
        'type',
        'status',
        'rank',
    ];

    protected $appends = [
        'images',
        'thumbnail',
        'image',
        'category_names',
        'category_ids',
    ];

    protected $enumCasts = [
        'type' => PostType::class,
    ];

    protected $casts = [
        'type' => 'int',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_post');
    }

    public function getCategoryIdsAttribute()
    {
        return $this->categories->pluck('id')->toArray();
    }

    public function getCategoryNamesAttribute()
    {
        return implode(", ",$this->categories->pluck('name')->toArray());
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(450);
    }

    public function getImagesAttribute()
    {
        $files = $this->getMedia('images');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getFullUrl(); //thumb
        });

        return $files;
    }
    
    public function getThumbnailAttribute()
    {
        return $this->getFirstMediaUrl('images','thumb');
    } 
    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('images');
    }

}
