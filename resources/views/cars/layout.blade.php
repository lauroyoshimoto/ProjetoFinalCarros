<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!--Fonte do Google -->
 
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!-- CSS Bootstrap -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- CSS da aplicação -->

       <link rel="stylesheet" href= "/css/styles.css">
       <script scr="/js/scripts.js"></script>
       
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collpse navbar-collapse" id="navbar">
                    <a href="/"class="navbar-brand">
                        <img src="/img/hdccars_logo.svg" all="HDC cars">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                        <a href="/create" class="nav-link">Anunciar</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">Meus carros</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf 
                                <a href="/logout" 
                                    class="nav-link"
                                    onclick="car.prcarDefault();
                                    this.closest('form').submit();">
                                    Sair
                                </a>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>  
                        @endguest
                    </ul>
                </div>              
            </nab>              
        </header>   
    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                <p class="msg">{{ session('msg')}}</p>
                @endif
                @yield('content')
            </div>
        </div>
    </main>
    <footer>
        <p> Lauro's Multimarcas &copy; 2022</p>
    </footer>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>   
    </body>
</html>
