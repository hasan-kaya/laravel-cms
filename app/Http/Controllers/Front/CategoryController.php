<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller{

    public function detail($slug)
    {
        $category = Category::whereTranslation('slug', $slug)->first();
        if($category == null){
            abort(404);
        }else{
            $posts = Post::where('status',1)->whereHas('categories', function ($query) use ($category) {
                $query->where('category_post.category_id', $category->id);
            })->orderBy('id','desc')
            ->get();
            return view('front.pages.category',compact('category','posts'));
        }
    }

}