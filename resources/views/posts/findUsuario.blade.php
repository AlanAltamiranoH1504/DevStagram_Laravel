@extends("layouts.app")

@section("nombrePagina")
    {{$usuario->username}}
@endsection

@section("contenido")
    <div class="flex justify-center items-center">
        <div class="grid grid-cols-2 gap-4">
            <div class="px-5">
                <img src="/imgs/usuario.svg" class="rounded" alt="Imagen Perfil">
            </div>
            <div class="px-5 md:flex md:flex-col md:justify-center">
                <p class="text-gray-700 text-2xl font-bold text-center mb-5">Usuario de DevStagram: {{$usuario->username}}</p>
                <p class="text-gray-800 text-sm mb-4 font-bold">
                    0 <span class="font-normal">Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-4 font-bold">
                    0 <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-4 font-bold">
                    0 <span class="font-normal">Posts</span>
                </p>

                @if(auth()->user())
                    <button type="button" class="font-bold text-xl text-white text-center border rounded-lg p-2 uppercase bg-indigo-500 hover:bg-indigo-700">Seguir</button>
                @else
                    <a href="{{route("login")}}" class="font-bold text-xl text-white text-center border rounded-lg p-2 uppercase bg-indigo-500 hover:bg-indigo-700">Inciar Sesion para Seguir</a>
                @endif
            </div>
        </div>
    </div>
@endsection
