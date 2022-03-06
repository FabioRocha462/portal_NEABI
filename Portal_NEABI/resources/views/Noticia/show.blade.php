@extends('layouts.main')
@section('title', 'Noticias')
@section('content')
<link rel="stylesheet" href={{URL::asset('css/Noticia/show.css')}}>
<main class="container">
                <div class="row">
                  <h2><h3> {{$noticia->titulo}}</h2>
                  <p>edicão:{{$noticia->data_edicao}}</p>
                </div>
                <div class="col-sm">
                  <div class="img_noticias"><img src="{{$noticia->url}}" alt="" class="img-fluid" width="350px" height="350px"></div>
                </div>
                <div>
                  <div> 
                    <p>
                         {{$noticia->descricao}}
                    </p>
                    <p>Categoria: {{$noticia['categoria']}}</p>
                        <p>Data da última edicão:{{$noticia->data_edicao}}</p>
                        <a href="{{route('noticia.index')}}">Voltar</a>  
                  </div>
                </div>
           
</main>
@endsection