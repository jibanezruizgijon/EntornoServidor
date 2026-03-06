<x-app>
 @section('title', 'Ranking de cuadros')
    @section('content')
        <div class="container">
            <h1>Ranking de Cuadros</h1>
            <hr>
            <div class="row">
                @foreach ($cuadros as $cuadro)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
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
                                <p class="card-text"><strong>Puntuación:</strong> {{ number_format($cuadro->votos()->avg('voto'), 2) }}</p>
                            </div>
                        </div>
                    {{ $cuadros->links() }}
                    </div>
                @endforeach
            </div>
        </div>
    @endsection

</x-app>