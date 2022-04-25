<?php

namespace App\Http\Controllers\backend\admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $employees = Admin::all()->except([1, 2,3]);
        return view('backend.admin.index', compact('employees'));
    }

    public function create()
    {
        $roles = Role::whereNotIn('name', ['student', 'admin', 'dept. head'])->get();
        return view('backend.admin.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|unique:admins,phone',
            'img' => 'required',
            'password' => 'required|min:8|max:16',
            'role' => 'required'
        ]);


        $extension = $request['img']->getClientOriginalExtension();
        $path = public_path('/storage/image/');
        if (!File::exists($path)) {
            mkdir($path);
        }
        $img_name = 'mp_' . uniqid() . '.' . $extension;
        $request['img']->move($path, $img_name);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'img' => $img_name,
            'password' => Hash::make($request->password),
        ]);
        $admin->assignRole($request->role);
        return redirect()->route('admin.index');
    }

    public function show($id)
    {
        $admin = Admin::find($id);
        return view('backend.admin.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::whereNotIn('name', ['student', 'admin', 'dept. head'])->get();

        return view('backend.admin.edit', compact('admin', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|unique:admins,phone,'.$id,
            'role' => 'required'
        ]);

        $admin = Admin::find($id);



        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        if($request->hasFile('img')){
            $extension = $request['img']->getClientOriginalExtension();
            $path = public_path('/storage/image/');
            if (!File::exists($path)) {
                mkdir($path);
            }
            $img_name = 'mp_' . uniqid() . '.' . $extension;
            $request['img']->move($path, $img_name);
            File::delete(public_path('storage/image/') . $admin->img);
            $admin->img = $img_name;
        }
        $admin->syncRoles($request->role);

        $admin->save();

        return back();
    }

    public function delete($id)
    {
        $admin = Admin::find($id);
        File::delete(public_path('storage/image/') . $admin->img);

        $admin->delete();


        return back()->with('delete_success', 'Deleted Successfully');
    }

    public function form()
    {
        return view('backend.pdf.form');
    }
}
