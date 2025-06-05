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
            <div class="px-5">
                <p class="text-gray-700 text-2xl font-bold text-center">Bienvenido: {{auth()->user()->username}}</p>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="/js/auth/cerrarSesion.js"></script>
@endsection
