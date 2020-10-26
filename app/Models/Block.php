<?php

namespace App\Models;

use App\Enums\BlockType;
use Illuminate\Database\Eloquent\Model;
use BenSampo\Enum\Traits\CastsEnums;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Block extends Model implements TranslatableContract
{
    use CastsEnums, Translatable {
        Translatable::setAttribute insteadof CastsEnums;
    }
    
    protected $fillable = [
        'model_name',
        'model_id',
        'type',
        'content',
    ];

    public $translatedAttributes = [
        'content', 
    ];

    protected $enumCasts = [
        'type' => BlockType::class,
    ];

    protected $casts = [
        'type' => 'string',
    ];
}
