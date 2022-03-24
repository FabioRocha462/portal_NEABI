@extends('layouts.main')
@section('title', '')
@section('content')
    <section>
        <div class="carousel slide carousel-fade" id="carouselExampleFade" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active"><a href="http://www.justicadesaia.com.br/festival-de-cinema-marca-a-luta-pelo-protagonismo-da-mulher-negra-na-setima-arte/" target="_blank"> <img class="d-block w-100" src="img/just saia.jpg" width="1400px" height="450px" alt="..."></a></div>
            <div class="carousel-item"><a href="http://www.justicadesaia.com.br/festival-de-cinema-marca-a-luta-pelo-protagonismo-da-mulher-negra-na-setima-arte/" target="_blank"> <img class="d-block w-100" src="img/aqualtune.jpg" width="1400px" height="450px" alt="..."></a></div>
            <div class="carousel-item"> <a href="http://www.justicadesaia.com.br/festival-de-cinema-marca-a-luta-pelo-protagonismo-da-mulher-negra-na-setima-arte/" target="_blank"> <img class="d-block w-100" src="img/victoria santa.jpg" width="1400px" height="450px" alt="..."></a></div>
            <div class="carousel-item"> <a href="http://www.justicadesaia.com.br/festival-de-cinema-marca-a-luta-pelo-protagonismo-da-mulher-negra-na-setima-arte/" target="_blank"> <img class="d-block w-100" src="img/luizabairros.jpg" width="1400px" height="450px" alt="..."></a></div>
            <div class="carousel-item"> <a href="http://www.justicadesaia.com.br/festival-de-cinema-marca-a-luta-pelo-protagonismo-da-mulher-negra-na-setima-arte/" target="_blank"> <img class="d-block w-100" src="img/Tereza.jpg" width="1400px" height="450px" alt="..."></a></div>
          </div>
        </div>
      </section>
      <main class="container main_noticias">
        <div class="row">
              <div class="col-sm-12 text-dark text-center my-4" >
                <div class="destaque">
                  <h2>Notícias</h2>
                </div>
              </div>
    
                    @if ($noticias)
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach ($noticias as $noticia)
  
                              <div class="col">
                                <div class="card h-100">
                                  <img src="../img/imagens/{{$noticia->url}}" class="card-img-top" alt="{{$noticia->titulo}}"  height="250">
                                  <div class="card-body">
                                    <h5 class="card-title">{{$noticia->titulo}}</h5>
                                    <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                    </svg> {{date('d/m/y', strtotime($noticia->data_edicao))}}</p>
                                  </p><a class="btn btn-warning" href="{{route('noticia.show',$noticia->id)}}"><b>Visualizar</b></a>
                                  </div>
                                </div>
                              </div>
                            
                            @endforeach
                    </div>        

                        
                    @else
                        
                     <p><strong>Não Temos Nóticias no Momento :(</strong></p>       
                    @endif        
                  </div>
              </div>  
                  <hr>
                  <div class="col-sm-12 text-dark text-center my-3">
                    <div class="destaque">
                      <h2>Eventos</h2>
                    </div>
                  </div>
                  
                  @if ($eventos)
                  <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($eventos as $evento)
                    <div class="col">
                      <div class="card h-100">
                        <img src="../img/imagens/{{$evento->url}}" class="card-img-top" alt="{{$evento->nome}}" height="250" >
                        <div class="card-body">
                          <h5 class="card-title">{{$evento->nome}}</h5>
                          <p class="card-text">{{$evento->categoria}}</p>
                        </p><a class="btn btn-warning" href="{{route('evento.show',$evento->id)}}"><b>Visualizar</b></a>
                        </div>
                      </div>
                    </div> 
                    @endforeach
                  </div>      
                    @else
                        <p><strong>ão temos nenhum evento no momento ainda :(<strong></p>
                  @endif  
          </div>
          </div> 
      </main>
@endsection