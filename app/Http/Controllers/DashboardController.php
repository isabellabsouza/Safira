<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Produto;

class DashboardController extends Controller
{
    public function pedidos()
    {
        return view('dashboard.pedidos')->with('pedidos', Pedido::all());
    }

    public function usuarios()
    {
        //$qtdClientes = User::all()->where('role', 'user')->count();
        //dd($qtdClientes);

        return view('dashboard.usuarios')->with([
            'usuarios' => User::all()->where('role', 'admin'),
            'qtdClientes' => User::all()->where('role', 'user')->count(),
        ]);
    }

    public function produtos()
    {
        $produtos = Produto::with('estoque')->get();

        return view('dashboard.produtos')->with([
            'produtos' => $produtos,

        ]);

    }
}
