<?php

namespace App\Libs;

use Illuminate\Support\Facades\File;
use App\Models\Post;

class Sitemap
{
    public static function generate()
    {
        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $available_languages = config('translatable.locales');

        foreach($available_languages as $prefix){
            $posts = Post::translatedIn($prefix)->get();
            foreach ($posts as $post) {
                $xml[] = "\t" . '<url>';
                $xml[] = "\t\t" . '<loc>' . base_url($prefix) . '/page/' . $post->translate($prefix)->slug . '</loc>';
                $xml[] = "\t\t" . '<lastmod>' . $post->created_at->toAtomString() . '</lastmod>';
                $xml[] = "\t\t" . '<changefreq>Daily</changefreq>';
                $xml[] = "\t\t" . '<priority>0.8</priority>';
                $xml[] = "\t" . '</url>';
            }
        }

        $xml[] = '</urlset>';

        $sitemap_path = base_path() . '/sitemap.xml';
        File::put($sitemap_path, implode(PHP_EOL, $xml));
    }
}
