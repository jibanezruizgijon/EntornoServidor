<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Especifica la tabla asociada al modelo
    protected $table = 'posts';

    // El campo titulo se guardará con la primera letra en mayúscula y el resto en minúscula
    protected function title(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                return ucfirst(strtolower($value));
            },
        );
    }

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    // Si queremos que se busque por el título en lugar del id
    // public function getRouteKeyName()
    // {
    //     return 'title';
    // }

    // Especifica los campos que se pueden asignar 
    protected $fillable = ['title', 'content', 'author'];

    // Campos que no se pueden asignar masivamente
    protected $guarded = ['id', 'created_at', 'updated_at', 'is_active'];
}
