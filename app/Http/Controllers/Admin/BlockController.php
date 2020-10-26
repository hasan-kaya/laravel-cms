<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Block;

class BlockController extends Controller
{
    public function index(Request $request)
    {
        $blocks = Block::orderBy('rank', 'asc')->get();
        
        return view('admin.blocks.index', compact('blocks'));
    }

    public function create()
    {
        $models = [
            'Post' => trans('general.Post'),
            'Category' => trans('general.Category'),
        ];

        return view('admin.blocks.create', compact('models'));
    }

    public function edit(Block $block)
    {
        $models = [
            'Post' => trans('general.Post'),
            'Category' => trans('general.Category'),
        ];

        return view('admin.blocks.create', compact('block','models'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_name' => 'required',
            'model_id' => 'required',
        ]);
      
        $block = Block::create($request->except('_token'));

        return redirect()->route('admin.blocks.edit',$block->id)->with('success', 'Yerleşim Yönetimi Eklendi.');;
    }

    public function update(Request $request, Block $block)
    {
        $request->validate([
            'model_name' => 'required',
            'model_id' => 'required',
        ]);

        $block->update($request->except('_method','_token'));

        return redirect()->back()->with('success', 'Yerleşim Yönetimi Güncellendi.');;
    }

    public function destroy(Block $block)
    {
        $block->delete();
        return redirect()->route('admin.blocks.index')->with('success', 'Yerleşim Yönetimi Silindi.');
    }

}
