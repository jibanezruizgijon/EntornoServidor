<x-app>

    @section('content')
    <h1 class="text-4xl font-bold text-center mb-4">Aqui se muestran los post</h1>
    <a href="{{ route('post.create') }}" class="btn btn-primary">Nuevo Post</a>
    <ul> 
        @foreach ($posts as $post)
        <li>
            <a href="{{route('post.show', $post->id)}}">
                <h3 class="text-2xl font-bold">{{ $post->title }}</h3>
            </a>
        </li>
                @endforeach
        </ul>
         {{ $posts->links() }}
    @endsection


</x-app>
