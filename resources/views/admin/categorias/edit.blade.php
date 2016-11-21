@extends('admin.template.main')

@section('title', 'Editar categoria ' . $categoria->nombre)

@section('content')
<div class="panel panel-widget">
	<div class="panel-title">
			Editar categoria {{$categoria->nombre}}
	</div>
	{!! Form::open(['route' =>['admin.categorias.update', $categoria], 'method' => 'PUT', 'files' => true]) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!!	Form::text('nombre',$categoria->nombre,['class'=>'form-control','placeholder'=>'Nombre de la Categoria', 'required'])!!}
		</div>
		<div class="from-group">
			<h4>Foto Actual</h4>
               <img src="{{ asset('imagenes/categorias/' . $categoria->imagen) }}" class="img" alt="">
		</div>
		<div class="form-group">
			<h4>Nueva imagen</h4>
			{!! Form::file('imagen')!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Guardar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}

</div>
@endsection
