<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Estoque;
use App\Repositories\CarrinhoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itens = Carrinho::select('carrinhos.*', 'produtos.nome', 'produtos.preco', 'produtos.categoria', 'produtos.descricao', 'produtos.id as produto_id', 'estoques.tamanho')
            ->where('user_id', auth()->user()->id)
            ->with('produto')
            ->join('estoques', 'estoques.id', '=', 'carrinhos.estoque_id')
            ->join('produtos', 'produtos.id', '=', 'estoques.produto_id')
            ->get();
        
        
        foreach ($itens as $item) {
            $item->total = $item->produto->preco * $item->quantidade;
        }
    
        $total = $itens->sum('total');

        return view('carrinho.index', ['itens' => $itens,])
                ->with('total', $total);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valide a requisição, certificando-se de que recebeu o produto_id e a quantidade
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        // Obtenha o usuário autenticado
        $user = Auth::user();

        $tamanho = $request->input('btnradio'); 
        $estoque_id = Estoque::where('produto_id', $request->produto_id)
            ->where('tamanho', $tamanho)
            ->first()
            ->id;

        // Verifique se já existe um item para o produto no carrinho do usuário
        $itemExistente = Carrinho::where('user_id', $user->id)
            ->where('estoque_id', $estoque_id)
            ->first();

        // Se o item já existe, atualize a quantidade
        if ($itemExistente) {
            $itemExistente->increment('quantidade', $request->quantidade);
        } else {
            // Se não existir, crie um novo item no carrinho
            Carrinho::create([
                'user_id' => $user->id,
                'estoque_id' => $estoque_id,
                'quantidade' => $request->quantidade,
            ]);
        }

        // Redirecione de volta à página de produtos ou para onde desejar
        return to_route('carrinho.index')
            ->with('message', 'Item adicionado ao carrinho com sucesso!')
            ->with('messageType', 'success');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Carrinho $carrinho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrinho $carrinho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrinho $carrinho)
    {
        $request->validate([
            'id' => 'required|exists:carrinhos,id',
        ]);

        $user = Auth::user();

        $itemExistente = Carrinho::where('user_id', $user->id)
            ->where('id', $request->id)
            ->first();
        
        if(!$itemExistente){
            return to_route('carrinho.index')
                ->with('message', 'Item não existe!')
                ->with('messageType', 'danger');
        }

        //Vou verificar se o botão apertado foi o btnPlus ou btnMinus
        if ($request->input('action') == 'btnPlus') {
            $itemExistente->increment('quantidade');
        } else {
            $itemExistente->decrement('quantidade');
        }

        //verificar se a quantidade é 0, se for, deletar o item
        if ($itemExistente->quantidade == 0) {
            $itemExistente->delete();
        }


        return to_route('carrinho.index')
            ->with('message', 'Item atualizado com sucesso!')
            ->with('messageType', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($carrinho)
    {
        //dd($carrinho);
        $carrinho = Carrinho::find($carrinho);
        $carrinho->delete();

        return to_route('carrinho.index')
            ->with('message', 'Item removido do carrinho!')
            ->with('messageType', 'success');
    }
}
