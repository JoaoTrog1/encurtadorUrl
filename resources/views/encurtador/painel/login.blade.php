@extends('app')
@section('titulo')
Painel
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('conteudo')
    <div class="login-page">
        <div class="form">
            <form class="login-form" action="{{ route('painel.login') }}" method="POST">
                @csrf
                <h2>Login</h2>
                <input type="text" placeholder="username" name="name" />
                <input type="password" placeholder="password" name="password" />
                <button type="submit">login</button>
                @if (session('message'))
                    <p>
                        {{ session('message') }}
                    </p>
                @endif

            </form>
        </div>
    </div>
@endsection
