<?php

namespace App\Libs;

use Illuminate\Http\Request;
use App;

class Language
{
    public static function prepare(Request $request)
    {
        $request_language = $request->segment(1);
        //$default_language = config('app.locale');
        $default_language = config('translatable.fallback_locale');

        if($request_language != config('auth.admin_panel')){
            $available_languages = config('translatable.locales');

            if( !in_array($request_language,$available_languages) ){
                $selected_language = $default_language;
            }else{
                $selected_language = $request_language;
            }

        }else{
            $session_language = $request->session()->get('locale');
            if(!$session_language){
                $selected_language = $default_language;
            }else{
                $selected_language = $session_language;
            }
        }

        if(isset($selected_language)){
            App::setLocale($selected_language);
        }
    }
}