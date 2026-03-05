<x-app>
    @section('title', 'Cuadro')
    @section('content')
    <h1>Aquí se mostrará el cuadro: {{ $cuadro->id }}</h1>
    <h2><b>Nombre: </b>{{ $cuadro->nombre }}</h2>
    <p>{{ $cuadro->nombre }}</p>
    <p><strong>Autor</strong>{{ $cuadro->autor }}</p>
    <p><strong>Época/Estilo</strong>{{ $cuadro->espocaPintura }}</p>
    <img src="{{ asset($cuadro->urlImg) }}" alt="{{ $cuadro->nombre }}">
    <a href="{{ route('cuadros.edit', $cuadro->id) }}">Editar Cuadro</a>
    <br><br>
    <a href="{{ route('cuadros.index') }}">Volver</a>
    <br><br>
    <form action="{{ route('cuadros.destroy', $cuadro->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar Cuadro</button>
    </form>
    @endsection
</x-app>