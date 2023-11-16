<?php

namespace App\Repositories;

use App\Models\Estoque;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EstoqueRepository
{
    public function create(Request $request): Estoque
    {
        $estoqueData = $request->except('_token');
        
        //dd($estoqueData);

        return Estoque::create($estoqueData);
    }
}
