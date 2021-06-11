@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}" class="active">Perfil</a></li>
    </ol>
    <h1>Novo Perfil</h1>
@stop

@section('content')
    <div class="card">
      <div class="card-body">
        <form action="{{ route('profiles.store') }}" class="form" method="POST">
          @include('admin.pages.profiles._partials.form')
        </form>
      </div>
    </div>
@endsection