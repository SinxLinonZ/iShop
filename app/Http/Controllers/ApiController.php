<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getAuthUser(Request $request) {
        return $request->user();
    }

    public function getUser($id, Request $request) {
        sleep(1);
        $user = DB::table('users')->where('id', $id)->first();
        return $user;
    }
}
