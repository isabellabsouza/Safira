<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        
        // Remove caracteres especiais
        $searchTerm = preg_replace('/[^A-Zà-Úa-z0-9\-]/', '', $searchTerm); 

        if(empty($searchTerm)) {
            return redirect()->route('home');
        }

        $produtos = Produto::select("produtos.*")
            ->where("nome", "LIKE", "%{$searchTerm}%")
            ->get();

        return view('search')
            ->with('searchTerm', $searchTerm)
            ->with('produtos', $produtos);
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
        //
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
