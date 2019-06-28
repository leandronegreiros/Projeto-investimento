@extends('templates.master')

@section('conteudo-view')
    @include('groups.list', ['group_list' => $instituition->groups])
@endsection
