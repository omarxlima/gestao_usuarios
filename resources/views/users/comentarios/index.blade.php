@extends('layouts.base')

@section('title', "Comentários do Usuário  {{$user->name}}" )

@section('content')


<h1>
    Comentários do Usuário  {{$user->name}}

    <a href="{{route('users.create')}}">+</a>
</h1>

<form action="{{route('users.index')}}">
    <input type="text" name="search" placeholder="Pesquisar">
    <button>Pesquisar</button>
</form>

<ul>
    @foreach ($comentarios as $comentario)
   <li>
    {{$comentario->body}} - {{$comentario->visible}}
    <a href="{{route('users.show', $user->body)}}">Detalhes</a>
    <a href="{{route('users.edit', $user->visible)}}">Editar</a>


</li>
@endforeach

</ul>




@endsection
