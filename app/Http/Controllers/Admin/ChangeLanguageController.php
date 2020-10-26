<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class ChangeLanguageController extends Controller
{
    public function index($alias)
    {
        session(['locale' => $alias]);
        App::setLocale($alias);
        return redirect()->back();
    }
}
