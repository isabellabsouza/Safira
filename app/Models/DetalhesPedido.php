<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalhesPedido extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'sobrenome',
        'pedido_id',
        'endereco_id',
        'telefone',
        'cpf',
    ];
}
