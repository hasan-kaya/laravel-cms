<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\TranslationLoader\LanguageLine;

class LanguageValueController extends Controller
{
    public function index()
    {
        $values = LanguageLine::all();
        $languages = config('translatable.languages');

        return view('admin.language-values.index',compact('values','languages'));
    }

    public function create()
    {
        $languages = config('translatable.languages');
        return view('admin.language-values.create', compact('languages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|alpha_dash|max:50|unique:language_lines,key',
            'group' => 'required|regex:/^[a-z]+$/u|max:20',
        ]);

        $request->request->add(['text' => []]);
        LanguageLine::create($request->all());

        return redirect()->route('admin.language-values.index');
    }

    public function edit($id, LanguageLine $value)
    {
        $value = LanguageLine::findOrFail($id);
        return view('admin.language-values.create', compact('value'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'key' => 'required|alpha_dash|max:50|unique:language_lines,key',
            'group' => 'required|regex:/^[a-z]+$/u|max:20',
        ]);
        
        LanguageLine::findOrFail($id)->update($request->all());

        return redirect()->route('admin.language-values.index');
    }

    public function update_all(Request $request)
    {

        foreach($request->values as $id => $items){
            LanguageLine::where('id',$id)->update(['text'=>$items]);
        }

        return redirect()->route('admin.language-values.index')->with('success', 'Dil Tanımları Güncellendi.');;
    }
}
