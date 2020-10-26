<?php

namespace App\Models;

use App\Enums\BlockType;
use Illuminate\Database\Eloquent\Model;
use BenSampo\Enum\Traits\CastsEnums;

class Block extends Model
{
    use CastsEnums;

    protected $fillable = [
        'model_name',
        'model_id',
        'type',
        'content',
    ];

    protected $enumCasts = [
        'type' => BlockType::class,
    ];

    protected $casts = [
        'type' => 'string',
    ];
}
