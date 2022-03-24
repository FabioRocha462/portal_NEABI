@extends('layouts.main')
@section('title', 'Editar Noticia')
@section('content')
<link rel="stylesheet" href={{URL::asset('css/noticia/edit.css')}}>
<main class="container">
    <div class="create"> 
            <h2>Edite sua Notícia aqui!</h2>
            <form action="{{route('noticia.update',$noticias->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="Titulo" class="form-label">Título</label>
                <input class="form-control form-control-lg" name='titulo' value='{{$noticias->titulo}}' id="Titulo" type="text" placeholder="titulo da Notícia?" aria-label=".form-control-lg example">
                <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
               <textarea class="form-control"  name='descricao'  id="exampleFormControlTextarea1" rows="10" placeholder="Descreva sua Notícia?">{{$noticias->descricao}}</textarea>
                       <hr>
                       <div>
                       <label for="formFileLg" class="form-label">Imagem da Notícia</label>
                       <input name="url" value="{{$noticias->categoria}}" class="form-control form-control-lg" id="formFileLg" type="file">
                     </div>
                        <hr>
                <label for="exampleDataList" class="form-label">Categoria</label>
                                            <input  type= "text" class="form-control"  name='categoria'  list="datalistOptions" value='{{$noticias->categoria}}' id="exampleDataList" placeholder="Escolha a categoria para a notícia">
                                            <datalist id="datalistOptions">
                                                    <option value="Racismo">
                                                    <option value="Descriminação">
                                                    <option value="Pluralidade">
                                                    <option value="informativo">
                                                    <option value="indígenas">
                                                    <option value="comunidade negra">
                                            </datalist>
                                            <hr>
                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                <button class="btn btn-primary" type="submit" value='salvar'>Enviar</button>
                                            </div>
            </form>
            <a href="{{route('noticia.index')}}">Voltar</a>
    </div>        
</main>
@endsection