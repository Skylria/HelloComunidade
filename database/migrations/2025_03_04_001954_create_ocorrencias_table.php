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
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('tipo');
            $table->string('titulo');
            $table->text('descricao');
            $table->text('midia')->nullable(); // Link ou arquivo
            $table->string('status')->default('pendente'); // pendente, em andamento, resolvido
            $table->string('rua'); // Rua, bairro e cidade
            $table->string('bairro');
            $table->string('cidade');
            $table->string('lat');
            $table->string('lng');
            $table->bigInteger('like')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ocorrencias');
    }
};