@extends("layouts.app")

@section("nombrePagina")
    Registrate en DevStagram
@endsection

@section("contenido")
    <div class="md:flex md:items-center md:justify-center min-h-screen px-4 gap-8">
        <!-- Imagen -->
        <div class="md:w-1/2 flex justify-center items-center mb-6 md:mb-0">
            <img src="/imgs/login.jpg" class="rounded-lg">
        </div>

        <!-- Formulario -->
        <div class="md:w-1/2 bg-white p-6 rounded-lg shadow-sm border w-full max-w-xl">
            <h3 class="text-center uppercase text-2xl font-bold mb-10">Registra Tu Cuenta</h3>

            <div id="errores" ></div>

            <form id="formCrearCuenta">
                <input type="hidden" name="csrf" id="csrf" value="{{csrf_token()}}">

                <div class="mb-5">
                    <label for="nombre" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input type="text" id="nombre" class="border p-3 w-full rounded-lg" placeholder="Tu nombre">
                </div>

                <div class="mb-5">
                    <label for="userName" class="mb-2 block uppercase text-gray-500 font-bold">Nombre de Usuario</label>
                    <input type="text" id="userName" class="border p-3 w-full rounded-lg" placeholder="Nombre de Usuario">
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" class="border p-3 w-full rounded-lg" placeholder="Email">
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" class="border p-3 w-full rounded-lg" placeholder="Password">
                </div>

                <div class="mb-5">
                    <label for="password2" class="mb-2 block uppercase text-gray-500 font-bold">Confirmar Password</label>
                    <input type="password" id="password2" class="border p-3 w-full rounded-lg" placeholder="*****">
                </div>

                <div class="mb-5 flex justify-between items-center text-sm">
                    <a href="/iniciar-sesion" class="text-gray-600">Iniciar Sesión</a>
                    <a href="/olvide-password" class="text-gray-500">Olvide Password</a>
                </div>

                <div class="mb-5">
                    <input type="submit" value="Registrar Cuenta" class="border cursor-pointer hover:bg-gray-700 bg-gray-600 p-3 w-full text-white rounded-lg font-bold uppercase">
                </div>
            </form>
        </div>
    </div>
@endsection

@section("scripts")

    <script src="/js/auth/crearCuenta.js" type="module"></script>
@endsection

