<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $incommingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email', ],
            'password' => ['required', 'min:8', 'max:30']
        ]);
        return 'Hello World';
    }
}
