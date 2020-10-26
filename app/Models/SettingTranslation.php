<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ClearsResponseCache;

class SettingTranslation extends Model
{
    use ClearsResponseCache;

    public $timestamps = false;

    protected $fillable  = [
        'val', 
    ];

}
