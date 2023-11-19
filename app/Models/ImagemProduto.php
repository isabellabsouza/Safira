<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemProduto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'caminho',
        'produto_id'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
