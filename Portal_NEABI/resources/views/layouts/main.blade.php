<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
  </head>
  <body> 
    <header class="menu-area">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid"><img class="navbar-brand" src="../img/Logo-NEABI-horizontal- SEM FUNDO.png" width="200px" height="70px">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto" style="width: 0rem;">
              <li class="nav-item"> <a class="nav-link text-dark" aria-current="page" href="../index.html">Inicio  </a></li>
              <li class="nav-item"><a class="nav-link text-dark" aria-current="page" href="../Conceitos.html">Conceitos</a></li>
              <li class="nav-item"> <a class="nav-link text-dark" href="../noticias.html">Notícias</a></li>
              <li class="nav-item"> <a class="nav-link text-dark" href="../depoimentos.html">Depoimentos</a></li>
              <li class="nav-item"><a class="nav-link text-dark" href="../duvidas.html">Dúvidas</a></li>
              <li class="nav-item"> <a class="nav-link text-dark" href="../Sobre.html">Sobre</a></li>
              <li class="nav-item"> <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
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
                <div class="col-xs-12" style="justify-content: flex-end;"><img src="../img/LogoIFRN- branca.png" width="190px" height="80px" alt="Logo IFRN"></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"> </script>
  </body>
</html>