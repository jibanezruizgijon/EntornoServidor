<x-app>
    @section('title', 'Detalle de la Obra')
    
    @section('content')
        <div class="container mt-5 mb-5">
            
            <div class="mb-4">
                <a href="{{ route('home') }}" class="btn btn-outline-dark px-4 py-2">
                    Volver a la galería
                </a>
            </div>

            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="row g-0">
                    <div class="col-lg-8 bg-light d-flex align-items-center justify-content-center p-4 p-md-5">
                        @if (Str::startsWith($cuadro->urlImg, 'http'))
                            <img src="{{ $cuadro->urlImg }}" class="img-fluid w-100 rounded shadow-sm" alt="{{ $cuadro->nombre }}" style="object-fit: contain; max-height: 80vh;">
                        @else
                            <img src="{{ asset('storage/' . $cuadro->urlImg) }}" class="img-fluid w-100 rounded shadow-sm" alt="{{ $cuadro->nombre }}" style="object-fit: contain; max-height: 80vh;">
                        @endif
                    </div>

                    <div class="col-lg-4 bg-white">
                        <div class="card-body p-4 p-lg-5 d-flex flex-column h-100 justify-content-center">
                            
                            <h1 class="display-6 fw-bold mb-3">{{ $cuadro->nombre }}</h1>
                            
                            <hr class="w-25 border-dark mb-4">
                            
                            <div class="mb-4">
                                <h5 class="fw-light mb-3"><strong>Autor:</strong> <br> {{ $cuadro->autor }}</h5>
                                <h5 class="fw-light text-muted"><strong>Época/Estilo:</strong> <br> {{ $cuadro->epocaPintura }}</h5>
                            </div>
                            
                            @if (auth()->user()->rol === 'ADMIN')
                                <div class="mt-4 pt-4 border-top mt-auto">
                                    <h6 class="text-muted mb-3">Gestión de la Obra</h6>
                                    <div class="d-flex flex-column gap-2">
                                        <a href="{{ route('cuadros.edit', $cuadro->id) }}" class="btn btn-secondary w-100">Editar Obra</a>
                                        
                                        <form action="{{ route('cuadros.destroy', $cuadro->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('¿Estás seguro de que deseas eliminar permanentemente esta obra?')">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
</x-app>