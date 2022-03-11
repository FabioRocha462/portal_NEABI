@extends('layouts.main')
@section('title', 'Noticias')
@section('content')
<link rel="stylesheet" href={{URL::asset('css/Noticia/show.css')}}>
<main class="container">
                <div class="row">
                  <h1> {{$noticia->titulo}}</h1>
                  <p>edicão:{{date('d/m/y', strtotime($noticia->data_edicao))}}</p>
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
                        <a href="{{route('noticia.index')}}">Voltar</a>  
                  </div>
                </div>
           
</main>
@endsection