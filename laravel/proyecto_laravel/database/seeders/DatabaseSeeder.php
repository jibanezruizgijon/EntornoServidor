<?php

namespace Database\Seeders;

use App\Models\Cuadro;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        Cuadro::factory(20)->create();

        User::factory()->create([
            'name' => 'administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'), 
            'rol' => 'ADMIN'
        ]);
    }
}
