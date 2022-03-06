@extends('layouts.main')
@section('title', 'Criar Evento')
@section('content')
<link rel="stylesheet" href="{{URL::asset('css/evento/create.css')}}">
    <main class="container">

     <div class="evento">   
        <div class="row">
            <h2>Crie seu Evento</h2>
            <div class="col-lg-12">
                <form action="{{route('evento.store')}}" method="POST">
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
                                                <input type="time" class="form-label" mame= "hora_termino" placeholder="Termino">
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
                        <label for="formFileLg" class="form-label"></label>
                        <input class="form-control form-control-lg" id="formFileLg" name="url" type="text" placeholder="URL da imagem">
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
    </main>
    <script>
        $(document).ready(function(){
       
           //Esconde todos os passos e exibe o primeiro ao carregar a página 
           $('.step').hide();
           $('.step').first().show();
       
           //Exibe no topo em qual passo estamos pela ordem da div que esta visivel
           var passoexibido = function(){
               var index = parseInt($(".step:visible").index());
               if(index == 0){
                   //Se for o primeiro passo desabilita o botão de voltar
                   $("#prev").prop('disabled',true);
               }else if(index == (parseInt($(".step").length)-1)){
                   //Se for o ultimo passo desabilita o botão de avançar
                   $("#next").prop('disabled',true);
               }else{
                   //Em outras situações os dois serão habilitados
                   $("#next").prop('disabled',false);            
                   $("#prev").prop('disabled',false);
               }
               $("#passo").html(index + 1);
       
           };
           
           //Executa a função ao carregar a página
           passoexibido();
       
           //avança para o próximo passo
           $("#next").click(function(){
               $(".step:visible").hide().next().show();
               passoexibido();
           });
       
           //retrocede para o passo anterior
           $("#prev").click(function(){
               $(".step:visible").hide().prev().show();
               passoexibido();
           });
       
        });
       </script>

@endsection
