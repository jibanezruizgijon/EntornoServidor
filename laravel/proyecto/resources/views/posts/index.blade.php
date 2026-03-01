<x-app>

    @section('content')

    <a href="/post/create">Nuevo Post</a>
    <ul>
        @foreach ($posts as $post)
        <li>
            <a href="/post/{{$post->id}}">
                <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
            </a>
        </li>
                @endforeach
        </ul>
    @endsection


</x-app>
