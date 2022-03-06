@extends('layouts.main')
@section('title', 'Evento')
@section('content')
<main class="container">
        <h3>noticia detalhada</h3>
        <h2>título: {{$evento['nome']}}</h2>
        <img src="{{$evento['url']}}" alt="" width="760px" height="300px">
        <div class="container-fluid">
                <p> {{$evento['descricao']}}</p>
                <p>Categoria: {{$evento['categoria']}}</p>
                <p>Organizadores: {{$evento['organizadores']}}</p>
                <p>Data do evento:{{date( 'd/m/Y' , strtotime($evento['data']))}}</p>
        </div>

        <a href="{{route('evento.index')}}">Voltar</a>
        
</main>
@endsection