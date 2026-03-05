<x-app>
    @section('title', 'Creación de cuadros')
    @section('content')
        <section class="container-md">
            <div class="row mt-3 justify-content-center">
                <div class="col-md-6">
                    <h1>Aquí crear un nuevo Cuadro</h1>


                    <form action="{{ route('cuadros.store') }}" class="p-4 bg-primary-subtle border rounded needs-validation"
                        method="post">
                        @csrf
                        @error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInputNombre" name="nombre" placeholder=""
                                value="{{ old('nombre') }}"><br><br>
                            <label for="floatingInputNombre">Nombre:</label>
                        </div>

                        @error('autor')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInputAutor" name="autor" placeholder=""
                                value="{{ old('autor') }}"><br><br>
                            <label for="floatingInputAutor">Autor:</label>
                        </div>

                        @error('epocaPintura')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInputEpoca" name="epocaPintura"
                                placeholder="" value="{{ old('epocaPintura') }}"><br><br>
                            <label for="floatingInputEpoca">Época de Pintura:</label>
                        </div>
                        @error('urlImg')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="urlImg">Selecciona imagen:</label>
                        <input type="file" id="urlImg" name="urlImg" value="{{ old('urlImg') }}"><br><br>

                        <div>
                            <button type="submit" class="btn bg-primary text-light w-100">Crear Cuadro</button>
                        </div>
                    </form>

                    <br><br>
                    <a href="{{ route('cuadros.index') }}" class="btn btn-primary">Volver</a>


                </div>
            </div>
        </section>
    @endsection

</x-app>
