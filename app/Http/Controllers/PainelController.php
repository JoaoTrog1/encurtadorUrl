<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;    

class PainelController extends Controller
{
    public function painel()
    {
        return view("/encurtador/painel/login");
    }

    public function login(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        
        $user = User::where('name', $request->name)->first();

        if ($user && $user->password === $request->password) {
            Auth::login($user);
            return redirect()->route('links.index');
        }

        return redirect()->route('painel')->with(['message' => 'Dados incorretos.']);

        
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('painel');
    }
}
