@extends('layouts.main')
@section('title', 'Criar Evento')
@section('content')
<link rel="stylesheet" href="{{URL::asset('css/evento/create.css')}}">
    <main class="container">

     <div class="evento">   
        <div class="row">
            <h2>Edite seu Evento</h2>
            <div class="col-lg-12">
                <form action="{{route('evento.update',$evento->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="step_1" class="step">
                                <input class="form-control form-control-lg" type="text" name="nome" value="{{$evento->nome}}" placeholder="Qual o nome do seu evento?" aria-label=".form-control-lg example">
                                <label for="exampleFormControlTextarea1" class="form-label"></label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="descricao"  placeholder="Descreva seu evento?">{{$evento->descricao}}</textarea>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                    <input type="date" name= "data" value="{{$evento->data}}"class="form-control" placeholder="First name" aria-label="First name">
                                    </div>
                                    <div class="col">
                                        <div class="row">  
                                            <div class="col">
                                                <input type="time" name="hora_inicio" value="{{$evento->hora_inicio}}" class="form-label" placeholder="Hora de Inicio">
                                                <p>Inicio do Evento</p>
                                            </div> 
                                              
                                            <div class="col">
                                                <input type="time" class="form-label" name= "hora_termino" value="{{$evento->hora_termino}}" placeholder="Termino">
                                                <p>Termíno do Evento</p>
                                           </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <br>
                                          <input type="number" name="capacidade" value="{{$evento->capacidade}}" class="form-label" placeholder="Capacidade?" >
                                    </div>
                                    <div class="col">
                                        <label for="exampleDataList" class="form-label"></label>
                                        <input class="form-control" list="datalistOptions" id="exampleDataList" name="modo" value="{{$evento->modo}}" placeholder="modo?">
                                        <datalist id="datalistOptions">
                                        <option value="online">
                                        <option value="presencial">
                                        </datalist>
                                    </div>
                                </div>
                                <label for="exampleDataList" class="form-label"></label>
                                    <input class="form-control" list="datalistOptions" id="exampleDataList" name="categoria" value="{{$evento->categoria}}" placeholder="categoria do seu Evento?">
                                    <datalist id="datalistOptions">
                                    <option value="Show musical">
                                    <option value="Teatro">
                                    <option value="Cinema">
                                    <option value="Palestra">
                                    <option value="Leitura">
                                    <option value="Outros">
                                    </datalist>
                                    <hr>
                                
                                
                     </div>

                      
                    <div id="step_2" class="step">
                        <label for="formFileLg" class="form-label">Ornizadores</label>
                        <input class="form-control form-control-lg" id="formFileLg" type="text" name = "organizadores" value="{{$evento->organizadores}}"placeholder="Organizadores?" aria-label=".form-control-lg example">
                        <label for="formFileLg" class="form-label"></label>
                        <input name="url" value="{{$evento->url}}" class="form-control form-control-lg" id="formFileLg" type="file">
                      </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                          Manter evento
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
                        <label class="form-check-label" for="exampleRadios2">
                          Cancelar Evento
                        </label>
                      </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-danger"  type="reset">Cancelar</button>
                                  </div>
                              </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-primary"  type="submit">Confirmar</button>
                                  </div>
                              </div>
                        </div>
                      </div>
              </form>
            </div>
        </div>
        <a href="{{route('evento.index')}}">Voltar</a>
     </div>  
    </main>
 @endsection    