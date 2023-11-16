<?php

namespace App\Repositories;

use App\Models\Produto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProdutoRepository
{
    public function create(Request $request): Produto
    {
        $produtoData = $request->except('_token');
        //dd($produtoData);
        //$produtoData['imagem'] = $request->file('imagem')->store('produtos');

        return Produto::create($produtoData);
    }

    public function update(Produto $produto, array $data): bool
    {
        return $produto->update($data);
    }

    public function delete(Produto $produto): bool
    {
        return $produto->delete();
    }
}