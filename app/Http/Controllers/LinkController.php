<?php

namespace App\Http\Controllers;


use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function store(Request $request){

        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $resultado = '';

        for ($i = 0; $i < 10; $i++) {
            $resultado .= $caracteres[random_int(0, strlen($caracteres) - 1)];
        }

        $link = new Link();
        $link->link = $request->link;
        $link->description = $request->description;
        $link->identifier = $this->generateUniqueIdentifier();
        $link->save();
        return response()->json($link, 201);
    }

    private function generateUniqueIdentifier($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        do {
            $identifier = '';
            for ($i = 0; $i < $length; $i++) {
                $identifier .= $characters[random_int(0, strlen($characters) - 1)];
            }
        } while (Link::where('identifier', $identifier)->exists());

        return $identifier;
    }

    public function show($identifier)
    {
        $link = Link::where('identifier', $identifier)->first();

        if (!$link) {
            return response()->json(['message' => 'Link not found'], 404);
        }

        return response()->json($link);
    }
}
