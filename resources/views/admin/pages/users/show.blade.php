@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Detalhes do Usuário  <b>{{$user->name}}</b></h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <ul>
      <li>
        <strong>Nome: </strong> {{$user->name}}
      </li>
      <li>
        <strong>E-mail: </strong> {{$user->email}}
      </li>
      <li>
        <strong>Empresa: </strong> {{$user->tenant->name}}
      </li>
    </ul>
    @include('admin.includes.alerts')
  </div>
  <div class="card-footer">
    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
    </form>
  </div>
</div>
@endsection