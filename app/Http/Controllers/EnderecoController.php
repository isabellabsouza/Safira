<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnderecoRequest;
use App\Models\Endereco;
use App\Repositories\EnderecoRepository;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function __construct(private EnderecoRepository $repository){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Endereco::all()->where('user_id', $request->user()->id);
        return view('profile.partials.endereco');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('endereco-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnderecoRequest $request)
    {
        $this->repository->create($request);
        return to_route('carrinho.checkout');   
    }

    /**
     * Display the specified resource.
     */
    public function show(Endereco $endereco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Endereco $endereco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Endereco $endereco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Endereco $endereco)
    {
        //
    }
}
