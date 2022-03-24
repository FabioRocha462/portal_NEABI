@extends('layouts.main')
@section('title', 'Criar Noticia')
@section('content')
<link rel="stylesheet" href={{URL::asset('css/noticia/create.css')}}>
<main class="container">
    <div class="create"> 
            <h2>Crie sua Notícia aqui!</h2>
            <form action="{{route('noticia.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="form-control form-control-lg" name='titulo' type="text" placeholder="titulo da Notícia?" aria-label=".form-control-lg example">
                <label for="exampleFormControlTextarea1" class="form-label"></label>
                <textarea class="form-control" name='descricao' id="exampleFormControlTextarea1" rows="10" placeholder="Descreva sua Notícia?"></textarea>
                       <hr>
                       <div>
                       <label for="formFileLg" class="form-label">Imagen Do Evento</label>
                       <input name= "url" class="form-control form-control-lg" id="formFileLg" type="file">
                     </div>
                        <hr>
                <label for="exampleDataList" class="form-label">Categoria</label>
                                            <input class="form-control" name='categoria' list="datalistOptions" id="exampleDataList" placeholder="Escolha a categoria para a notícia">
                                            <datalist id="datalistOptions">
                                            <option value="Show musical">
                                            <option value="Teatro">
                                            <option value="Cinema">
                                            <option value="Palestra">
                                            <option value="Leitura">
                                            </datalist>
                                            <hr>
                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                <button class="btn btn-primary" type="submit" value='salvar'>Enviar</button>
                                            </div>
            </form>
            @if ($errors->any())
                    <div class="card-footer"></div>
                    @foreach ($errors->all as $erro)
                        <div claass="alert alert-danger" role="alert">
                            {{$erro}}
                        </div>  
                    @endforeach
         @endif
    </div>  
    @if (isset($erros))
            {{var_dump($erros)}}  
    @endif
</main>
@endsection