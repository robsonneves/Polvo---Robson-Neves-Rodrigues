@extends('base')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Polvo - Desafio Programador PHP
            </div>
            <div class="m-b-md"><strong>Robson Neves Rodrigues</strong></div>
            <div class="links">
                <a href="{{route('cadastroIndex')}}">Cadastro</a>
            </div>
        </div>
    </div>

@endsection 
