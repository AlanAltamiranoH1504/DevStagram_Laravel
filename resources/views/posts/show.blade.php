@extends("layouts.app")

@section("nombrePagina")
    Detalles - {{$nombrePagina}}
@endsection

@section("contenido")
    <div class="container mx-auto md:flex mx-3">
        <div class="md:w-1/2 border p-5 bg-white shadow rounded-lg">
            <img src="" alt="Imagen del post" class="h-96 mx-auto rounded" id="imgPublicacion">
            <div class="p-3">
                <p class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                    </svg>
                    <span id="countLikes" class="font-bold"></span>
                </p>
            </div>
            <div class="p-3">
                <p class="font-bold flex gap-2 align-middle items-center my-2" id="nombreUsuario"></p>
                <p class="text-sm flex gap-2 align-middle items-center my-2" id="fechaCreacion"></p>
                <p class="mt-5" id="descripcion"></p>
                <form id="formLikePost">
                    <input type="hidden" id="csrfLike" value="{{csrf_token()}}">
                    <button id="btnLikePost" type="button" class="border p-2 mt-3 w-full font-semibold rounded-lg bg-gray-500 text-center text-white flex gap-1 align-middle items-center hover:bg-gray-600">
                        Me Gusta
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </button>
                </form>
                <form id="formDeletePost">
                    <input type="hidden" id="csrfDelete" value="{{csrf_token()}}">
                    <button id="btnEliminarPost" type="button" class="border flex gap-1 p-2 mt-3 w-full font-semibold rounded-lg bg-red-600 text-white hover:bg-red-700 hidden">
                        Eliminar Publicación
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </button>
                </form>
            </div>
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                <p class="text-xl font-bold text-center mb-4">Comentarios</p>
                @if(auth()->user())
                    <p class="text-xl font-bold text-center mb-4">Agrega Un Nuevo Comentario</p>
                    <form id="formNuevoComentario">
                        <input type="hidden" id="csrf" value="{{csrf_token()}}">
                        <div class="mb-5">
                            <label for="comentario" class="p-2 font-semibold uppercase block">Comentario:</label>
                            <textarea id="comentario" name="comentario" class="border w-full p-2 border-gray-600 rounded-lg" rows="8" placeholder="Ingresa tu comentario"></textarea>
                        </div>
                        <div class="">
                            <input type="submit" value="Agregar Comentario" class="border p-2 rounded-lg w-full bg-gray-500 text-white font-semibold cursor-pointer hover:bg-gray-600">
                        </div>
                    </form>
                    <div class="bg-white shadow max-h-96 overflow-y-scroll mt-3" id="comentarios"></div>
                    <div class=" shadow mb-5 max-h-96 hidden" id="noComentarios">
                        <p class=" text-center p-2 bg-orange-500 text-white font-semibold rounded-lg">No hay comentarios disponibles</p>
                    </div>
                @else
                    <p>Inicia Sesión para Agregar Comentarios</p>
                    <a href="/iniciar-sesion" class="my-4 rounded p-2 border block text-center font-semibold bg-gray-500 rounded-lg text-white hover:bg-gray-600 uppercase">Inicar Sesión</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="/js/posts/show.js" type="module"></script>
    <!-- Moment.js -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
@endsection
