@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        {{--  <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Planos</a></li>  --}}
    </ol>
    {{--  <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark">Novo</a> </h1>  --}}

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            {{--  <form action="{{route('plans.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </form>  --}}
        </div>
        <div class="card-body">
            {{--  <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th style="width: 200px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan )
                        <tr>
                            <td>
                                {{ $plan->name}}
                            </td>
                            <td>
                                R$ {{ number_format( $plan->price, 2, ',', '.' )}}
                            </td>
                            <td style="width: 200px;">
                                <a href="{{ route('details.plans.index', $plan->url)}}" class="btn btn-primary"><i class="fas fa-search"></i></a>
                                <a href="{{ route('plans.edit', $plan->url)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('plans.show', $plan->url)}}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>  --}}
        </div>
        <div class="card-footer">
            {{--  @if (isset($filters))
                {!!$plans->appends($filters)->links()!!}

            @else
                {!!$plans->links()!!}
            @endif  --}}
        </div>
    </div>
@stop