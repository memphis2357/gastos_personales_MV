<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Transaccion extends Model
{
    use SoftDeletes;
    use HasFactory;

    // Indicar a Laravel que la tabla relacionada se llama Transacciones
    protected $table = 'transacciones';

    // protected $fillable = ['descripcion', 'monto', 'fecha_transaccion'];

    //Permitir usar create() para crear una transaccion
    protected $guarded = [];

    //Relacion con el modelo categoria
    //Se llama em singular porque la relacion devuelve siempre una categoria

    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class);
    }

    public function grupo(): BelongsTo {
        return $this->belongsTo(Grupo::class);
    }

}
