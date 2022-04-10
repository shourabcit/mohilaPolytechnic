<?php

namespace App\Http\Controllers\backend\admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['student']);
        return view('backend.admin.index',compact('roles'));
    }
}
