<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamacao extends Model
{
    use HasFactory;

    // Define quais campos podem ser preenchidos em massa (mass assignment)
    protected $fillable = ['descricao', 'usuario_id', 'status'];

    // Define o relacionamento desta reclamação com um usuário (cada reclamação pertence a um usuário)
    public function usuario() {
        return $this->belongsTo(User::class);
    }

    // Define o relacionamento desta reclamação com uma avaliação (cada reclamação pode ter uma avaliação)
    public function avaliacao() {
        return $this->hasOne(Avaliacao::class);
    }
}