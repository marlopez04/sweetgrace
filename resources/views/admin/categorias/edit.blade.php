@extends('admin.template.main')

@section('title', 'Agregar Un Ingrediente')

@section('content')
<div class="panel panel-widget">
	<div class="panel-title">
			Agregar Categoria
	</div>
	{!! Form::open(['route' =>['admin.categorias.update', $categoria], 'method' => 'PUT']) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!!	Form::text('nombre',$categoria->nombre,['class'=>'form-control','placeholder'=>'Nombre de la Categoria', 'required'])!!}
		</div>
		<div class="from-group">
			<h4>Foto Actual</h4>
			@foreach($categoria->imagenescategorias as $imagen)                    
               <img src="{{ asset('imagenes/categorias/' . $imagen->nombre) }}" class="img" alt="">
            @endforeach
		</div>
		<div class="form-group">
			<h4>Imagen</h4>
			{!! Form::file('imagen')!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Registrar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}

</div>
@endsection
