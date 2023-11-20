<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /*
    * Também referente à carrinho de compras, o pedido é o momento em que o usuário finaliza a compra.
    */
    public function index()
    {
        //$user_id = auth()->user()->id;
        $pedido_id = Pedido::all()->where('user_id', auth()->user()->id)->last()->id;
        $itens = Item::all()->where('pedido_id', $pedido_id);
        
        foreach ($itens as $item) {
            $produto = Produto::find($item->produto_id);
            $produtos[] = $produto;
        }
        
        return view('carrinho.index')->with([
            'itens' => $itens, 
            'produtos' => $produtos
        ]);

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Pedido $pedido)
    {
        //
    }

    public function edit(Pedido $pedido)
    {
        //
    }

    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    public function destroy(Pedido $pedido)
    {
        //
    }
}
