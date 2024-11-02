@extends('app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('titulo')
404
@endsection

@section('conteudo')
    <div class="container text-center" style="margin-top: 100px;">
        <div class="error-page">
            <h1 class="display-1 " style="color: rgb(0, 0, 0);">404</h1>
            <h2 class="mb-3">Esta página decidiu tirar um dia de folga.</h2>
            <a href="{{ url('/') }}" class="btn btn-primary btn-lg" style="background-color: rgb(0, 0, 0);">Voltar para a Home</a>
           
        </div>
    </div>
@endsection
