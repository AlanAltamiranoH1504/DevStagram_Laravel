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
                <p class="text-gray-700 text-2xl font-bold text-center mb-5">Usuario de
                    DevStagram: {{$usuario->username}}</p>
                <p class="text-gray-800 text-sm mb-4 font-bold">
                    {{$usuario->followers->count()}} <span class="font-normal">Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-4 font-bold">
                    0 <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-4 font-bold">
                    {{$usuario->posts->count()}} <span class="font-normal">Posts</span>
                </p>

                @if(auth()->user())
                    @if($usuario->followers->contains("id", auth()->user()->id))
                        <form action="{{ route('user_unfollow') }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="userPerfil" value="{{ $usuario->username }}">
                            <input type="submit"
                                   class="font-bold uppercase border border-red-600 cursor-pointer text-center p-1 rounded-lg w-full hover:bg-red-600 hover:text-white"
                                   value="Dejar de Seguir"/>
                        </form>
                    @else
                        <form method="post" action="{{route("user_follow")}}" class="mt-2">
                            @csrf
                            <input type="hidden" name="userPerfil" id="userPerfil" value="{{$usuario->username}}">
                            <input type="submit"
                                   class="font-bold uppercase border border-indigo-600 cursor-pointer text-center p-1 rounded-lg w-full  hover:bg-indigo-600 hover:text-white"
                                   value="Seguir"/>
                        </form>
                    @endif
                @else
                    <a href="{{route("login")}}"
                       class="font-bold text-xl text-white text-center border rounded-lg p-1 uppercase bg-indigo-500 hover:bg-indigo-700">Inciar
                        Sesion para Seguir</a>
                @endif
            </div>
        </div>
    </div>

    <h2 class="text-center text-4xl font-black mt-10">Publicaciones</h2>
    <h3 class="text-center mt-10 hidden" id="noPublicaciones">No tienes publicaciones</h3>
    <section class="container mx-auto mt-10">
        <div id="seccionPosts" class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 space-y-4 ">
            @foreach($usuario->posts as $post)
                <div class="bg-white shadow p-4 rounded border">
                    <a href="/posts/{{$post->id}}/{{$post->title}}">
                        <img src="/storage/{{$post->imagen}}" alt="Imagen del post {{$post->title}}">
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
