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

            $links = Link::orderBy("created_at", "desc")->paginate(10);

            return view("encurtador/painel/links", ["links" => $links]);
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
            return view('encurtador/painel/create-link', ['categorias' => $categorias]);
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

        if (Auth::check()) {

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



            return redirect()->route('links.index')->with(['message' => 'Link criado com sucesso', 'identifier' => $link->identifier]);
        }


        return redirect()->route('painel')->with(['message' => 'Acesso negado.']);
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
        if (Auth::check()) {

            $link = Link::find($id);
            if ($link) {
                $categorias = Category::all();
                return view('encurtador/painel/edit-link', ['categorias' => $categorias, 'link' => $link]);
            }
        }


        return redirect()->route('painel')->with(['message' => 'Acesso negado.']);
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
        if (Auth::check()) {

            $request->validate([
                'description' => 'required|string|max:255',
                'link' => 'required|url',
                'categories' => 'array',
                'locks' => 'array',
            ]);

            $link = Link::find($id);
            if ($link) {
                $link->link = $request->link;
                $link->description = $request->description;
                

                $link->save();

                $deleted = $link->locks()->delete();

                if ($request->locks) {
                    foreach ($request->locks as $cont => $lockDescription) {

                        $lock = new Lock();
                        $lock->linkLock = $lockDescription;
                        $lock->FkIdLink = $link->id;

                        $lock->FkIdCategory = $request->categories[$cont];
                        $lock->save();
                    }
                }
            }
            return redirect()->route('links.index')->with(['message' => 'Link editado com sucesso', 'identifier' => $link->identifier]);
        
            
        }


        return redirect()->route('painel')->with(['message' => 'Acesso negado.']);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $link = Link::find($id);
            if ($link) {
                
                $link->delete();
            }
            return redirect()->route('links.index')->with(['message' => 'Link deletado com sucesso']);
        
        }
        return redirect()->route('painel')->with(['message' => 'Acesso negado.']);
    }


    private function generateUniqueIdentifier($length = 12)
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
}
