<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupos';

    protected $guarded = [];

    public function transacciones(): HasMany {
        return $this->hasMany(Transaccion::class);
    }
}
