<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function logout(){
        auth()->logout();
        return redirect("/");
    }



    public function register(Request $request){
        $incomingFields = $request ->validate(
            [
                'name'=>['required','string','min:3', Rule::unique('users','name')],
                'email'=>['required','string', Rule::unique('users','email')],
                'password'=>['required','string',''],
            ]
        );
        $incomingFields['password'] = bcrypt($incomingFields['password']);

        $user = User::create($incomingFields);
        auth()->login($user);

        return redirect('/');
    }



    public function login(Request $request){
        $incomingFields = $request ->validate([
            'loginname'=> ['required','string'],
            'loginpassword'=> ['required','string'],
        ]);

        if (auth()->attempt(['name'=>$incomingFields['loginname'],'password'=>$incomingFields['loginpassword']])) {
            $request->session()->regenerate();
        }
        return redirect('/');
    }
}
