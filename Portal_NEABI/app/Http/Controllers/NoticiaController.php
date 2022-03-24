<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

use App\Models\Noticia;
use Illuminate\Support\Facades\Date;
use App\Models\User;

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
        $user =auth()->user();
        if($user->userType == "admin"){
        $noticias = $user->noticias;
        return view('noticia.index',['noticias'=>$noticias]);
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
        return view('noticia.create');
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
            'titulo'=> 'required',
            'descricao'=> 'required',
            'categoria'=> 'required',
        ]);
       $noticias = new Noticia;
       $noticias->titulo = $request->titulo ;
       $noticias->descricao = $request->descricao ;
       $noticias->categoria= $request->categoria ;
       if($request->hasFile('url') && $request->file('url')->isValid()){
        $requestImage = $request->url;
        $extension =$requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImage->move(public_path('img/imagens'), $imageName);
        $noticias->url = $imageName;

        }
       $noticias->data_edicao = new DateTime();
       $user =auth()->user();
       $noticias->user_id =$user->id;
       $noticias->save();
       $user = auth()->user();
       $noticias = $user->noticias;
       return view('noticia.index',['noticias'=>$noticias])->with('msg','Notícia Criada com Sucesso!');
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
        $noticaOwner = User::where('id',$noticia->user_id)->first()->toArray();
        return view("noticia.show", ['noticia'=>$noticia, 'noticiaOwner' =>$noticaOwner]);
       
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
        $user = auth()->user();
        if($user->userType == "admin"){
            if($user->id != $noticias->user_id){
                return redirect('/');
            }else{
            return view('noticia.edit',['noticias'=>$noticias]);
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
       //$dadosform = $request->all();
       $noticia = Noticia::findOrFail($id);
      // $update = $noticia->update($dadosform);
       //if($update)
         //  return redirect()->route('noticia.index')->with('msg','Notícia editada com Sucesso');
       //else 
          // return redirect()->route('noticia.edit', $id)->with('msg','Tente novamente!');
       $noticia->titulo = $request->titulo ;
       $noticia->descricao = $request->descricao ;
       $noticia->categoria= $request->categoria ;
       if($request->hasFile('url') && $request->file('url')->isValid()){
        $requestImage = $request->url;
        $extension =$requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImage->move(public_path('img/imagens'), $imageName);
        $noticia->url = $imageName;

        }
       $noticia->data_edicao = new DateTime();
       $user =auth()->user();
       $noticia->user_id =$user->id;
       $noticia->update();
       $user = auth()->user();
       $noticia = $user->noticias;
       return redirect()->route('noticia.index')->with('msg','Notícia editada com Sucesso');
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
        if($user->userType == "admin"){
            $noticia = Noticia::findOrFail($id);
            if($user->id != $noticia->user_id){
                return redirect('/');
            }else{
            Noticia::findOrFail($id)->delete();
            return redirect('noticia')->with('msg','Noticia deletada com Sucesso!');
            }
        }else{
            return redirect('/')->with('msg',"você não tem permissão");
        }
    }
   


}
