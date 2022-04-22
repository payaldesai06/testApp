<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function settings()
    {
        $user = \Auth::user();
		return view('settings', compact('user'));
	}
}
