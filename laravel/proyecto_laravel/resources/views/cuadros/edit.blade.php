<x-app>
    @section('title', 'Editar Obra')
    
    @section('content')
        <section class="container pt-5  mb-5">
            
            <div class="mb-4">
                <a href="{{ route('home') }}" class="btn btn-outline-dark px-4 py-2">
                    Volver a la galería
                </a>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9">
                    <div class="card border-0 shadow-lg p-4 p-md-5">
                        
                        <h2 class="display-6 fw-bold mb-4 text-center">Editar Obra</h2>
                        
                        {{-- Previsualización de la imagen actual mejorada --}}
                        <div class="text-center mb-2  rounded ">
                            @if (Str::startsWith($cuadro->urlImg, 'http'))
                                <img src="{{ $cuadro->urlImg }}" class="img-fluid rounded shadow-sm" style="max-height: 250px; object-fit: contain;" alt="{{ $cuadro->nombre }}">
                            @else
                                <img src="{{ asset('storage/' . $cuadro->urlImg) }}" class="img-fluid rounded shadow-sm" style="max-height: 250px; object-fit: contain;" alt="{{ $cuadro->nombre }}">
                            @endif
                        </div>

                        <hr class="mb-4">

                        <form action="{{ route('cuadros.update', $cuadro->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            {{-- Campo NOMBRE --}}
                            @error('nombre')
                                <div class="alert alert-danger py-2">{{ $message }}</div>
                            @enderror
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingInputNombre" name="nombre" placeholder="Nombre" value="{{ old('nombre', $cuadro->nombre) }}">
                                <label for="floatingInputNombre">Título de la obra</label>
                            </div>

                            {{-- Campo AUTOR --}}
                            @error('autor')
                                <div class="alert alert-danger py-2">{{ $message }}</div>
                            @enderror
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingInputAutor" name="autor" placeholder="Autor" value="{{ old('autor', $cuadro->autor) }}">
                                <label for="floatingInputAutor">Autor</label>
                            </div>

                            {{-- Campo ÉPOCA --}}
                            @error('epocaPintura')
                                <div class="alert alert-danger py-2">{{ $message }}</div>
                            @enderror
                            <div class="form-floating mb-5">
                                <input type="text" class="form-control" id="floatingInputEpoca" name="epocaPintura" placeholder="Época" value="{{ old('epocaPintura', $cuadro->epocaPintura) }}">
                                <label for="floatingInputEpoca">Época o Estilo</label>
                            </div>

                            <div class="d-flex gap-3">
                                <a href="{{ route('cuadros.show', $cuadro->id) }}" class="btn btn-outline-secondary w-50 py-2">Cancelar</a>
                                <button type="submit" class="btn btn-dark w-50 py-2">Guardar Cambios</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    @endsection
</x-app>