<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->date('data');
            $table->string('categoria');
            $table->string('localizacao');
            $table->foreignId('organizador_id')->constrained('users')->onDelete('cascade');
            $table->integer('capacidade');
            $table->decimal('preco', 8, 2);
            $table->timestamps();
            $table->string('imagem');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
