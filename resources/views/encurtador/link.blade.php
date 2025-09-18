@extends('app')

@section('titulo')
Downloads
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/link.css') }}">
    <script type='text/javascript' src='//pl25015687.profitablecpmrate.com/40/7d/8a/407d8a2bfd74a281cc3442b3ab0e92ab.js'></script>
    
@endsection

@section('js')
    <script src="{{ asset('js/link.js') }}"></script>
    
@endsection

@section('conteudo')
 
 <div id="container-91a92937e80d2e51c4536a76db49f6b8"></div>
    <script async="async" data-cfasync="false" src="//pl24899502.profitablecpmrate.com/91a92937e80d2e51c4536a76db49f6b8/invoke.js"></script>
    
    <div class="conteiner">
        <h1>{{$link->description}}</h1>
        <div id="botao-container">
            
            @foreach ($link->locks as $lock)
                <button class="btn btn-primary" type="button" value="{{$lock->linkLock}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                        {!! $lock->category->image !!}
                    </svg>
                    {{$lock->category->text}}
                </button>
            @endforeach
            
        </div> 
        <button id="btn-acesso" type="button" class="btn btn-secondary btn-lg" value="{{$link->link}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
            </svg>
            Acesso bloqueado
        </button>
        
        

    </div >
    
@endsection

