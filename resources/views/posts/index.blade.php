@extends("layouts.app")

@section("nombrePagina")
    Bienvenido
@endsection


@section("contenido")
    <div class="flex justify-center items-center">
        <div class="grid grid-cols-2 gap-4">
            <div class="px-5">
                <img src="/imgs/usuario.svg" class="rounded" alt="Imagen Perfil">
            </div>
            <div class="px-5 md:flex md:flex-col md:justify-center">
                <p class="text-gray-700 text-xl uppercase mb-5 font-bold text-center">Bienvenido de Vuelta: {{auth()->user()->username}}</p>
                <p class="text-gray-800 text-sm mb-4 font-bold">
                    0 <span class="font-normal">Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-4 font-bold">
                    0 <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-4 font-bold" id="numeroPosts">
                </p>
                <a class="font-bold uppercase text-gray-600 border text-center p-1 rounded-lg flex items-center align-middle justify-center gap-3 border-gray-600 hover:bg-gray-600 hover:text-white" href="{{route("user_show")}}">
                    Editar Perfil
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path d="m2.695 14.762-1.262 3.155a.5.5 0 0 0 .65.65l3.155-1.262a4 4 0 0 0 1.343-.886L17.5 5.501a2.121 2.121 0 0 0-3-3L3.58 13.419a4 4 0 0 0-.885 1.343Z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <h2 class="text-center text-4xl font-black mt-10">Publicaciones</h2>
    <h3 class="text-center mt-10 hidden" id="noPublicaciones">No tienes publicaciones</h3>
    <section class="container mx-auto mt-10" >
        <div id="seccionPosts" class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 space-y-4 "></div>
    </section>
@endsection

@section("scripts")
    <script src="/js/posts/home.js" type="module"></script>
@endsection
