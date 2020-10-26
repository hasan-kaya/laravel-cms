<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\FormData;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        return view('front.pages.contact');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            //'email' => 'required|email',
            'phone' => 'required',
            //'message' => 'required'
        ]);

        FormData::create([
            'type' => ($request->type),
            'data' => ($request->all())
        ]);
        $arr = array('status' => true);
        return Response()->json($arr);
    }
}
