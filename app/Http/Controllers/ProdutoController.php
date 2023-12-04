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

    public function index()
    {
        return view('produtos.index')->with('produtos', Produto::all()->where('status', 'ativo'));
    }

    public function novidades()
    {
        return view('produtos.novidades')->with('produtos', Produto::all()->where('status', 'ativo')->sortByDesc('created_at'));
    }

    public function create()
    {
        $categorias = Produto::select('categoria')->distinct()->get();
        return view('produtos-create')
            ->with('categorias', $categorias);
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
            ->with([
                'produto' => $produto,
                'produtosRecomendados' => $produtosRecomendados,
                'estoque' => $produto->estoque,
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::find($id);
        //TODO: fazer a edição de produtos
        $categorias = Produto::select('categoria')->distinct()->get();
        return view('produtos-edit')
            ->with('categorias', $categorias)
            ->with('produto', $produto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $produto = Produto::find($request->id);
        $produto->fill($request->all());
        $produto->update($request->all());
        return to_route('dashboard.produtos');
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

    public function estoque(Request $request){
        $produto = $request->produto_id;
        foreach(['PP', 'P', 'M', 'G', 'GG'] as $tamanho){
            $estoque = Estoque::where('produto_id', $produto)->where('tamanho', $tamanho)->first();
            $estoque->quantidade = $request->$tamanho;
            $estoque->save();
        }


        return to_route('dashboard.produtos');
    }


    public function camisetas()
    {
        $produtos = Produto::all()->where('categoria', 'camisetas')->where('status', 'ativo');
        //dd($produtos);
        return view('categorias.camisetas')->with('produtos', $produtos);
    }

    public function calcas()
    {
        $produtos = Produto::where('categoria', 'calcas')->where('status', 'ativo')->get();
        return view('categorias.calcas')->with('produtos', $produtos);
    }

    public function shorts()
    {
        $produtos = Produto::where('categoria', 'shorts')->where('status', 'ativo')->get();
        return view('categorias.shorts')->with('produtos', $produtos);
    }

    public function vestidos()
    {
        $produtos = Produto::where('categoria', 'vestidos')->where('status', 'ativo')->get();
        return view('categorias.vestidos')->with('produtos', $produtos);
    }

    public function moletom()
    {
        $produtos = Produto::where('categoria', 'moletom')->where('status', 'ativo')->get();
        return view('categorias.moletom')->with('produtos', $produtos);
    }

    public function acessorios()
    {
        $produtos = Produto::where('categoria', 'acessorios')->where('status', 'ativo')->get();
        return view('categorias.acessorios')->with('produtos', $produtos);
    }
}
