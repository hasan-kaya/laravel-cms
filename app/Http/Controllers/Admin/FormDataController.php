<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FormData;

class FormDataController extends Controller
{
    
    public function index()
    {
        $data = FormData::orderBy('id','desc')->get();
        return view('admin.form-data',compact('data'));
    }

}
