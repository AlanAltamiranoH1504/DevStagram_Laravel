<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite("resources/css/app.css")
        <title>DevStagram - @yield("nombrePagina")</title>
    </head>
    <body>
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">DevStagram</h1>
                <nav class="flex gap-4 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="#">Iniciar Sesión</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="#">Crear Cuenta</a>
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">@yield("nombrePagina")</h2>
            @yield("contenido")
        </main>

        <footer class="text-center p-5 text-gray-600 font-bold uppercase">
            DevStagram - Derechos Reservados {{date("Y")}}
        </footer>
    </body>
</html>
