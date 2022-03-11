<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
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
        $eventos = Evento::all();
        return view('evento.index',['eventos'=>$eventos]);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('evento.create');
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
        $eventos = new Evento;
        $eventos->nome = $request->nome ;
        $eventos->descricao = $request->descricao ;
        $eventos->data = $request->data;
        $eventos->categoria = $request->categoria;
        $eventos->url = $request->url;
        $eventos->modo = $request->modo;
        $eventos->organizadores = $request->organizadores;
        $eventos->capacidade = $request->capacidade;
        $eventos->hora_inicio = $request->hora_inicio;
        $eventos->hora_termino = $request->hora_termino;
        $eventos->status = true;
        $eventos->save();
       return view('evento.index',['eventos'=>$eventos]);
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
        $evento = Evento::findOrFail($id);
        return view("evento.show", ['evento'=>$evento]);
        
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
        $evento = Evento::findOrFail($id);
        return view('evento.edit',['evento'=>$evento]);
        
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
        {
            $dadosform = $request->all();
            $evento = Evento::findOrFail($id);
            $update = $evento->update($dadosform);
            if($update)
                return redirect()->route('evento.index');
            else 
                return redirect()->route('evento.edit', $id);
     
         }
        
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
        Evento::findOrFail($id)->delete();
        return redirect('evento');
        
    }
   
}
