<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reclamacao_id')->constrained('reclamacoes'); // Chave estrangeira para a tabela de reclamações
            $table->string('satisfacao'); // "Muito satisfeito", "Satisfeito", "Não satisfeito"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('avaliacoes');
    }
};