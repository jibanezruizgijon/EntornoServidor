<x-app>
    @section('title', 'Editar de cuadros')
    @section('content')
        <section class="container-md">
            <div class="row mt-3 justify-content-center">
                <div class="col-md-6">
                    <h1 class="text-center">Editar Cuadro</h1>
                    <form action="{{ route('cuadros.update', $cuadro->id) }}"
                        class="p-4 bg-primary-subtle border rounded needs-validation" method="post">
                        @csrf
                        @method('PUT')

                        {{-- Campo NOMBRE --}}
                        @error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-floating ">
                            <input type="text" class="form-control" id="floatingInputNombre" name="nombre"
                                value="{{ old('nombre', $cuadro->nombre) }}"><br><br>
                            <label for="floatingInputNombre">Nombre:</label>
                        </div>

                        {{-- campo AUTOR --}}
                        @error('autor')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-floating ">
                            <input type="text" class="form-control" id="floatingInputAutor" name="autor"
                                value="{{ old('autor', $cuadro->autor) }}"><br><br>
                            <label for="floatingInputAutor">Autor:</label>
                        </div>

                        {{-- campo EpocaPintura --}}
                        @error('epocaPintura')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-floating">
                            <input type="text" id="epocaPintura" class="form-control" id="floatingInputEpoca"
                                name="epocaPintura" value="{{ old('epocaPintura', $cuadro->epocaPintura) }}"><br><br>
                            <label for="floatingInputEpoca">Época de Pintura:</label>
                        </div>

                        {{-- Campo para la imagen --}}
                        <div class="text-center mb-4">
                            @if (Str::startsWith($cuadro->urlImg, 'http'))
                                <img src="{{ $cuadro->urlImg }}" class="img-fluid img-thumbnail w-50"
                                    alt="{{ $cuadro->nombre }}">
                            @else
                                <img src="{{ asset('storage/' . $cuadro->urlImg) }}" class="img-fluid img-thumbnail w-50"
                                    alt="{{ $cuadro->nombre }}">
                            @endif
                        </div>
                        {{-- Separar el boton y el enlace --}}
                        <div class="d-flex justify-content-around">
                            <input type="submit" class="btn btn-success" value="Actualizar Cuadro">
                            <a href="{{ route('cuadros.index') }}" class="btn btn-secondary">Volver</a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </section>
    @endsection
</x-app>
