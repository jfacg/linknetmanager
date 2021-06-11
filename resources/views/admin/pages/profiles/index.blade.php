@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfil</a></li>
    </ol>
    <h1><a href="{{ route('profiles.create') }}" class="btn btn-dark">Adicionar Novo</a> </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('profiles.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Description</th>
                        <th style="width: 300px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile )
                        <tr>
                            <td>
                                {{ $profile->name}}
                            </td>
                            <td>
                                {{$profile->description}}
                            </td>
                            <td style="width: 200px;">
                                <a href="{{ route('profiles.edit', $profile->id)}}" class="btn btn-info">Editar</a>
                                <a href="{{ route('profiles.show', $profile->id)}}" class="btn btn-warning">Detalhes</a>
                                <a href="{{ route('profiles.permissions', $profile->id)}}" class="btn btn-primary">Permissões</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!!$profiles->appends($filters)->links()!!}

            @else
                {!!$profiles->links()!!}
            @endif
        </div>
    </div>
@stop