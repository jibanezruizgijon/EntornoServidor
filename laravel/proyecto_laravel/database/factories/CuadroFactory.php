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
        
        $epocas = ['RENACIMIENTO', 'BARROCO', 'ROMANTICISMO', 'IMPRESIONISMO', 'CUBISMO', 'CONTEMPORANEO'];

        return [
            'nombre' => $this->faker->words(2, true),

            'autor' => $this->faker->name(),

            'epocaPintura' => $this->faker->randomElement($epocas),

            'urlImg' => 'https://picsum.photos/640/480?random=' . $this->faker->numberBetween(1, 1000),
        ];
    }
}
