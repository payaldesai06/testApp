<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Commonhelper;
use Auth;

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

    public function logout()
    {
        $user = Auth::user();
        $user->api_token = '';
        $user->save();
        auth()->logout();
        Session()->flush();
        return redirect('/');
    }

}
