<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reclamacoes', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->foreignId('usuario_id')->constrained('usuarios'); // Chave estrangeira para a tabela de usuários
            $table->string('status')->default('Reclamação recebida'); // Status da reclamação
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reclamacoes');
    }
};