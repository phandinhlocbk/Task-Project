<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Index()
    {
        return view('admin.admin_login');
    }

    public function Login(Request $request)
    {
        // dd($request->all());

        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return dd($check);
        } else {
            return back();
        }
    } // end mehtod
}
