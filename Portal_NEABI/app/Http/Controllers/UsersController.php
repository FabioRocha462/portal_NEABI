<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Noticia;



class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    
    }

    public function create(){
        $this->authorize('is_admin');
        return view('users.create');
    }

    public function store(Request $request){
        $this->authorize('is_admin');
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'userType' => $request->userType,
            'password' => Hash::make($request['password']),
        ]);
        return  'criado com sucesso';
    }

    public function showAllNews(){
        $noticias = Noticia::all();
        return view('home.welcome',['noticias'=>$noticias]);
       }

    public function show($id){
        $this->authorize('is_admin');
        $user = User::findOrFail($id);
        return view('layouts.main', ['user' => $user]);
    }

    public function showAll(){
        $this->authorize('is_admin');
        $users = User::orderBy('created_at', 'desc')->get();
        return view('layouts.main',['users' => $users]);
    }
}