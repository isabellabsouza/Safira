<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        //$produtos = Produto::all();
        //$produtos = Produto::all()->where('ativo', 1)->with('imagemProduto')->get();
        $produtos = Produto::with('imagemProduto')->get();
        $produtos_mais_pedidos = Produto::select('produtos.*', DB::raw('COUNT(produtos.id) AS qtd'))
            ->join('estoques', 'estoques.produto_id', '=', 'produtos.id')
            ->join('item_pedidos', 'estoques.id', '=', 'item_pedidos.estoque_id')
            ->groupBy('produto_id')
            ->orderBy('qtd', 'DESC')
            ->limit(8)
            ->get();
        /*
            query equivalente em sql:
            SELECT produtos.*, COUNT(produtos.id) AS qtd
            FROM produtos
            INNER JOIN estoques ON estoques.produto_id = produtos.id
            INNER JOIN item_pedidos ON estoques.id = item_pedidos.estoque_id
            GROUP BY produto_id
            ORDER BY qtd DESC
            LIMIT 8
            
        */
        
        
        /*
        $produtos_mais_pedidos = Produto::select('produtos.*', DB::raw('COUNT(produtos.id) AS qtd'))
            ->join('estoques', 'estoques.produto_id', '=', 'produtos.id')
            ->join('item_pedidos', 'estoques.id', '=', 'item_pedidos.estoque_id')
            ->groupBy('produto_id')
            ->orderBy('qtd', 'DESC')
            ->limit(8)
            ->get();*/
        return view('index')->with('produtos', $produtos_mais_pedidos);
    }    
}
