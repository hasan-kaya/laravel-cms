<?php

namespace App\Models;

use App\Enums\FormType;
use Illuminate\Database\Eloquent\Model;
use BenSampo\Enum\Traits\CastsEnums;

class FormData extends Model
{
    use CastsEnums;

    protected $fillable = [
        'type',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
        'type' => 'int',
    ];

    protected $enumCasts = [
        'type' => FormType::class,
    ];

}
