<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticiaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $noticia = [
        ['id'=>1, 'titulo'=>"aqui é um titulo",'descricao'=>'isso é uma descrição','categoria'=>'racismo'],
        ['id'=>2, 'titulo'=>'aqui é outro titulo','descricao'=>'isso é outra descrição', 'categoria'=>'pluralidade'],
        ['id'=>3, 'titulo'=>'Ta dando certo','descricao'=>'aqui também é outra descrição de teste', 'categoria'=>'deus é bom']
    ];
    public function __construct(){
        $noticia = session('noticia');
        if(!isset($noticia)){
            session(['noticia'=>$this->noticia]);
        }
    }
    public function index()
    {
        //
        $noticia =session('noticia');
        return view('noticia.index',compact(['noticia']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('noticia.create');
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
        $noticia = session('noticia');
        $id= count($noticia) +1;
        $titulo=  $request->titulo;
        $descricao= $request->descricao;
        $categoria= $request->categoria;
        $dados = ["id"=>$id, "titulo"=>$titulo, "descricao"=>$descricao, "categoria"=>'categoria'];
        $noticia[] = $dados;
        session(['noticia'=>$noticia]);
        return redirect()->route('noticia.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $noticia= session('noticia');
        $noticia = $noticia[$id -1];
        return view('noticia.show', compact(['noticia']));
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
