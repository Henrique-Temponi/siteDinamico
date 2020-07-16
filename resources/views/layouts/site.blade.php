<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}</title>

        <!-- Twitter card data -->
        <meta name="twitter:card" value="summary">

        <!-- Open Graph -->
        <meta property="og:title" content="{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}"/> 
        <meta property="og:type" content="website"/> 
        <meta property="og:url" content="{{ isset($seo['url']) ? $seo['url'] : config('app.url') }}"/> 
        <meta property="og:image" content="{{ isset($seo['imagem']) ? $seo['imagem'] : config('seo.imagem') }}"/> 
        <meta property="og:description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>

        <header>
            @include('layouts._site._nav')
        </header>

        <main>
        @if(Session::has('mensagem'))

        <div class="container">
            <div class="row">
                <div class="card {{ Session::get('mensagem')['class'] }}">
                    <div class="card-content" align="center">
                        {{ Session::get('mensagem')['msg'] }}
                    </div>
                </div>
            </div>
        </div>

        @endif
            @yield('content')
        </main>
        
        @include('layouts._site._footer')
        
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('js/materialize.min.js') }}"></script>
        <script src="{{ asset('js/init.js') }}"></script>
    </body>
</html>
