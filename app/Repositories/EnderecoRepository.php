<?php

namespace App\Repositories;

use App\Http\Requests\EnderecoRequest;
use App\Models\Endereco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EnderecoRepository
{
    public function create(Request $request): Endereco
    {

        $user = Auth::user();
        $enderecoData = $request->except('_token');
        $enderecoData['user_id'] = $user->id;
        
        //dd($enderecoData);

        return Endereco::create($enderecoData);
        
    }


    public function update(Endereco $endereco, array $data): bool
    {
        return $endereco->update($data);
    }

    public function delete(Endereco $endereco): bool
    {
        return $endereco->delete();
    }
}
