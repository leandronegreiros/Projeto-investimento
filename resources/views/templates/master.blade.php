<!DOCTYPE html>
<html lang="pt-br">
<html>
    <head>
        <meta charset="UTF-8">
        <title>Investindo</title>
        <link rel="stylesheet" href="{{asset('css/stylesheet.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
        <script src="https://kit.fontawesome.com/fdf205482b.js"></script>
        @yield('css-view')
    </head>

    <body>
        @include('templates.menu-lateral')

        <section id="view-conteudo">
            @yield('conteudo-view')
        </section>

        @yield('js-view')

    </body>

</html>
