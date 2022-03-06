@extends('layouts.main')
@section('title', 'Criar Noticia')
@section('content')
<link rel="stylesheet" href={{URL::asset('css/noticia/create.css')}}>
<main class="container">
    <div class="create"> 
            <h2>Crie sua Notícia aqui!</h2>
            <form action="{{route('noticia.store')}}" method="POST">
                @csrf
                <input class="form-control form-control-lg" name='titulo' type="text" placeholder="titulo da Notícia?" aria-label=".form-control-lg example">
                <label for="exampleFormControlTextarea1" class="form-label"></label>
                <textarea class="form-control" name='descricao' id="exampleFormControlTextarea1" rows="3" placeholder="Descreva sua Notícia?"></textarea>
                       <hr>
                <label for="formFileLg" class="form-label">URL da imagem</label>       
                <input class="form-control form-control-lg" id="formFileLg" type="text" name="url">
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
    </div>        
</main>
@endsection