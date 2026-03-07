<x-app>
    @section('title', 'Añadir Nuevo Cuadro')
    
    @section('content')
        <section class="container pt-5 mt-5 mb-5">
            
            <div class="mb-4">
                <a href="{{ route('home') }}" class="btn btn-outline-dark px-4 py-2">
                    Volver a la galería
                </a>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9">
                    <div class="card border-0 shadow-lg p-4 p-md-5">
                        
                        <h2 class="display-6 fw-bold mb-4 text-center">Añadir Nuevo Cuadro</h2>
                        <hr class="mb-4">

                        <form action="{{ route('cuadros.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            
                            {{-- Campo NOMBRE --}}
                            @error('nombre')
                                <div class="alert alert-danger py-2">{{ $message }}</div>
                            @enderror
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingInputNombre" name="nombre" placeholder="Nombre del cuadro" value="{{ old('nombre') }}">
                                <label for="floatingInputNombre">Título del cuadro</label>
                            </div>

                            {{-- Campo AUTOR --}}
                            @error('autor')
                                <div class="alert alert-danger py-2">{{ $message }}</div>
                            @enderror
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingInputAutor" name="autor" placeholder="Autor" value="{{ old('autor') }}">
                                <label for="floatingInputAutor">Autor</label>
                            </div>

                            {{-- Campo ÉPOCA --}}
                            @error('epocaPintura')
                                <div class="alert alert-danger py-2">{{ $message }}</div>
                            @enderror
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingInputEpoca" name="epocaPintura" placeholder="Época" value="{{ old('epocaPintura') }}">
                                <label for="floatingInputEpoca">Época o Estilo</label>
                            </div>

                            {{-- Campo IMAGEN --}}
                            @error('urlImg')
                                <div class="alert alert-danger py-2">{{ $message }}</div>
                            @enderror
                            <div class="mb-5">
                                <label for="urlImg" class="form-label text-muted ms-1">Selecciona la imagen del cuadro:</label>
                                <input type="file" class="form-control form-control-lg" id="urlImg" name="urlImg">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark btn-lg">Añadir cuadro a la Galería</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    @endsection
</x-app>