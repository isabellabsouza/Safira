<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function itens(){
        return $this->hasMany(Item::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
