<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use App\Libs\Language as LanguageLib;

class Language
{
    public function handle(Request $request, Closure $next)
    {
        LanguageLib::prepare($request);

        return $next($request);
    }
}