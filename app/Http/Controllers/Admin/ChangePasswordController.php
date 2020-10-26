<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{

    public function index()
    {
        return view('admin.change-password');
    }

    public function update(Request $request){
        $user = Auth::guard('admin')->user();

        if(Hash::check($request->passwordold, $user['password']) && $request->password == $request->password_confirmation)
        {
          $user->password = bcrypt($request->password);
          $user->save();
          return back()->with('success', 'Şifreniz Değiştirildi');
        }
        else {
          {
            return back()->with('alert', 'Şifreniz Değiştirilemedi');
          }
        }
    }

}
