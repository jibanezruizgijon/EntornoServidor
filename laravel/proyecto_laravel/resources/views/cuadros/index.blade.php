<x-app>
    @section('title', 'Galería de Arte')
    {{-- Menú de navegación --}}
    @section('head')
        <nav class="navbar navbar-expand-lg bg-dark fixed-top shadow-sm z-3 " data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand fw-bold tracking-wide" href="#">Galería de Arte</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto"> <a class="nav-link" href="{{ route('ranking') }}">Ranking</a>
                        @if (auth()->user()->rol === 'ADMIN')
                            <a href="{{ route('cuadros.create') }}" class="nav-link text-warning">Nuevo Cuadro</a>
                        @endif
                        <form action="{{ route('logout') }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link ">Cerrar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    @endsection

    @section('content')
        <div class="bg-light min-vh-100 pt-5 pb-5">
            <div class="container mt-5">
                <h1 class="display-5 fw-light text-center mb-5">Colección de Cuadros</h1>
                
                <div class="row">
                    @foreach ($cuadros as $cuadro)
                        <div class="col-md-4 mb-5">
                            <div class="card h-100 border-0 shadow-sm">
                                @if (Str::startsWith($cuadro->urlImg, 'http'))
                                    <a href="{{ route('cuadros.show', $cuadro) }}">
                                        <img src="{{ $cuadro->urlImg }}" class="card-img-top rounded-top" alt="{{ $cuadro->nombre }}" style="object-fit: cover; height: 250px;">
                                    </a>
                                @else
                                    <a href="{{ route('cuadros.show', $cuadro) }}">
                                        <img src="{{ asset('storage/' . $cuadro->urlImg) }}" class="card-img-top rounded-top" alt="{{ $cuadro->nombre }}" style="object-fit: cover; height: 250px;">
                                    </a>
                                @endif
                                
                                <div class="card-body d-flex flex-column text-center">
                                    <h4 class="card-title fw-bold" style="font-family: Georgia, 'Times New Roman', serif; letter-spacing: 0.5px;">{{ $cuadro->nombre }}</h4>
                                    <p class="card-text mb-1">
                                        <span class="text-muted small">Autor:</span> 
                                        <span class="fw-semibold text-dark">{{ $cuadro->autor }}</span>
                                    </p>
                                    <p class="card-text small fst-italic text-secondary mb-4">{{ $cuadro->epocaPintura }}</p>
                                    
                                    <div class="mt-auto">
                                        @if (auth()->user()->rol === 'ADMIN')
                                            <div class="d-grid gap-2">
                                                <a href="{{ route('cuadros.edit', $cuadro) }}" class="btn btn-outline-secondary btn-sm">Editar</a>
                                                <form action="{{ route('cuadros.destroy', $cuadro) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm w-100" onclick="return confirm('¿Borrar cuadro?')">Eliminar</button>
                                                </form>
                                            </div>
                                        @else
                                            @if ($cuadro->miVoto)
                                                <div class="alert alert-secondary py-2 mb-0 border-0">
                                                    <small>Tu voto: <strong>{{ $cuadro->miVoto->puntuacion }}</strong></small>
                                                </div>
                                            @else
                                                <form action=" {{ route('votos.store', $cuadro) }}" method="post" class="bg-white p-2 border rounded">
                                                    @csrf
                                                    <select name="puntuacion" class="form-select form-select-sm mb-2 shadow-none">
                                                        <option value="">Puntuar...</option>
                                                        <option value="1">1 - Muy mala</option>
                                                        <option value="2">2 - Mala</option>
                                                        <option value="3">3 - Regular</option>
                                                        <option value="4">4 - Buena</option>
                                                        <option value="5">5 - Excelente</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-dark btn-sm w-100">Votar</button>
                                                </form>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-4">
                    {{ $cuadros->links() }}
                </div>
            </div>
        </div>
    @endsection
</x-app>