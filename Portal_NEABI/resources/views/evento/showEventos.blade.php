@extends('layouts.main')
@section('title', 'Eventos que Participo')
@section('content')
<link rel="stylesheet" href={{URL::asset('css/evento/index.css')}}>
<main class="container main_noticias">
    <div class="row">
                <div class="col-sm-12 text-dark text-center my-3">
                    <div class="destaque">
                    <h2>Minhas Inscrições</h2>
                    </div>
                </div>
                <hr>
                @if ($eventos)
                <div class="row row-cols-1 row-cols-md-3 g-4">
                  @foreach ($eventosParticipante as $evento)
                  <div class="col">
                    <div class="card h-100">
                      <img src="../img/imagens/{{$evento->url}}" class="card-img-top" alt="{{$evento->nome}}" height="250" >
                      <div class="card-body">
                        <h5 class="card-title">{{$evento->nome}}</h5>
                        <p class="card-text">{{$evento->categoria}}</p>
                         <form action="/evento/sairEvento/{{$evento->id}}" method="POST">
                          @csrf
                          @method("DELETE")
         
                          <BUtton type="submit" class="btn btn-danger delete-btn">Cancelar Inscrição</BUtton>
                        </form>
                      </div>
                    </div>
                  </div> 
                  @endforeach
                </div>      
                  @else
                      <p><strong>ão temos nenhum evento no momento ainda :(<strong></p>
                @endif 
         
    </div>
</main>
@endsection