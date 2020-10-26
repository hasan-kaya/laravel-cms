<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artisan;
use Spatie\ResponseCache\Facades\ResponseCache;

class DashboardController extends Controller
{
    
    public function index()
    
    {
        $posts = \App\Models\Post::where('type', \App\Enums\PostType::Page)->count();
        $products = \App\Models\Post::where('type',\App\Enums\PostType::Product)->count();
        $categories = \App\Models\Category::count();

        return view('admin.dashboard',compact(
            'posts',
            'products',
            'categories'
        ));
    }

    public function clear_cache()
    {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        ResponseCache::clear();
    }

    public function get_model_rows(Request $request)
    {
        $model_name = '\App\Models\\'.$request->model_name;
        $items = $model_name::get()->toArray();

        return response()->json(['items'=> $items]);
    }

    public function change_status(Request $request)
    {
        $model_name = '\App\Models\\'.$request->model;
        $model_name::where('id', $request->id)->update(['status' => $request->status]);
        return response()->json(['status'=> 1]);
    } 
    
    public function change_rank(Request $request)
    {
        $model_name = '\App\Models\\'.$request->model;
        $model_name::where('id', $request->id)->update(['rank' => $request->rank]);
        return response()->json(['status'=> 1]);
    }

}
