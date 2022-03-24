@extends('layouts.main')
@section('title', 'Criar Evento')
@section('content')
<link rel="stylesheet" href="{{URL::asset('css/evento/create.css')}}">
    <main class="container">

     <div class="evento">   
        <div class="row">
            <h2>Crie seu Evento</h2>
            <div class="col-lg-12">
                <form action="{{route('evento.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="step_1" class="step">
                                <input class="form-control form-control-lg" type="text" name="nome"placeholder="Qual o nome do seu evento?" aria-label=".form-control-lg example">
                                <label for="exampleFormControlTextarea1" class="form-label"></label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="descricao" placeholder="Descreva seu evento?"></textarea>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                    <input type="date" name= "data" class="form-control" placeholder="First name" aria-label="First name">
                                    </div>
                                    <div class="col">
                                        <div class="row">  
                                            <div class="col">
                                                <input type="time" name="hora_inicio" class="form-label" placeholder="Hora de Inicio">
                                                <p>Inicio do Evento</p>
                                            </div> 
                                              
                                            <div class="col">
                                                <input type="time" class="form-label" name= "hora_termino" placeholder="Termino">
                                                <p>Termíno do Evento</p>
                                           </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <br>
                                          <input type="number" name="capacidade" class="form-label" placeholder="Capacidade?" >
                                    </div>
                                    <div class="col">
                                        <label for="exampleDataList" class="form-label"></label>
                                        <input class="form-control" list="datalistOptions" id="exampleDataList" name="modo" placeholder="modo?">
                                        <datalist id="datalistOptions">
                                        <option value="online">
                                        <option value="presencial">
                                        </datalist>
                                    </div>
                                </div>
                                <label for="exampleDataList" class="form-label"></label>
                                    <input class="form-control" list="datalistOptions" id="exampleDataList" name="categoria" placeholder="categoria do seu Evento?">
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
                        <input class="form-control form-control-lg" id="formFileLg" type="text" name = "organizadores" placeholder="Organizadores?" aria-label=".form-control-lg example">
                        <label for="formFileLg" class="form-label">Large file input example</label>
                        <input name="url" class="form-control form-control-lg" id="formFileLg" type="file">
                      </div>
                    <br>
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
     </div>  
     @if ($errors->any())
           <div class="card-footer"></div>
              @foreach ($errors->all as $erro)
                <div claass="alert alert-danger" role="alert">
                    {{$erro}}</div>  
              @endforeach
        @endif
    </main>
@endsection
