@extends("layouts.app")

@section("nombrePagina")
    Nuevo Post
@endsection


@section("contenido")
    @section("contenido")
        <div class="md:flex md:items-start gap-10">
            <div class="md:w-1/2 flex justify-center items-center mb-6 md:mb-0">
                <form action="/imagen" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded-lg flex flex-col justify-center items-center">
                </form>
            </div>
            <div class="md:w-1/2 bg-white p-6 rounded-lg shadow-sm border w-full max-w-xl">
                <h3 class="text-center uppercase text-xl mb-6 font-bold">Publicación Nueva</h3>

                <form id="formNuevaPublicacion">
                    <input type="hidden" name="csrf" value="{{csrf_token()}}">
                    <div class="mb-5">
                        <label for="titulo" class="mb-2 block uppercase font-bold text-gray-600">Titulo:</label>
                        <input id="titulo" name="titulo" type="text" class="border p-3 w-full rounded-lg" placeholder="Titulo de la publicación">
                    </div>
                    <div class="mb-5">
                        <label for="descripcion" class="mb-2 block uppercase text-gray-600 font-bold">Descripción:</label>
                        <textarea id="descripcion" class="border rounded-lg w-full p-3" placeholder="Descripción de la publicación" cols="60" rows="10"></textarea>
                    </div>
                    <div class="mb-5">
                        <input class="border border-gray-600 p-3 w-full font-semibold uppercase rounded-lg bg-gray-600 text-white hover:bg-white hover:text-gray-600" type="submit" value="Crear Publicación">
                    </div>
                </form>
            </div>
        </div>
    @endsection

@endsection


@section("scripts")
    <script src="/js/posts/nuevoPost.js"></script>
@endsection
