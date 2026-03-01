<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('cuadros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('autor');
            $table->string('epocaPintura');
            $table->string('urlImg')->nullable();   
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('cuadros');
    }
};
