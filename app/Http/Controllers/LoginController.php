<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class LoginController extends Controller
{
    use ValidatesRequests; // Importa el trait ValidatesRequests

    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){

        //validacion en laravel
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('email', 'password'), $request->remember )){
            return back()->with('mensaje', 'Error en las credenciales');
        }

        return redirect()->route('posts.index');

    }
}

