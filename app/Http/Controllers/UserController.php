<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request){
        $errcode = ($request->get('errcode') ?? 0);

        $message = '';

        if ($errcode == 1){
            $message = 'Wrong User and Password';
        }

        return view('site.login', ['message' => $message]);
    }

    public function authenticate(Request $request){
        $rules = [
            'user' => ['required', 'min:3'],
            'password' => ['required', 'min:1']
        ];

        $feedback = [
            'required' => 'The field :attribute is required',
            'user.min' => 'Must have at least 3 characters',
            'password.min' => 'Must have at least 1 character'
        ];

        $request->validate($rules, $feedback);
        $login = $request->get('user');
        $password = $request->get('password');

        $user = User::where('name', $login)
            ->where('password', sha1($password))
            ->get()
            ->first();

        if (!isset($user->name)){
            return redirect()->route('site.login', ['errcode' => 1]);
        }

        session_start();
        $_SESSION['name'] = $user->name;

        return redirect()->route('site.index');
    }

    public function logout(){
        session_start();
        session_destroy();
        return redirect()->route('site.index');
    }
}
