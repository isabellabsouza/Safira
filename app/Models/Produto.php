<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'categoria'
    ];

    public function estoque()
    {
        return $this->hasMany(Estoque::class);
    }

    public function imagemProduto()
    {
        return $this->hasMany(ImagemProduto::class);
    }
}
