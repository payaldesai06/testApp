<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Commonhelper;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.listing');
    }

    public function getData(Request $request)
    {
        $users = Commonhelper::getCache('users');
        return view('admin.user.data-list', compact('users'))->render();
    }

    public function add()
    {
        return view('admin.user.form');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        return view('admin.user.form', compact('id','user'));
    }

}
