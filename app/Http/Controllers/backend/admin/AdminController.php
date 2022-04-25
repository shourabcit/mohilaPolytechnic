<?php

namespace App\Http\Controllers\backend\admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $employees = Admin::all();
        return view('backend.admin.index',compact('employees'));
    }

    public function create()
    {
        $roles = Role::whereNotIn('name', ['student'])->get();
        return view('backend.admin.create',compact('roles'));
    }


    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'phone' => 'required|unique:admins,phone',
            'img' => 'required',
            'password' => 'required|string|min:8|max:16|confirmed',
            'roles'=>'required'
        ]);



        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'img' => 'test',
            'password' => Hash::make($request->password),
        ]);
    }

    public function form()
    {
        return view('backend.pdf.form');
    }
}
