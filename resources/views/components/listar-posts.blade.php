<div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($posts as $post)
            <div>
                <a href="/posts/{{$post->id}}/{{$post->title}}">
                    <img src="/storage/{{$post->imagen}}">
                </a>
            </div>
        @endforeach
    </div>
</div>
