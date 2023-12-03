<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\DetalhesPedido;
use App\Models\ItemPedido;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

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
        //Gerar numero do pedido aleatório e unico
        while(true){
            $numeroPedido = rand(100000, 999999);
            $pedido = Pedido::where('numero', $numeroPedido)->first();
            if(!$pedido){
                break;
            }
        }

        $pedido = Pedido::create([
            'user_id' => auth()->user()->id,
            'valor_total' => $request->total,
            'numero' => $numeroPedido,
            'status' => 'Aguardando pagamento',
        ]);

        $nome = substr($request->nome, 0, strpos($request->nome, ' '));
        $sobrenome = substr($request->nome, strpos($request->nome, ' ')+1);

        //id, nome, sobrenome, pedido_id, endereco_id, telefone, cpf
        $detalhes_pedido = DetalhesPedido::create([
            'nome' => $nome,
            'sobrenome' => $sobrenome,
            'pedido_id' => $pedido->id,
            'endereco_id' => $request->endereco,
            'telefone' => $request->telefone,
            'cpf' => $request->cpf,
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
        /*$itens_pedido = DB::table('item_pedidos')
            ->join('produtos', 'item_pedidos.produto_id', '=', 'produtos.id')
            ->join('imagem_produtos', 'produtos.id', '=', 'imagem_produtos.produto_id')
            ->select('item_pedidos.*', 'produtos.nome', 'produtos.preco', 'produtos.descricao', 'imagem_produtos.caminho')
            ->where('item_pedidos.pedido_id', '=', $id)
            ->get();
        */



        $itens_pedido = Produto::where('item_pedidos.pedido_id', '=', $id)
            ->join('item_pedidos', 'produtos.id', '=', 'item_pedidos.produto_id')
            ->join('imagem_produtos', 'produtos.id', '=', 'imagem_produtos.produto_id')
            ->select('item_pedidos.*','produtos.id', 'produtos.nome', 'produtos.preco', 'produtos.descricao', 'imagem_produtos.caminho')
            ->groupBy('produtos.id')
            ->get();

        return view('pedido-show')
            ->with('pedido', $pedido)
            ->with('itens_pedido', $itens_pedido);
    }
}
