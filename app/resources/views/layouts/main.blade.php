<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSS aplicação --}}
        <link rel="stylesheet" href="/public/css/styles.css">
        <script src="/public/js/scripts.js"></script>
        
        {{-- Fonte do Google --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        {{-- CSS Bootsrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        {{-- ICONES --}}
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light" id="nav-bar-home">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/public/img/logo.png" alt="Logo da linguagem Laravel" class="logo">
                    </a>
                    <ul class="navbar-nav">
                        <li><a href="/" class="nav-link">Listagem Eventos</a></li>
                        <li><a href="/events/create" class="nav-link">Criar Eventos</a></li>
                        <li><a href="/" class="nav-link">Entrar</a></li>
                        <li><a href="/" class="nav-link">Cadastrar</a></li>
                    </ul>
                </div>
            </nav>
        </header>        
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if (session('msg'))
                        <div class="msg-container" id="msg-home">
                            {{ session('msg') }}
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <footer>
            <p>HD Events &copy; 2023</p>
        </footer>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
