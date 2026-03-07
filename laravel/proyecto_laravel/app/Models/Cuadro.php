<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Cuadro extends Model
{
    use HasFactory;

    protected $table = 'cuadros';


    public function votos()
    {
        return $this->hasMany(Voto::class);
    }


    protected function nombre(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return Str::upper($value);
            },
        );
    }

    protected function epocaPintura(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return Str::upper($value);
            },
        );
    }

    public function miVoto()
    {
        return $this->hasOne(Voto::class)->where('user_id', Auth::id());
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
