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



    public function loginRedierct()
    {
        $user = auth()->user();
        $role = $user->Role->name;

        if ($role == "admin") {
            return redirect('/admin');
        } else if ($role == "client") {
            return redirect('/client');
        } else {
            abort(403, "Illegal account!");
        }
    }

    public function clientHome() {
        $user = auth()->user();
        $title = "iShop Client " . $user->id;

        $id = $user->id;
        return view('client.home', compact('title', 'id'));
    }

    public function adminHome() {
        $title = "iShop Control Center";
        return view('admin.home', compact('title'));
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


}
