@extends('admin.template.main')

@section('title', 'Agregar Un Ingrediente')

@section('content')
<div class="panel panel-widget">
	<div class="panel-title">
			Agregar Categoria
	</div>
	{!! Form::open(['route' =>'admin.categorias.store', 'method' => 'POST', 'files' => true]) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!!	Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre de la Categoria', 'required'])!!}
		</div>
		<div class="form-group">
			<h4>Imagen</h4>
			{!! Form::file('imagen',['required'])!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Registrar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}

</div>
@endsection
