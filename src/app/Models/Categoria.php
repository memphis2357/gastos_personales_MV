<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
//importar el trait HasFactory para poder usarlo
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    //indicar al modelo que puedes usar CategoriaFactory
    use HasFactory;
    protected $guarded = [1];
    //Relacion con el modelo Transaccion
    //Se llama em plural porque la relacion puede devolver multiples categorias
    public function transacciones(): HasMany {
        return $this->hasMany(Transaccion::class);
    }
}
