<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Galería</title>
</head>

<body>
    <h1>Mi Galería de Arte</h1>
    <hr>

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
            </div>
        @endforeach
    </div>

</body>

</html>
