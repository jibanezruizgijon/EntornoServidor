<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cuadro>
 */
class CuadroFactory extends Factory
{
    public function definition()
    {
        // Posibles épocas de pintura (simulando tu Enum de Java)
        $epocas = ['RENACIMIENTO', 'BARROCO', 'ROMANTICISMO', 'IMPRESIONISMO', 'CUBISMO', 'CONTEMPORANEO'];

        return [
            // words(2, true) genera una frase de 2 palabras como String
            'nombre' => $this->faker->words(2, true),

            // Genera un nombre de persona aleatorio
            'autor' => $this->faker->name(),

            // Elige un elemento aleatorio del array de épocas
            'epocaPintura' => $this->faker->randomElement($epocas),

            // OPCIÓN RECOMENDADA: Usa tus fotos locales del 1 al 24
            //'urlImg' => 'imagenesLogos/img' . $this->faker->numberBetween(1, 24) . '.jpg',

            // Genera una URL externa 100% fiable con una imagen aleatoria
            'urlImg' => 'https://picsum.photos/640/480?random=' . $this->faker->numberBetween(1, 1000),
        ];
    }
}
