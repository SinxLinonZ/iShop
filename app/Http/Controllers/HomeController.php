<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function loginRedierct()
    {
        $user = auth()->user();
        $role = $user->Role->name;

        if ($role == "admin") {
            // return redirect('/home');
            abort(403, "admin");
        } else if ($role == "client") {
            // return redirect('/home');
            abort(403, "client");
        } else {
            abort(403, "Illegal account! access /logout to logout");
        }

    }
}
