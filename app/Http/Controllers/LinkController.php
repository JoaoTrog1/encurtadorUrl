<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Category;
use App\Models\Lock;
use Illuminate\Support\Facades\Auth;


class LinkController extends Controller
{
   
    
    public function index()
    {

        if (Auth::check()) {
            
            $links = Link::orderBy("created_at","desc")->paginate(10);

            return view("encurtador/painel/links", ["links"=> $links]);
        }
    
        
        return redirect()->route('painel')->with(['message' => 'Acesso negado.']);

    
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            
            $categorias = Category::all();
            return view('encurtador/painel/create-link', ['categorias'=> $categorias]);
        }
    
        
        return redirect()->route('painel')->with(['message' => 'Acesso negado.']);

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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

                    $lock->FkIdCategory = $request->categories[$cont];
                    $lock->save();

            }
        }
        
        

        return $link->identifier;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($identifier)
    {
        $link = Link::where('identifier', $identifier)->first();

        if (!$link) {
            return redirect('404');
        }

     
        $blocks = $link->locks;

        $blocksWithCategories = $blocks->map(function($block) {
            return [
                'block' => $block,
                'category' => $block->categories, 
            ];
        });

        return view('encurtador/link', ['link' => $link]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
