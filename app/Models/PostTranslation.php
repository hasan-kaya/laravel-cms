<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\ClearsResponseCache;
use App\Traits\GenerateSitemap;

class PostTranslation extends Model
{
    use Sluggable;
    use ClearsResponseCache;
    use GenerateSitemap;

    public $timestamps = false;

    protected $fillable  = [
        'name', 
        'slug',
        'description',
        'content',
        'tags',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'canUpdate' => true,
            ]
        ];
    }
}
