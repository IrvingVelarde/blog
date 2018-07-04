@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<h2>{{ $post->name }}</h2>
		<div class="panel panel-default">
			<div class="panel-heading">
				Categoria
				<a href="{{ route('category',$post->category->slug) }}">
					<span class="label label-info">{{ $post->category->name }}</span>
				</a>
			</div>
			<div class="panel-body">
				@if($post->file)
				<img src="{{ $post->file }}" class="img-responsive">
				@endif
				{{ $post->excerpt }}
				<hr>
				{!! $post->body !!}
				<hr>
				Etiquetas
				@foreach($post->tags as $tag)
				<a href="{{ route('tag',$tag->slug) }}">
					<span id="tag" class="label label-primary">{{ $tag->name }}</span>
				</a>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection()