@extends('layouts.main')
@section('title', 'Criar Evento')
@section('content')
<link rel="stylesheet" href={{URL::asset('css/create.css')}}>
    <main class="container">
     <div class="evento">   
        <div class="row">
            <div class="col-lg-12">
                <form action="processa.php" method="POST">
                    <div id="step_1" class="step">
                                <input class="form-control form-control-lg" type="text" placeholder="Qual o nome do seu evento?" aria-label=".form-control-lg example">
                                <label for="exampleFormControlTextarea1" class="form-label"></label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descreva seu evento?"></textarea>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                    <input type="date" class="form-control" placeholder="First name" aria-label="First name">
                                    </div>
                                    <div class="col">
                                    <input type="date" class="form-control" placeholder="Last name" aria-label="Last name">
                                    </div>
                                </div>
                                <label for="exampleDataList" class="form-label"></label>
                                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Escolha a categoria do seu Evento">
                                    <datalist id="datalistOptions">
                                    <option value="Show musical">
                                    <option value="Teatro">
                                    <option value="Cinema">
                                    <option value="Palestra">
                                    <option value="Leitura">
                                    </datalist>
                                    <hr>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <div class="d-grid gap-2 col-6 mx-auto">                                                  <div class="input-group-text">
                                                    <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                                    </div>
                                                    <h3> Presencial</h3>
                                                </div>
                                        </div>    
                                    </div>
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                <div class="input-group-text">
                                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                                </div>
                                                <h3> Online</h3>
                                            </div>
                                        </div>    
                                    </div>
                                  </div>
                                
                                
                     </div>
                      
                    <div id="step_2" class="step">
                        <input class="form-control form-control-lg" type="text" placeholder="Organizadores?" aria-label=".form-control-lg example">
                        <label for="formFileLg" class="form-label"></label>
                        <input class="form-control form-control-lg" id="formFileLg" type="file" placeholder="Escolha a imagem de seu Evento">
                        <hr>
                        <div class="row">
                            <div class="col">
                                <input type="number" class="form-label" placeholder="Capacidade?" >
                            </div>   
                            <div class="col">
                                <input type="time" class="form-label" placeholder="Hora de Inicio">
                                <p>Inicio do Evento</p>
                            </div> 
                              
                            <div class="col">
                                <input type="time" class="form-label" placeholder="Termino">
                                <p>Termíno do Evento</p>
                           </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-primary"  type="reset">Anterior</button>
                                  </div>
                              </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-primary"  type="submit">Próximo</button>
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
