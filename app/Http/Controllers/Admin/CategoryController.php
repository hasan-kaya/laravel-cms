<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::whereNull('category_id')
        ->with('children_categories')
        ->get();

        return view('admin.categories.create',compact('categories'));
    }

    public function edit(Category $category)
    {
        $categories = Category::whereNull('category_id')
        ->with('children_categories')
        ->get();

        return view('admin.categories.create', compact('category','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->except('_token'));

        return redirect()->route('admin.categories.index')->with('success', 'Kategori Eklendi.');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'not_in:'.$category->id,
        ]);

        $category->update($request->except('_method','_token'));
        return redirect()->route('admin.categories.index')->with('success', 'Kategori Güncellendi.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Kategori Silindi.');
    }

}
