<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\ItemPedido;
use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all()->where('user_id', auth()->user()->id);
        return view('profile.pedidos', [
            'pedidos' => $pedidos,
            'user' => auth()->user(),
        ]);
    }

    public function store(Request $request)
    {
        
        $pedido = Pedido::create([
            'user_id' => auth()->user()->id,
            'valor_total' => $request->valor_total,
            'numero' => '123456789',
            'status' => 'Aguardando pagamento',
        ]);

        $itensCarrinho = Carrinho::where('user_id', auth()->user()->id)->with('produto')->get();

        

        foreach ($itensCarrinho as $item){
            ItemPedido::create([
                'pedido_id' => $pedido->id,
                'produto_id' => $item->produto_id,
                'quantidade' => $item->quantidade,
            ]);
        }

        Carrinho::where('user_id', auth()->user()->id)->delete();
        
        return to_route('profile.pedidos');
    }

    public function show($id)
    {
        $pedido = Pedido::find($id);
        return view('pedido-show')->with('pedido', $pedido);
    }
}
