<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Traits\ClearsResponseCache;

class MenuItem extends Model implements TranslatableContract
{
    use Translatable;
    use ClearsResponseCache;

    public $translatedAttributes = [
        'label', 
        'link', 
    ];

    protected $fillable = [
        'menu_id',
        'parent',
        'sort',
        'icon',
        'depth',
        'label',
        'link',
    ];

    public function getall($id)
    {
        return $this->where("menu_id", $id)->orderBy("sort", "asc")->get();
    }

    public static function getNextSortRoot($menu)
    {
        return self::where('menu_id', $menu)->max('sort') + 1;
    }

}
