@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php
                        echo "Editar Categoria: ".  "<b>" .$categories->name. "</b>";
                    ?>    
                </div>
                <div class="panel-body">
                    {!! Form::model($categories, ['route' => ['categories.update', $categories->id], 'method' => 'PUT']) !!}
                        
                        @include('admin.categories.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection