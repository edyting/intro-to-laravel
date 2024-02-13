<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFields = $request ->validate(
            [
                'name'=>['required','string','min:3'],
                'email'=>['required','string',''],
                'password'=>['required','string',''],
            ]
        );
        $incomingFields['password'] = bcrypt($incomingFields['password']);

        User::create($incomingFields);


        return ("Thank you for registering");
    }
}
