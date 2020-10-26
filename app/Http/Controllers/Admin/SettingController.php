<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function store(Request $request)
    {
        $rules = Setting::getValidationRules();
        $data = $this->validate($request, $rules);

        $validSettings = array_keys($rules);

        foreach ($data as $key => $val) {
            if( in_array($key, $validSettings) && $val != '') {
                $type = Setting::getDataType($key);
                if( $type == 'file' && $request->hasFile($key) ){
                    $image_name = $request->file($key)->getClientOriginalName();
                    $request->$key->storeAs('general', $image_name, 'public');
                    $val = 'general/'.$image_name;
                }
                Setting::add($key, $val, $type);
            }
        }

        return redirect()->back()->with('success', 'Ayarlar Güncellendi.');
    }
}
