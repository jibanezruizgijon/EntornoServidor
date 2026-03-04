<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuadro extends Model
{
    use HasFactory;

    protected $table = 'cuadros';


    public function votos()
    {
        return $this->hasMany(Voto::class);
    }

    public function getMediaAttribute()
    {
        return $this->votos()->avg('puntuacion') ?? 0.0;
    }

    
    protected $fillable = [
        'nombre',
        'autor',
        'epocaPintura',
        'urlImg',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
