@extends('templates.master')

@section('conteudo-view')

    @if(session('success'))
        <h3>{{ session('success')['messages']}}</h3>
    @endif

    <table class="default-table">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Nome da Instituição</th>
                <th>Valor investido</th>
            </tr>
        </thead>

        <tbody>
            @foreach($product_list as $product)
                <tr>
                <th>{{ $product->name }}</th>
                <th>{{ $product->instituition->name }}</th>
                <th>{{ $product->valueFromUser(Auth::user() )}}</th>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
