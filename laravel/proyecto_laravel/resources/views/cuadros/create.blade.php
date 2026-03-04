<x-app>
    @section('title', 'Página de creación de cuadros')
    @section('content')
        <h1>Aquí crear un nuevo Cuadro</h1>


        <form action="{{ route('cuadros.store') }}" method="post">
            @csrf
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"><br><br>

             @error('autor')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" value="{{ old('autor') }}"><br><br>

             @error('epocaPintura')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="epocaPintura">Época de Pintura:</label>
            <input type="text" id="epocaPintura" name="epocaPintura" value="{{ old('epocaPintura') }}"><br><br>
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
