@extends('layouts.main')
@section('title', 'Usuarios de Um Evento')
<link rel="stylesheet" href="{{URL::asset('css/estilo.css')}}">
@section('content')
 <main class="container-fluid">
       <table class="table">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
            </tr>
          </thead>
          <tbody>
              @if ($NameUser)
                  <tr>
                    @foreach ($NameUser as $user)
                    <th>{{$user->id}}</th>
                    <td>{{$user->name}} </td>
                    <td>{{$user->email}}</td>
                    @endforeach
                </tr>
                
              @else
                <h2>Nenhum Participante</h2>
              @endif
          </tbody>
       </table>  
 </main>
@endsection