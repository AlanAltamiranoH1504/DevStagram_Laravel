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
                <p class="text-gray-700 text-2xl uppercase mb-5 font-bold text-center">Bienvenido de Vuelta: {{auth()->user()->username}}</p>
                <p class="text-gray-800 text-sm mb-4 font-bold">
                    0 <span class="font-normal">Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-4 font-bold">
                    0 <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-4 font-bold">
                    0 <span class="font-normal">Posts</span>
                </p>
            </div>
        </div>
    </div>
@endsection

@section("scripts")

@endsection
