<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    // Define quais campos podem ser preenchidos em massa (mass assignment)
    protected $fillable = ['reclamacao_id', 'satisfacao'];

    // Define o relacionamento desta avaliação com uma reclamação (cada avaliação pertence a uma reclamação)
    public function reclamacao() {
        return $this->belongsTo(Reclamacao::class);
    }
}