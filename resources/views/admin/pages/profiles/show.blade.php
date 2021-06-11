@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>Detalhes do Perfil: <strong>{{$profile->name}}</strong></h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <ul>
      <li>
        <strong>Nome: </strong> {{$profile->name}}
      </li>
      <li>
        <strong>Descrição: </strong> {{ $profile->description}}
      </li>
    </ul>
    @include('admin.includes.alerts')
  </div>
  <div class="card-footer">
    <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
    </form>
  </div>
</div>
@endsection