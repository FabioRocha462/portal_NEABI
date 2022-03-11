<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

use App\Models\Noticia;
use Illuminate\Support\Facades\Date;

class NoticiaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   
  
    public function index()
    {
        //
        $noticias = Noticia::all();
       return view('noticia.index',['noticias'=>$noticias]);
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
       $noticias = new Noticia;
       $noticias->titulo = $request->titulo ;
       $noticias->descricao = $request->descricao ;
       $noticias->categoria= $request->categoria ;
       $noticias->url =$request->url;
       $noticias->data_edicao = new DateTime();
       $noticias->save();
       return view('noticia.index',['noticias'=>$noticias]);
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
        $noticia = Noticia::findOrFail($id);
        return view("noticia.show", ['noticia'=>$noticia]);
       
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
        $noticias = Noticia::findOrFail($id);
        return view('noticia.edit',['noticias'=>$noticias]);
        
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
       $dadosform = $request->all();
       $noticia = Noticia::findOrFail($id);
       $noticia->data_edicao = new DateTime();
       $update = $noticia->update($dadosform);
       if($update)
           return redirect()->route('noticia.index');
       else 
           return redirect()->route('noticia.edit', $id);

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
        Noticia::findOrFail($id)->delete();
        return redirect('noticia');
        
    }
   


}
