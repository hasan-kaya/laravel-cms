<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $all_posts = Post::orderBy('id', 'desc');
        if ($request->name) {
            $all_posts->whereTranslationLike('name', $request->name.'%');
        }
        if ($request->type) {
            $all_posts->where('type', $request->type);
        }
        if ($request->category){
            $category = $request->category;
            $all_posts->whereHas('categories', function ($query) use ($category) {
                $query->where('category_post.category_id', $category);
            });
        }
        $posts = $all_posts->get();
        
        $categories = Category::get()->pluck('name', 'id');

        return view('admin.posts.index', compact('posts','categories'));
    }

    public function create()
    {
        $categories = Category::whereNull('category_id')
        ->with('children_categories')
        ->get();

        return view('admin.posts.create', compact('categories'));
    }

    public function edit(Post $post)
    {
        $categories = Category::whereNull('category_id')
        ->with('children_categories')
        ->get();

        return view('admin.posts.create', compact('post','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

      
        $post = Post::create($request->except('_token'));

        foreach ($request->input('images', []) as $file) {
            $post->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
        }

        $post->categories()->attach($request->category_ids);

        return redirect()->route('admin.posts.edit',$post->id)->with('success', 'İçerik Eklendi.');;
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if (count($post->images) > 0) {
            foreach ($post->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
    
        $media = $post->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $post->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
            }
        }

        $post->update($request->except('_method','_token'));

        $post->categories()->sync($request->category_ids);

        return redirect()->back()->with('success', 'İçerik Güncellendi.');;
    }

    public function store_media(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'İçerik Silindi.');
    }

}
