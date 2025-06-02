@extends("layouts.app")

@section("nombrePagina")
    Iniciar Sesión
@endsection

@section("contenido")
    <div class="md:flex md:items-center md:justify-center min-h-screen px-4 gap-8">
        <div class="md:w-1/2 flex justify-center items-center mb-6 md:mb-0">
            <img src="/imgs/login.jpg" class="rounded-lg" alt="Imagen de Login">
        </div>

        <div class="md:inset-1/2 bg-white p-6 rounded-lg shadow-sm border w-full max-w-xl">
            <h3 class="text-center uppercase text-2xl mb-6 font-bold">Inicia Sesión</h3>

            <form id="formIniciarSesion">
                <input type="hidden" name="csrf" id="csrf" value="{{csrf_token()}}">

                <div class="mb-5">
                    <label for="email" class="mb-2 block w-full uppercase font-bold text-gray-500">E-Mail</label>
                    <input type="email" name="email" id="email" class="border p-3 w-full rounded-lg" placeholder="Tu Email de Registro">
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" name="password" id="password" class="border w-full p-3 rounded-lg" placeholder="*****">
                </div>

                <div class="mb-5 flex justify-between items-center">
                    <a href="{{route("crear-cuenta")}}" class="font-bold uppercase text-gray-500">Crear Cuenta</a>
                    <a href="#" class="font-bold uppercase   text-gray-500">Olvide Password</a>
                </div>
                <div class="mb-5">
                    <input type="submit" class="w-full p-3 bg-gray-600 text-white text-center rounded-lg uppercase font-bold cursor-pointer hover:bg-gray-700" value="Iniciar Sesión">
                </div>
            </form>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="/js/auth/iniciarSesion.js"></script>
@endsection
