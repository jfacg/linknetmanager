@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('permissions.index')}}">Permissão</a></li>
    </ol>
    <h1>  Perfis da Permissão <strong>{{$permission->name}}</strong> </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Description</th>
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