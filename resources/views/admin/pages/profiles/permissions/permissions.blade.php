@extends('adminlte::page')

@section('title', 'ACL')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfil</a></li>
    </ol>
    <h1>Permissões do Perfil: <strong>{{$profile->name}}</strong></h1>
    <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark">Adicionar Permissão</a>

@stop

@section('content')
    <div class="card">
        {{-- <div class="card-header">
            <form action="{{route('profiles.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </form>
        </div> --}}
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Description</th>
                        <th style="width: 200px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission )
                        <tr>
                            <td>
                                {{ $permission->name}}
                            </td>
                            <td>
                                {{$permission->description}}
                            </td>
                            <td style="width: 200px;">
                                <a href="{{ route('profiles.permissions.detach', [$profile->id, $permission->id])}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!!$permissions->appends($filters)->links()!!}

            @else
                {!!$permissions->links()!!}
            @endif
        </div>
    </div>
@stop