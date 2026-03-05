<x-app>
    @section('title', 'Editar de cuadros')
    @section('content')
        <h1>Editar Cuadro</h1>
        <form action="{{ route('cuadros.update', $cuadro->id) }}" method="post">
            @csrf
            @method('PUT')
            
            {{-- Campo NOMBRE --}}
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputNombre" name="nombre" value="{{ old('nombre', $cuadro->nombre) }}"><br><br>
                <label for="floatingInputNombre">Nombre:</label>
            </div>

            {{-- campo AUTOR --}}
            @error('autor')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputAutor"  name="autor" value="{{ old('autor', $cuadro->autor) }}"><br><br>
                <label  for="floatingInputAutor">Autor:</label>
            </div>

            {{-- campo EpocaPintura --}}
            @error('epocaPintura')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" id="epocaPintura" class="form-control" id="floatingInputEpoca" name="epocaPintura" value="{{ old('epocaPintura', $cuadro->epocaPintura) }}"><br><br>
                <label for="floatingInputEpoca">Época de Pintura:</label>
            </div>

            {{-- Campo para la imagen --}}
            @error('urlImg')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
                <input type="url" id="urlImg" class="form-control" name="urlImg" value="{{ old('urlImg', $cuadro->urlImg) }}"><br><br>
                <label for="urlImg">URL de la Imagen:</label>
            
                <div class="mb-3">
    

            <input type="submit" value="Actualizar Cuadro">
        </form>
    @endsection
</x-app>