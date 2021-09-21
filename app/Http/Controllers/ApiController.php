<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAuthUser(Request $request) {
        return $request->user();
    }

    public function getUser($id, Request $request) {
        sleep(3);
        return $id;
        // dd($id, $request->all());
    }
}
