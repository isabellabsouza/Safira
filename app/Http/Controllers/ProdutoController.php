<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\Produto;
use App\Repositories\ProdutoRepository;
use Illuminate\Http\Request;
use App\Models\ImagemProduto;

class ProdutoController extends Controller
{
    public function __construct(private ProdutoRepository $repository){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $produto = $this->repository->create($request);
        
        foreach ($request->file('imagens') as $imagem) {

            $imagemProduto = new ImagemProduto();
            
            $imagemProduto->produto_id = $produto->id;
            $imagemProduto->caminho = $imagem->store('imagens_produtos/'.$produto->id, 'public');
            $imagemProduto->save();
            unset($imagemProduto);
        }

        $tamanhos = ['P', 'PP', 'M', 'G', 'GG'];

        foreach ($tamanhos as $tamanho) {
            Estoque::create([
                'produto_id' => $produto->id,
                'tamanho' => $tamanho,
                'quantidade' => 0,
            ]);
        }


        return to_route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $produto = Produto::find($id);
        //por enquanto vou fazer produtos recomendados aleatorios
        $produtosRecomendados = Produto::inRandomOrder()
            ->where('id', '!=', $id)
            ->limit(4)
            ->get();

            
        //dd($produto->imagemProduto);
        return view('produtos-show')
            ->with('produto', $produto)
            ->with('produtosRecomendados', $produtosRecomendados);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($produto)
    {
        $produto = Produto::find($produto);
        $produto->delete();
        
        return to_route('dashboard.produtos');
    }

    public function status($id)
    {
        
        $produto = Produto::find($id);
        
        if($produto->status == 'inativo'){
            $produto->status = 'ativo';
        }else{
            $produto->status = 'inativo';
        }
        $produto->save();

        return to_route('dashboard.produtos');
    }
}
