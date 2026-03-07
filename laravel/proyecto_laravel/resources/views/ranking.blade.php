<x-app>
    @section('title', 'Ranking de Cuadros')
    
    @section('content')
        <div class="bg-light min-vh-100 pt-5 pb-5">
            <div class="container mt-5">
                
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="display-6 fw-light m-0">Ranking de Cuadros</h1>
                    <a href="{{ route('home') }}" class="btn btn-outline-dark px-4 py-2">
                        Volver a la galería
                    </a>
                </div>
                
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
                                        <img src="{{ asset('storage/' .$cuadro->urlImg) }}" class="card-img-top rounded-top" alt="{{ $cuadro->nombre }}" style="object-fit: cover; height: 250px;">
                                    </a>
                                @endif
                                <div class="card-body text-center d-flex flex-column justify-content-center">
                                    <h4 class="card-title fw-bold">{{ $cuadro->nombre }}</h4>
                                    <p class="card-text text-muted mb-1">{{ $cuadro->autor }}</p>
                                    <p class="card-text small fst-italic text-secondary mb-3">{{ $cuadro->epocaPintura }}</p>
                                    <div class="mt-auto">
                                        <span class="badge bg-dark text-light fs-6 py-2 px-3">
                                            Puntuación media: {{ number_format($cuadro->votos_avg_puntuacion, 2) }}
                                        </span>
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