<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    use ValidatesRequests; // Importa el trait ValidatesRequests

    public function index () {
        return view('auth.register');
    }

    public function store(Request $request){

        //dd($request);
        //modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);


        //validacion en laravel
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        // dd('insertando en la db');

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('posts.index');
    }
}
