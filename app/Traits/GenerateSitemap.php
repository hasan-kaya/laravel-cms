<?php

namespace App\Traits;

use Sitemap;

trait GenerateSitemap
{
    public static function bootGenerateSitemap()
    {
        static::created(function () {
            Sitemap::generate();
        });

        static::saved(function () {
            Sitemap::generate();
        });

        static::deleted(function () {
            Sitemap::generate();
        });
    }
}