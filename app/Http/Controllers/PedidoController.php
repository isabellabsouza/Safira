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

        $itensCarrinho = Carrinho::select('carrinhos.*', 'produtos.nome', 'produtos.preco', 'produtos.categoria', 'produtos.descricao', 'produtos.id as produto_id', 'estoques.tamanho', 'estoques.id as estoque_id')
            ->where('user_id', auth()->user()->id)
            ->with('produto')
            ->join('estoques', 'estoques.id', '=', 'carrinhos.estoque_id')
            ->join('produtos', 'produtos.id', '=', 'estoques.produto_id')
            ->get();
        

        foreach ($itensCarrinho as $item){
            ItemPedido::create([
                'pedido_id' => $pedido->id,
                'estoque_id' => $item->estoque_id,
                'quantidade' => $item->quantidade,
            ]);
        }

        Carrinho::where('user_id', auth()->user()->id)->delete();
        
        return to_route('profile.pedidos');
    }

    public function show($id)
    {
        $pedido = Pedido::find($id);

        $itens_pedido = Produto::select('item_pedidos.*','produtos.id', 'produtos.nome', 'produtos.preco', 'produtos.descricao', 'imagem_produtos.caminho')
            ->where('item_pedidos.pedido_id', '=', $id)
            ->join('estoques', 'produtos.id', '=', 'estoques.produto_id')
            ->join('item_pedidos', 'estoques.id', '=', 'item_pedidos.estoque_id')
            ->join('imagem_produtos', 'produtos.id', '=', 'imagem_produtos.produto_id')
            ->groupBy('estoques.id')
            ->get();        
            
        return view('pedido-show')
            ->with('pedido', $pedido)
            ->with('itens_pedido', $itens_pedido);
    }
}
