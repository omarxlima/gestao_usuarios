@extends('layouts.base')

@section('title', 'Novo usuário')


@section('content')


<h1>Novo Usuário</h1>

@include('includes.validations-form')

@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    @include('users._partials.form')
</form>


@endsection
