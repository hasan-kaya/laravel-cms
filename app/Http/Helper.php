<?php

if (! function_exists('setting')) {

    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new \App\Models\Setting();
        }

        if (is_array($key)) {
            return \App\Models\Setting::set($key[0], $key[1]);
        }

        $value = \App\Models\Setting::get($key);

        return is_null($value) ? value($default) : $value;
    }
}

if (! function_exists('base_url')) {

    function base_url($current_lang = '')
    {
        $default_lang = config('translatable.fallback_locale');
        if($current_lang == ''){
            $current_lang = App::getLocale();
        }

        $lang_prefix = '';
        if( $current_lang != $default_lang ){
            $lang_prefix = '/'.$current_lang;
        }

       return url('/').$lang_prefix;
    }
}

if (! function_exists('get_url')) {

    function get_url($type, $slug)
    {
        return base_url().'/'.strtolower($type).'/'.$slug;
    }
}

if (! function_exists('excerpt')) {

    function excerpt($content)
    {
        $explode = explode('<!--break-->',$content);
        return $explode[0];
    }
}
