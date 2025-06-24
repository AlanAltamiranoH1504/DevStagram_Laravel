@extends("layouts.app")

@section("nombrePagina")
    Editar Perfil - {{auth()->user()->username}}
@endsection

@section("contenido")
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6 rounded-md">
            <form class="mt-10 md:mt-0" id="formUpdatePerfil">
                <input type="hidden" name="csrf" id="csrf" value="{{csrf_token()}}">

                <div class="mb-5 mt-3" id="divErrores"></div>
                <div class="mb-5 mt-3">
                    <label class="mb-2 block uppercase text-gray-600 font-bold text-center">Imagen de Perfil Actual</label>
                   <div class="md:flex justify-center">
                       <div class="md:flex md:justify-center items-center align-middle bg-gray-600 shadow border rounded-lg p-3 w-1/2">
                           <img class="max-h-56" src="{{$user->imagen ? asset('storage/'.$user->imagen) : "/imgs/usuario.svg"}}">
                       </div>
                   </div>
                </div>
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-600 font-bold">Imagen de Perfil</label>
                    <input type="file" accept=".jpg, .jpeg, .png" id="imagen" class="border p-3 w-full rounded-lg">
                </div>

                <div class="mb-5">
                    <label for="nombre" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input type="text" id="nombre" class="border p-3 w-full rounded-lg" value="{{$user->name}}" placeholder="Tu nombre">
                </div>

                <div class="mb-5">
                    <label for="userName" class="mb-2 block uppercase text-gray-500 font-bold">Nombre de Usuario</label>
                    <input type="text" id="userName" class="border p-3 w-full rounded-lg" value="{{$user->username}}" placeholder="Nombre de Usuario">
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" class="border p-3 w-full rounded-lg" value="{{$user->email}}" placeholder="Email de registro">
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" class="border p-3 w-full rounded-lg" placeholder="Password">
                </div>

                <div class="mb-5">
                    <label for="password2" class="mb-2 block uppercase text-gray-500 font-bold">Confirmar Password</label>
                    <input type="password" id="password2" class="border p-3 w-full rounded-lg" placeholder="*****">
                </div>
                <div class="mb-5">
                    <input type="submit" value="Actualizar Perfil" class="border cursor-pointer hover:bg-gray-700 bg-gray-600 p-2 w-full text-white rounded-lg font-bold uppercase">
                </div>
            </form>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="/js/usuarios/updatePerfil.js" type="module"></script>
@endsection
