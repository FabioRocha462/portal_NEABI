<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('css/estilo.css')}}">
  </head>
  <body> 
    <header class="menu-area">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid"><a href="{{URL::asset('http://portal_neabi/')}}"><img class="navbar-brand" src="{{URL::asset('/img/Logo-NEABI-horizontal- SEM FUNDO.png')}}" width="200px" height="70px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto" style="width: 0rem;">
              @guest
              
              <li class="nav-item"> <a class="nav-link text-dark" aria-current="page" href="/login"><button type="button" class="btn btn-warning">Login</button></a></li>
              <li class="nav-item"> <a class="nav-link text-dark" aria-current="page" href="/register"><button type="button" class="btn btn-warning">Cadastrar</button></a></li>
    
              @endguest

              <li class="nav-item"> <a class="nav-link text-dark" href="#">Conceitos</a></li>
              <li class="nav-item"> <a class="nav-link text-dark" href="#">Sobre</a></li>
              @auth
              @if (auth()->user()->userType == 'user')
              <li class="nav-item"> <a class="nav-link text-dark" href="http://portal_neabi/eventos">Inscrições</a></li> 
              @endif
              @if (auth()->user()->userType == 'admin')
              <li class="nav-item"><a class="nav-link text-dark" aria-current="page" href="{{route('evento.index')}}">Eventos</a></li>
              <li class="nav-item"> <a class="nav-link text-dark" href="{{route('noticia.index')}}">Notícias</a></li>
              @endif
              <div class="dropdown">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="" id="navbarScrollingDropdown" role="button"  data-bs-toggle="dropdown" aria-expanded="false">
                        {{auth()->user()->name}}
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li claas="nav-item dropdown"> 
                        <a href="#"> {{auth()->user()->userType}} </a>
                        </li>
                        <li class ="nav-item dropdown">
                          <a href="/user/profile">editar informações</a>
                        </li>
                        <li  class ="nav-item dropdown"> 
                          <a class="dropdown-item" href="#">
                                <form  action="/logout" method="POST">
                                      @csrf
                                      <a href="logout" onclick="event.preventDefault();
                                      this.closest('form').submit();" >
                                      <h3>Sair</h3>
                                    </a>
                                </form>
                          </a>     
                        </li>
                      </ul>
                    </li> 
               </div> 
                <li class="nav-item"> <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a></li>
              @endauth
            </ul>
          </div>
        </div>
      </nav> 
    </header>
        @if (session('msg'))
          <p class="msg">{{session("msg")}}</p>    
        @endif
    @yield('content') 
    <footer class="footer">
      <div class="container p-6">
        <div class="row justify-content-md-center">
          <div class="footcontent col-lg-3 col-md-3 mb-4 mb-md-0">
            <h4 class="text-light">Contatos: </h4>
            <ul class="list-unstyled mb-0">
              <li><i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>
                <p class="p_redes"><a href="http://neabiifrn@gmail.com" target="_blanck">neabi.ifrn@gmail.com</a></p>
              </li>
              <li><i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                <p class="p_redes"> <a href="http://www.instagram.com/neabipdf/" target="_blanck">@neabipdf</a></p>
              </li>
            </ul>
          </div>
          <div class="footcontent col-lg-3 col-md-3 mb-4 mb-md-0">
            <h4 class="text-light">Organização:</h4>
            <ul class="list-unstyled mb-0">
              <li>
                <h1 class="text-light">Gilson Rodrigues</h1>
                <h1 class="text-light">Francisco Lucena</h1>
              </li>
            </ul>
          </div>
          <div class="footcontent col-lg-3 col-md-3 mb-4 mb-md-0">
            <h4 class="text-light">Apoio:</h4>
            <ul class="list-unstyled mb-0">
              <li> 
                <div class="col-xs-12" style="justify-content: flex-end;"><img src="{{URL::asset('/img/LogoIFRN- branca.png')}}" width="190px" height="80px" alt="Logo IFRN"></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  </body>
</html>