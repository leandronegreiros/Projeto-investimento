@extends('templates.master')

@section('conteudo-view')

    {!! Form::open(['route' => ['instituition.product.store', $instituition->id], 'method' => 'post', 'class' => 'form-padrao']) !!}
        @include('templates.formulario.input', ['label' => 'Nome do Produto', 'input' => 'name'])
        @include('templates.formulario.input', ['label' => 'Descrição', 'input' => 'description'])
        @include('templates.formulario.input', ['label' => 'Indexador', 'input' => 'index'])
        @include('templates.formulario.input', ['label' => 'Taxa de juros', 'input' => 'interest_rate'])
        @include('templates.formulario.submit', ['input' => 'Cadastrar'])
    {!! Form::close() !!}

    <table class="default-table">
        <thead>
            <tr>
                <td>#</td>
                <td>Nome</td>
                <td>Descrição</td>
                <td>Indexador</td>
                <td>Taxa de juros</td>
            </tr>
        </thead>

        <tbody>
            @forelse($instituition->products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->index }}</td>
                    <td>{{ $product->interest_rate }}</td>

                    <td>
                        {!! Form::open(['route' => ['instituition.product.destroy', $instituition->id, $product->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Remover') !!}
                        {!! Form::close() !!}

                    </td>
                </tr>
            @empty
            <tr>
                    <td>Nada cadastrado!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
