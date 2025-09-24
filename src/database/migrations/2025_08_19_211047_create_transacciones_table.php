<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id(); //id BIGINT AUTOINCREMENT PRIMARY KEY
            $table->string('descripcion');    //descripcion VARCHAR
            $table->decimal('monto', 10, 2);    // monto DECIMAL
            $table->date('fecha_transaccion');    //fecha DATE
            $table->foreignId('categoria_id')->constrained();
            $table->foreignId('grupo_id')->constrained();
            $table->foreignId('user_id')->constrained();

          //$table->foreign('categoria_id')->references('idcategoria')->on('categorias_transacciones');
            $table->timestamps();  //created_at y updated_at (TIMESTAMPS)
            $table->softDeletes(); //deleted_at (TIMESTAMP)
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacciones');
    }
};
