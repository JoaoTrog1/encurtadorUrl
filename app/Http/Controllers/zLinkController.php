<?php

namespace App\Http\Controllers;


use App\Models\Link;
use App\Models\Category;
use App\Models\Lock;
use Illuminate\Http\Request;

class zLinkController extends Controller {


    public function index(){
        $links = Link::orderBy("created_at","desc")->paginate(10);

        return view("lista-link", ["links"=> $links]);
    }

    public function create(){
        //Link::with(['locks.category'])->get();
        $categorias = Category::all();
        return view('create-link', ['categorias'=> $categorias]);
    }

    public function store(Request $request){

        $request->validate([
            'description' => 'required|string|max:255',
            'link' => 'required|url',
            'categories' => 'array',
            'locks' => 'array',
        ]);
    
        $link = new Link();
        $link->link = $request->link;
        $link->description = $request->description;
        $link->identifier = $this->generateUniqueIdentifier();
        $link->save();
        
        if ($request->locks) {
            foreach ($request->locks as $cont => $lockDescription) {
        
                    $lock = new Lock();
                    $lock->linkLock = $lockDescription;
                    $lock->FkIdLink = $link->id;
                    $lock->FkIdCategory = $request->category[$cont];
                    $lock->save();

            }
        }
        
        

        return $link->identifier;
    }

    private function generateUniqueIdentifier($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        do {
            $identifier = '';
            for ($i = 0; $i < $length; $i++) {
                $identifier .= $characters[random_int(0, strlen($characters) - 1)];
            }
        } while (Link::where('identifier', $identifier)->exists());

        return $identifier;
    }

    public function show($identifier) {


        $link = Link::where('identifier', $identifier);

        if (!$link) {
            return redirect('404');
        }

     
        $blocks = $link->locks;

        $blocksWithCategories = $blocks->map(function($block) {
            return [
                'block' => $block,
                'category' => $block->category, 
            ];
        });

        return view('link', ['link' => $link]);


        
        
    }
}
