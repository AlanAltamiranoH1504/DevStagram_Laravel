<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite("resources/css/app.css")
        @vite("resources/js/app.js")
        <title>DevStagram - @yield("nombrePagina")</title>
    </head>
    <body>
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <a href="/" class="text-3xl font-black hover:text-indigo-700">DevStagram</a>

                @if(auth()->user())
                    <nav class="flex gap-4 items-center">
                        <a class="font-bold uppercase text-gray-600 text-xl" href="{{route("home-devStagram")}}">Perfil</a>
                        <form action="{{route("cerrar-sesion")}}" method="post" id="formCerrarSesion">
                            <input type="hidden" name="csrf" id="csrf" value="{{csrf_token()}}">
                            <button type="submit" class="font-bold uppercase text-red-800 hover:text-red-950 text-xl">Cerrar Sesión</button>
                        </form>
                    </nav>
                @else
                    <nav class="flex gap-4 items-center">
                        <a class="font-bold uppercase text-indigo-600 hover:text-indigo-800 text-xl" href="{{route("login")}}">Iniciar Sesión</a>
                        <a class="font-bold uppercase text-gray-600 hover:text-gray-800 text-xl" href="{{route("crear-cuenta")}}">Crear Cuenta</a>
                    </nav>
                @endif
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">@yield("nombrePagina")</h2>
            @yield("contenido")
        </main>

        <footer class="text-center border-t mt-10 p-5 text-gray-600 font-bold uppercase">
            DevStagram - Derechos Reservados {{date("Y")}}
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield("scripts")
    </body>
</html>
