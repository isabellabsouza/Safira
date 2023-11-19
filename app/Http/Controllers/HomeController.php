<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //$produtos = Produto::all();
        $produtos = Produto::with('imagemProduto')->get();
        return view('index')->with('produtos', $produtos);
    }    
}
