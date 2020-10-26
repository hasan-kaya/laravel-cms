<?php

namespace App\Http\Controllers\Front;

use App\Enums\PostType;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{

    public function detail($slug)
    {
        $type = Route::currentRouteName();
        $post = Post::whereTranslation('slug', $slug)->first();
        if ($post == null) {
            abort(404);
        } else {
            $related_products = null;
            if ($type == 'product') {
                $related_products = Post::where('id', '!=', $post->id)
                    ->whereHas('categories', function ($query) use ($post) {
                        $query->where('category_post.category_id', $post->category_ids);
                    })
                    ->take(4)
                    ->get();
            }
            return view('front.pages.' . $type, compact('post', 'related_products'));
        }
    }

    public function search(Request $request)
    {
        /*$request->validate([
            'term' => 'required',
        ]);*/

        $html = '';

        $posts = Post::where('type', \App\Enums\PostType::Product)
            ->where('status',1)
            ->where('type', PostType::Product)
            ->whereTranslationLike('name', '%' . $request->term . '%')
            ->orderBy('rank', 'asc')
            ->take(6)
            ->get();

        if (count($posts) > 0) {
            foreach ($posts as $post) {
                $html .= View::make('front.blocks.product')->with(compact('post'))->render();
            }
        } else {
        }

        return response()->json([
            'html' => $html
        ]);
    }
}
