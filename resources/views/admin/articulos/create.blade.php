@extends('admin.template.main')

@section('title', 'Agregar articulo')

@section('content')
	{!! Form::open(['route' => 'admin.articulos.store', 'method' => 'POST', 'files' => true]) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del articulo', 'required'])!!}
		</div>
		<div class="form-group">
			<h4>Categoria</h4>
			{!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control select-category', 'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('image', 'Imagen')!!}
			{!! Form::file('image')!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Agregar articulo',['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection




















