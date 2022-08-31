@extends('layouts.base')

@section('title', 'Novo usuário')


@section('content')


<h1>Novo Usuário</h1>

@include('includes.validations-form')

<form action=" {{ route('users.update', $user->id) }} " method="POST">
    @method('PUT')

    @include('users._partials.form')

</form>


@endsection
