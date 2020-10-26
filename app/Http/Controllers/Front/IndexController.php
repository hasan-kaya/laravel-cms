<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Libs\Block;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Menu;

class IndexController extends Controller
{
    public function index()
    {
        $html = Block::print(); 

        return view('front.index',compact('html'));
    }
}
