<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $admin=[
        ['id'=>1,'nome'=>'fabio rocha','email'=>'rochafabio462@gmail.com','senha'=>'fabio123'],
        ['id'=>2,'nome'=>'aline morais','email'=>'alinepereirajp@gmail.com','senha'=>'aline123'],

    ];
    public function __construct(){
        $admin = session('admin');
        if(!isset($admin)){
            session(['admin'=>$this->admin]);
        }
    }
 
    public function index()
    {
        //
        $admin =session('admin');
        return view('admin.index',compact(['admin']));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $admin = session('admin');
        $id= count($admin) +1;
        $nome=  $request->nome;
        $email= $request->email;
        $senha= $request->senha;
        $dados = ["id"=>$id, "nome"=>$nome, "email"=>$email, "senha"=>'senha'];
        $admin[] = $dados;
        session(['admin'=>$admin]);
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
