<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'quantidade',
        'produto_id',
        'pedido_id'
    ];
    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }

    public function produto(){
        return $this->hasOne(Produto::class);
    }
}
