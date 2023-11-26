<?php

namespace App\Repositories;

use App\Models\Carrinho;
use App\Models\Produto;
use Illuminate\Support\Arr;

class CarrinhoRepository
{
    // public static function buscarProdutosCarrinho()
    // {

    //     $cartItems = self::buscarItensCarrinho();
    //     $ids = Arr::pluck($cartItems, 'product_id');
    //     $produtos = Produto::query()->whereIn('id', $ids)->get();
    //     $cartItems = Arr::keyBy($cartItems, 'product_id');

    //     return [$produtos, $cartItems];
    // }

    // public static function buscarItensCarrinho()
    // {
    //     $request = \request();
    //     $user = $request->user();
    //     if ($user) {
    //         return Carrinho::where('user_id', $user->id)->get()->map(
    //             fn($item) => ['produto_id' => $item->produto_id, 'quantidade' => $item->quantidade]
    //         );
    //     } else {
    //         return self::getCookieCartItems();
    //     }
    // }

    // public static function getCookieCartItems()
    // {
    //     $request = \request();
    //     return json_decode($request->cookie('itens_carrinho', '[]'), true);
    // }
}