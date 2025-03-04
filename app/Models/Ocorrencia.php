<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'midia',
        'status',
        'endereco',
        'user_id'
    ];

    protected $casts = ['endereco' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
