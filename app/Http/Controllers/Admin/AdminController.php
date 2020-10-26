<?php
namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of Admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('admins_manage')) {
            return abort(401);
        }
        $admins = Admin::all();
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating new Admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('admins_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');
        return view('admin.admins.create', compact('roles'));
    }

    /**
     * Store a newly created Admin in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('admins_manage')) {
            return abort(401);
        }

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:admins,username',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'roles' => 'required'
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $admin->assignRole($roles);
        return redirect()->route('admin.admins.index');
    }

    /**
     * Show the form for editing Admin.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        if (! Gate::allows('admins_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');
        return view('admin.admins.edit', compact('admin', 'roles'));
    }

    /**
     * Update Admin in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        if (! Gate::allows('admins_manage')) {
            return abort(401);
        }

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:admins,username,'.$admin->id,
            'email' => 'required|email|unique:admins,email,'.$admin->id,
            'roles' => 'required',
        ]);

        $update_data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ];

        if($request->password != null){
            $update_data['password'] = Hash::make($request->password);
        }

        $admin->update($update_data);
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $admin->syncRoles($roles);
        return redirect()->route('admin.admins.index');
    }

    public function show(Admin $admin)
    {
        if (! Gate::allows('admins_manage')) {
            return abort(401);
        }
        $admin->load('roles');
    }

    /**
     * Remove Admin from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if (! Gate::allows('admins_manage')) {
            return abort(401);
        }
        $admin->delete();
        return redirect()->route('admin.admins.index');
    }
}