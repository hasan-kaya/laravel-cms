<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\ClearsResponseCache;

class CategoryTranslation extends Model
{
    use Sluggable;
    use ClearsResponseCache;

    public $timestamps = false;

    protected $fillable  = [
        'name', 
        'description', 
        'slug',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
