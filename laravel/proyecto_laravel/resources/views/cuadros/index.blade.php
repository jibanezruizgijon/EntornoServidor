<x-app>
    @section('head')
        <div class="col">
            <nav class="navbar navbar-expand-lg bg-danger" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Inicio</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Inicio</a>
                            <a class="nav-link" href="{{ route('ranking') }}">Ranking</a>
                            @if (auth()->user()->rol === 'ADMIN')
                                <a href="{{ route('cuadros.create') }}" class="nav-link">Nuevo Cuadro</a>
                            @endif
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Cerrar Sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    @endsection
    @section('content')
        <div class="container">

            <h1>Mi Galería de Arte</h1>
            <hr>
            <div class="row">
                @foreach ($cuadros as $cuadro)
                    <div class="card">

                        @if (Str::startsWith($cuadro->urlImg, 'http'))
                            <a href="{{ route('cuadros.show', $cuadro) }}">
                                <img src="{{ $cuadro->urlImg }}" class="card-img-top" alt="{{ $cuadro->nombre }}">
                            </a>
                        @else
                            <a href="{{ route('cuadros.show', $cuadro) }}">
                                <img src="{{ asset('storage/' .$cuadro->urlImg) }}" class="card-img-top" alt="{{ $cuadro->nombre }}">
                            </a>
                        @endif
                        <div class="card-body text-center">
                            <h3 class="card-title">{{ $cuadro->nombre }}</h3>
                            <p class="card-text"><strong>Autor:</strong> {{ $cuadro->autor }}</p>
                            <p class="card-text"><em>{{ $cuadro->epocaPintura }}</em></p>
                        </div>

                        @if (auth()->user()->rol === 'ADMIN')
                        <a href="{{ route('cuadros.edit', $cuadro) }}" class="btn btn-warning">Editar Cuadro</a>
                            <form action="{{ route('cuadros.destroy', $cuadro) }}" method="POST"
                                style="margin-top: 10px;">
                                @csrf @method('DELETE') <button type="submit" class="btn btn-danger w-100"
                                    onclick="return confirm('¿Estás seguro de que deseas borrar el cuadro \'{{ $cuadro->nombre }}?\'')">
                                    Eliminar Cuadro
                                </button>
                            </form>
                            
                        @else
                            <form action="{{ route('votos.store') }}" method="post">
                                @csrf
                                <select name="voto" id="voto" class="form-select mb-2">
                                    <option value="">Seleccione una puntuación</option>
                                    <option value="1">1 - Muy mala</option>
                                    <option value="2">2 - Mala</option>
                                    <option value="3">3 - Regular</option>
                                    <option value="4">4 - Buena</option>
                                    <option value="5">5 - Excelente</option>
                                </select>
                                <input type="submit" class="btn btn-primary" value="Votar">
                            </form>
                        @endif
                    </div>
                @endforeach

            </div>
            {{ $cuadros->links() }}
        </div>
    @endsection
</x-app>
