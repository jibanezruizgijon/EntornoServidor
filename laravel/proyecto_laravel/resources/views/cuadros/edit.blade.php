<x-app>
    @section('content')
        <h1>Editar Cuadro</h1>
        <form action="{{ route('cuadros.update', $cuadro->id) }}" method="post">
            @csrf
            @method('PUT')
            
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $cuadro->nombre) }}"><br><br>

            @error('autor')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" value="{{ old('autor', $cuadro->autor) }}"><br><br>

            @error('epocaPintura')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="epocaPintura">Época de Pintura:</label>
            <input type="text" id="epocaPintura" name="epocaPintura" value="{{ old('epocaPintura', $cuadro->epocaPintura) }}"><br><br>

            @error('urlImg')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="urlImg">URL de la Imagen:</label>
            <input type="url" id="urlImg" name="urlImg" value="{{ old('urlImg', $cuadro->urlImg) }}"><br><br>

            <input type="submit" value="Actualizar Cuadro">
        </form>
    @endsection
</x-app>