<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $carrinho = Carrinho::select('carrinhos.*', 'produtos.nome', 'produtos.preco', 'produtos.categoria', 'produtos.descricao', 'produtos.id as produto_id', 'estoques.tamanho')
            ->where('user_id', auth()->user()->id)
            ->with('produto')
            ->join('estoques', 'estoques.id', '=', 'carrinhos.estoque_id')
            ->join('produtos', 'produtos.id', '=', 'estoques.produto_id')
            ->get();
        
        
        if($carrinho->isEmpty()){
            return redirect()->route('home');
        }
        $enderecos = auth()->user()->enderecos;
        $formaPagamento = $request->inputFormaPagamento ?? 'cartao';
        return view('carrinho.checkout')
            ->with('carrinho', $carrinho)
            ->with('enderecos', $enderecos)
            ->with('frete', 25)
            ->with('formaPagamento', $formaPagamento);
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
