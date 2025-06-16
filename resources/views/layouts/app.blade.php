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
                <a
                    class="font-bold uppercase border p-1 rounded-lg border-gray-600 bg-gray-500 text-white hover:bg-white hover:text-gray-600
                            flex items-center align-middle gap-2 cursor-pointer"
                    href="{{route("post_create")}}"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"/>
                    </svg>

                    Crear Publicación</a>
                <a class="font-bold uppercase text-gray-600" href="{{route("home-devStagram")}}">Perfil</a>
                <form action="{{route("cerrar-sesion")}}" method="post" id="formCerrarSesion">
                    @csrf
                    <button type="submit" class="font-bold uppercase text-red-600 hover:text-red-800">Cerrar Sesión
                    </button>
                </form>
            </nav>
        @else
            <nav class="flex gap-4 items-center">
                <a class="font-bold uppercase text-gray-200 border p-2 rounded bg-indigo-600 hover:bg-indigo-700" href="{{route("login")}}">Iniciar Sesión</a>
                <a class="font-bold uppercase text-gray-100 border p-2 rounded bg-indigo-600 hover:bg-indigo-700"
                   href="{{route("crear-cuenta")}}">Crear Cuenta</a>
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
