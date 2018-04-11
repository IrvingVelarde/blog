@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Categorias 
                </div>
                <div class="panel-body">
                    {{--<table class="table table-striped table-hover"> --}}
                    <a href="{{ route('categories.create') }}" class="btn btn-primary"> <span class="fas fa-plus-square" aria-hidden="true"></span> Agregar Categoria</a>
                    <p>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td width="10px">
                                    <a href="{{ route('categories.show',$category->id) }}" class="btn btn-info"><span class="fas fa-eye" aria-hidden="true"></span> Ver</a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-warning"><span class="fas fa-edit" aria-hidden="true"></span> Editar</a>
                                </td>
                                <td width="10px">
                                    {!!Form::open(['route'=>['categories.destroy', $category->id], 'method' => 'DELETE'])!!}
                                    <button class="btn btn-danger"> <span class="fas fa-trash" aria-hidden="true"></span> 
                                        Eliminar
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>     	
                    {{ $categories->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
