<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Voto extends Model

{
    use HasFactory;

    protected $fillable = [
        'puntuacion',
        'user_id',
        'cuadro_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cuadro()
    {
        return $this->belongsTo(Cuadro::class);
    }
}
