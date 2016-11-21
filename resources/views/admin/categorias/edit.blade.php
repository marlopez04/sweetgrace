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
			@foreach($categoria->imagenescategorias as $imagen)                    
               <img src="{{ asset('imagenes/categorias/' . $imagen->nombre) }}" class="img" alt="">
               {!!	Form::hidden('img_id',$imagen->id,['class'=>'form-control', 'required'])!!}
            @endforeach
		</div>
		<div class="form-group">
			<h4>Nueva imagen</h4>
			{!! Form::file('imagen')!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Guardar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}
	<!--Para borrar la categoria completa-->
		{!! Form::open(['route' =>['admin.categorias.update', $categoria], 'method' => 'PUT']) !!}
		@foreach($categoria->imagenescategorias as $imagen)
               {!!	Form::hidden('img_id',$imagen->id,['class'=>'form-control', 'required'])!!}
            @endforeach
		<div class="form-group">
			{!!	Form::submit('Borrar',['class' =>'btn btn-primary']) !!}
		</div>
		{!!Form::close()!!}

	<!--Para borrar la categoria completa-->
</div>
@endsection
