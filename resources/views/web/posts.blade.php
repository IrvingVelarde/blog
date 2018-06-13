@extends('layouts.app')

@section('content')
<h2 align="center" class="title">Lista de Articulos</h2>
<div class="container">
	<div id="pinterest">
		@foreach($posts as $post)
		<div class="panel panel-default white-panel">
			<div class="panel-heading">
				<b class="title">{{ $post->name }}</b>
			</div>
			<div class="panel-body">
				@if($post->file)
				<img src="{{ $post->file }}" class="img-responsive">
				@endif
				<p>{{$post->excerpt}}</p><hr>
				<p align="center"><a class="btn btn-primary" href="{{ route('post', $post->slug) }}"><i class="fa fa-chevron-circle-right"></i> Leer mas</a></p>
			</div>
		</div>
		@endforeach
	</div>
	<div align="center">
		{{ $posts->render() }}
	</div>	
</div>
@endsection()