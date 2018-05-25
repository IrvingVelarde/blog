@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @php
                        echo "Editar Categoria: ".  "<b>" .$categories->name. "</b>";
                    @endphp
                </div>
                <div class="panel-body">
                    <p><strong>Nombre</strong> {{ $categories->name }}</p>
                    <p><strong>Slug</strong> {{ $categories->slug }}</p>
                    <p><strong>Contenido</strong> {{ $categories->body }}</p>

                    <div align="center" >
                        <a href="{{ route('categories.index') }}" class="btn btn-default">Regresar</a> 
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection