<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'titulo',
        'descricao',
        'midia',
        'status',
        'rua',
        'bairro',
        'cidade',
        'lat',
        'lng',
        'user_id',
        'like'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}