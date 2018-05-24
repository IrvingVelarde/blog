{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
	{{ Form::label('category_id', 'Categorías') }}
	{{ Form::select('category_id', $categories, null, ['class' => 'form-control select-category']) }}
</div> 
<div class="form-group">
    {{ Form::label('name', 'Nombre de la etiqueta') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'URL amigable') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Imagen') }}
    {{ Form::file('image') }}
</div>
<div class="form-group">
	{{ Form::label('slug', 'Estado') }}
	<label>
		{{ Form::radio('status', 'PUBLISHED') }} Publicado
	</label>
	<label>
		{{ Form::radio('status', 'DRAFT') }} Borrador
	</label>
</div>
{{--
	<div class="form-group">
	{{ Form::label('tags', 'Etiquetas') }}
	<div>
	@foreach($tags as $tag)
		<label>
			{{ Form::checkbox('tags[]', $tag->id) }} {{ $tag->name }}
		</label>
	@endforeach
	</div>
</div>
	
--}}
<div class="form-group">
	{!! Form::label('tags', 'Tags') !!}
	{!! Form::select('tags[]', $tags, null, ['class' => 'form-control select-tag', 'multiple', 'riquired']) !!}
</div>

<div class="form-group">
    {{ Form::label('excerpt', 'Extracto') }}
    {{ Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '2']) }}
</div>
<div class="form-group">
    {{ Form::label('body', 'Descripción') }}
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
	<a href="{{URL::to('/posts')}}" class="btn btn-sm btn-danger">Cancelar</a>
</div>

@section('scripts')
<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script>
	$(document).ready(function(){
	    $("#name, #slug").stringToSlug({
	        callback: function(text){
	            $('#slug').val(text);
	        }
	    });

	    CKEDITOR.config.height = 200;
		CKEDITOR.config.width  = 'auto';

		CKEDITOR.replace('body');
	});
	$('.select-category').chosen({
		width: "90%",
		no_results_text: "No se encontro la Categoria: ",
		single_backstroke_delete : true,
		allow_single_deselect: true,
		search_contains: true
	});
	$('.select-tag').chosen({
		placeholder_text_multiple: 'Seleccione un maximo de 3 tags',
		max_selected_options: 3,
		search_contains: true,
		no_results_text: 'No se encontraron estos tags'
	});
</script>
@endsection