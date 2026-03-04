<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Galería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"> </script>
</head>

<body>
    <h1>Mi Galería de Arte</h1>
    <hr>
 <a href="{{ route('cuadros.create') }}" class="btn btn-primary">Nuevo Cuadro</a>
    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach ($cuadros as $cuadro)
            <div style="border: 1px solid #ccc; padding: 10px; text-align: center; width: 250px;">
                <h3>{{ $cuadro->nombre }}</h3>
                <p><strong>Autor:</strong> {{ $cuadro->autor }}</p>
                <p><em>{{ $cuadro->epocaPintura }}</em></p>

                @if (Str::startsWith($cuadro->urlImg, 'http'))
                    <img src="{{ $cuadro->urlImg }}" alt="{{ $cuadro->nombre }}" style="max-width: 100%; height: auto;">
                @else
                    <img src="{{ asset($cuadro->urlImg) }}" alt="{{ $cuadro->nombre }}"
                        style="max-width: 100%; height: auto;">
                @endif
                @if(auth()->user()->rol === 'ADMIN')
                    <form action="{{ route('cuadros.destroy', $cuadro) }}" method="POST" style="margin-top: 10px;">
                        @csrf @method('DELETE') <button type="submit" 
                                onclick="return confirm('¿Estás seguro de que deseas borrar el cuadro {{ $cuadro->nombre }}?')" 
                                style="background-color: #dc3545; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer; width: 100%;">
                            Eliminar Cuadro
                        </button>
                    </form>
                    <a href="{{ route('cuadros.edit', $cuadro) }}" class="btn btn-warning">Editar Cuadro</a>
                @endif
            </div>
        @endforeach
        
    </div>
{{ $cuadros->links() }}
</body>

</html>
