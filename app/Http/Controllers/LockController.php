<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Lock;
use Illuminate\Support\Facades\Auth;

class LockController extends Controller {

    public function destroy($lock)
    {
        if (Auth::check()) {
            $lock = Lock::find($lock);
            if ($lock) {
                $lock->delete();
            }
            return redirect()->back();
        }
        return redirect()->route('painel')->with(['message' => 'Acesso negado.']);
    }


}

