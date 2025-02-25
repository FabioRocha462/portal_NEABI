@extends('layouts.main')
@section('title', 'Criar Login')
@section('content')
<link rel="stylesheet" href={{URL::asset('css/create_login_admin.css')}}>
<main class="container">
  <div class="create_login">
    <div class ="social-fields">
      <div class="social-field facebook">
          <a href="#">
              <i>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg>
              </i>
              <span>Crie seu login com  o Facebook</span>
          </a>
      </div>
         
  </div>
    <hr>
    <form action="">
        <div class="mb-3">
          <h2>Crie seu Login</h2>
            <label for="exampleInputEmail1" class="form-label"></label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="nome">
            <div id="emailHelp" class="form-text"></div>
          </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"></label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="e-mail">
            <div id="emailHelp" class="form-text"></div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"></label>
            <input type="password" class="form-control" id="exampleInputPassword1"placeholder="senha">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"></label>
            <input type="password" class="form-control" id="exampleInputPassword1"placeholder="confirme sua senha">
          </div>
          <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="submit">Enviar</button>
          </div>
    </form>
    <hr>
</div>
</main>
@endsection