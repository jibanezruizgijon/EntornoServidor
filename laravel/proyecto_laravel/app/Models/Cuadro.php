<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuadro extends Model
{
    use HasFactory;

    // !!!!!!!! No entiendo esta parte
    protected $fillable = [
        'autor',
        'epocaPintura',
        'urlImg',
    ];

    public function votos()
    {
        return $this->hasMany(Voto::class);
    }

    public function getMediaAttribute()
    {
        return $this->votos()->avg('puntuacion') ?? 0.0;
    }
}
