@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php
                        echo "Ver Post: ".  "<b>" .$post->name. "</b>";
                    ?>
                </div>
                <div class="panel-body">
                    <p><strong>Nombre</strong> {{ $post->name }}</p>                    
                    <p><strong>Slug</strong> {{ $post->slug }}</p>
                    <p><strong>Categoria</strong> {{ $post->category->name }}</p>
                    <p style="text-align: justify;" ><strong>Contenido</strong> {{ $post->body }}</p>
                    <p>
                        <strong>Estatus</strong>
                    {{-- 
                        @if($post->status == "PUBLISHED")
                            <span class="label label-primary">{{ $post->status }}</span>
                        @else
                            <span class="label label-danger">{{ $post->status }}</span>
                        @endif 
                    --}}   
                    @if($post->status == "PUBLISHED")
                        <span class="label label-primary">Publicado</span>
                    @else
                        <span class="label label-danger">Borrador</span>
                    @endif
                    </p>
                    <p><strong>Imagen del Post</strong>  <img class="img-responsive"  src="{{ $post->file }}"> </p>
                    <div align="center" >
                        <a href="{{ route('posts.index') }}" class="btn btn-default">Regresar</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection