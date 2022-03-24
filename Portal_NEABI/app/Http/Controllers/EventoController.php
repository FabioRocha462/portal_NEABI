<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\User;
use App\Models\User as eventoParticipante;
use PhpParser\Node\Stmt\Foreach_;

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
    public function __invoke()
    {
        
    }
    public function index()
    {
        //
        $user = auth()->user();
        if($user->userType == "admin"){
        $eventos = $user->eventos;
        return view('evento.index',['eventos'=>$eventos]);
        }else{
            return redirect('/')->with('msg',"você não tem permissão");
        }  
      
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = auth()->user();
        if($user->userType == "admin"){
        return view('evento.create');
        }else{
            return redirect('/')->with('msg',"você não tem permissão");
        }
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
        $request->validate([
            'nome'=> 'required|min:5|max:100',
            'descricao'=> 'required',
            'data'=> 'required',
             'modo' => 'required',
             'organizadores'=> 'required',
             'hora_inicio'=> 'required',
             'hora_termino'=> 'required',
             'capacidade'=> 'required',
        ]);
        $user = auth()->user();
        if($user->userType =="admin"){
        $evento = new Evento;
        $evento->nome = $request->nome ;
        $evento->descricao = $request->descricao ;
        $evento->data = $request->data;
        $evento->categoria = $request->categoria;
        if($request->hasFile('url') && $request->file('url')->isValid()){
            $requestImage = $request->url;
            $extension =$requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/imagens'), $imageName);
            $evento->url = $imageName;
    
            }
        $evento->modo = $request->modo;
        $evento->organizadores = $request->organizadores;
        $evento->capacidade = $request->capacidade;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_termino = $request->hora_termino;
        $evento->status = true;
        $user=auth()->user();
        $evento->user_id=$user->id;
        $evento->save();
        $eventos = $user->eventos;
         return view('evento.index',['eventos'=>$eventos]);
        }else{
            return redirect('/')->with('msg',"você não tem permissão");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     

        $user = auth()->user();
        $testuser = false;
        if($user){
            $userEventos = $user->eventosParticipante->toArray();
            foreach($userEventos as $evento){
                if($evento["id"] == $id){
                    $testuser = true;
                }
            }
        }
        $evento = Evento::findOrFail($id);
        //$eventoOwner = User::where('id',$evento->user_id)->first()->toArray();
        return view("evento.show", ['evento'=>$evento,'testuser'=>$testuser]);
        
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
        $user = auth()->user();
        if($user->userType == "admin"){
                $evento = Evento::findOrFail($id);
                if($user->id!=$evento->user_id){
                    return redirect('/')->with('msg', 'Este Evento não é seu !');
                }else{
                return view('evento.edit',['evento'=>$evento]);
                }
        }else{
            return redirect('/')->with('msg',"você não tem permissão");
        }
        
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
            $user = auth()->user();
            //$dadosform = $request->all(); 
            $evento = Evento::findOrFail($id);
             if($user->userType == "admin"){ 
               // $update = $evento->update($dadosform);
               /* if($update){
                    return redirect()->route('evento.index');
                } else {
                    return redirect()->route('evento.edit', $id)->with('msg', 'Tente novamente !');
                }*/
                $evento->nome = $request->nome ;
                $evento->descricao = $request->descricao ;
                $evento->data = $request->data;
                $evento->categoria = $request->categoria;
                if($request->hasFile('url') && $request->file('url')->isValid()){
                    $requestImage = $request->url;
                    $extension =$requestImage->extension();
                    $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
                    $requestImage->move(public_path('img/imagens'), $imageName);
                    $evento->url = $imageName;
    
                }
                $evento->modo = $request->modo;
                $evento->organizadores = $request->organizadores;
                $evento->capacidade = $request->capacidade;
                $evento->hora_inicio = $request->hora_inicio;
                $evento->hora_termino = $request->hora_termino;
                $evento->status = $request->status;
                $user=auth()->user();
                $evento->user_id=$user->id;
                $evento->update();
                return redirect()->route('evento.index');
                }else{
                return redirect('/')->with('msg',"você não tem permissão");
            }
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
        $user = auth()->user();
        $evento = Evento::findOrFail($id);
        if($user->userType =="admin"){
                if($user->id!=$evento->user_id){
                    return redirect('/');
                }else{
                Evento::findOrFail($id)->delete();
                return  redirect('evento')->with('msg',"Evento Deletado com Sucesso ");
                }
            }else{
                return redirect('/');
            }        
        
    }
   
    public function participar($id){
        $user = auth()->user();
        $evento = Evento::findOrFail($id);
        if(count($evento->users) < $evento->capacidade){
        $user->eventosParticipante()->attach($id);
        return redirect('/')->with('msg','Inscriçaõ feita com sucesso!');
        }else{
            return redirect('/')->with('msg','O Evento está Lotado!');
        }
    }

    public function showEventos(){
        $user = auth()->user();
        $eventosParticipante = $user->eventosParticipante;
        return view('evento.ShowEventos',['eventosParticipante'=>$eventosParticipante]);
        
    }
    
    public function cancelarInscricao($id){
        $user = auth()->user();
        $user->eventosParticipante()->detach($id);
        return redirect('/')->with('msg', 'você cancelou sua incrição no Evento !');
    }
    public function nameUsers($id){
        $user = auth()->user();
        if($user->userType == "admin"){
            $evento = Evento::findOrFail($id);
            $NameUser = $evento->users;
            return view('evento.usuarios',['NameUser'=>$NameUser]);
        }
    }
}
