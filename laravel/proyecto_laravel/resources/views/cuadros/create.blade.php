<x-app>
    @section('title', 'Creación de cuadros')
    @section('content')
        <h1>Aquí crear un nuevo Cuadro</h1>


        <form action="{{ route('cuadros.store') }}" method="post">
            @csrf
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputNombre" name="nombre" value="{{ old('nombre') }}"><br><br>
                <label for="floatingInputNombre">Nombre:</label>
            </div>

             @error('autor')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputAutor" name="autor" value="{{ old('autor') }}"><br><br>
                <label for="floatingInputAutor">Autor:</label>
            </div>

             @error('epocaPintura')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputEpoca" name="epocaPintura" value="{{ old('epocaPintura') }}"><br><br>
                <label for="floatingInputEpoca">Época de Pintura:</label>
            </div>
            @error('urlImg')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
 
                <label for="urlImg">URL de la Imagen:</label>
                <input type="u" id="urlImg" name="urlImg" value="{{ old('urlImg') }}"><br><br>


            <input type="submit" value="Crear Cuadro">
        </form>

        <br><br>
        <a href="{{route('cuadros.index')}}">Volver</a>


    @endsection

</x-app>
