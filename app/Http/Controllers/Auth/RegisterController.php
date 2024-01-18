<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //modificar el Request para evitar duplicacdos
        $request->request->add(['username' => Str::slug($request->username)]);
        //validacion
        $this->validate($request,[
            'name' =>'required|max:30',
            'username' =>'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'            
        ]);
        //dd($request);
        //dd($request->get('username'));
        User::create([
            'name' => $request->name,
            // 'username'=> Str::slug($request->username),
            'username' => $request->username,
            'email'=>$request->email,
            'password' => Hash::make($request->password)
        ]);


        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password 
        // ]);

        auth()->attempt($request->only('email','password'));

        //return redirect()->route('posts.index');
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
