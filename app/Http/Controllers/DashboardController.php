<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use App\Models\Produto;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

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
            'admins' => User::all()->where('role', 'admin'),
            'qtdClientes' => User::all()->where('role', 'user')->count(),
            'users' => User::all()->where('role', 'user'),
        ]);
    }

    public function produtos()
    {
        $produtos = Produto::with('estoque')->get();

        return view('dashboard.produtos')->with([
            'produtos' => $produtos,

        ]);

    }

    public function novoAdmin()
    {
        return view('dashboard.usuario-create');
    }

    public function storeNovoAdmin(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>'admin',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
