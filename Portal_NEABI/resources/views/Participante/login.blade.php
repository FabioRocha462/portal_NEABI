@extends('layouts.main')
@section('title', 'Login Participante')
@section('content')
    <link rel="stylesheet" href={{URL::asset('css/admin/login.css')}}>
<main class="container">
    <div class= "login">
        <div class = 'acesso'>
            <h2>ACESSE SUA CONTA</h2>
        </div>
        <div class="footer">
            <div class ="social-fields">
                <div class="social-field facebook">
                    <a href="#">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                              </svg>
                        </i>
                        <span>Conecte-se com  o Facebook</span>
                    </a>
                </div>
                   
            </div>
        </div>
        <form action="">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"></label>
                <input type="email" name = 'email' class="form-control" id="exampleFormControlInput1" placeholder="e-mail">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"></label>
                <input type="password" name='senha' class="form-control" id="exampleInputPassword1"placeholder="senha">
              </div>
              <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" type="button">Entrar</button>
              </div>
            <a class="esquecer_senha" href="#">Esqueceu sua Senha?</a>
            <div class=fundo>
            </div>
        </form>
        <hr>
        <p>Não tem uma conta? <a href="#">Cadastre-se</a></p>
      </div> 
</main>  
@endsection
