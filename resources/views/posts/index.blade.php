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
