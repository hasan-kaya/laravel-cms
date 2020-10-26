<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Traits\ClearsResponseCache;
use Cviebrock\EloquentSluggable\Sluggable;

class Menu extends Model implements TranslatableContract
{
    use Translatable;
    use ClearsResponseCache;
    use Sluggable;

    public $translatedAttributes = [
        'name', 
    ];

    protected $fillable = [
        'name',
        'slug',
    ];

    public function items()
    {
        return $this->hasMany('App\Models\MenuItem');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                //'canUpdate' => true,
            ]
        ];
    }
}
