@extends('admin.template.main')

@section('title', 'Editar cliente'. $cliente->nombre)

@section('content')
<div class="panel panel-widget">
	<div class="panel-title">
			Editar {{ $cliente->nombre }}
	</div>
	{!! Form::open(['route' =>['admin.users.update', $cliente], 'method' => 'PUT']) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!!	Form::text('nombre',$cliente->nombre,['class'=>'form-control','placeholder'=>'Nombre del cliente', 'required'])!!}
			<h4>Email</h4>
			{!!	Form::email('email',$cliente->email,['class'=>'form-control', 'placeholder'=>' hola@hola.com ' , 'required'])!!}
			<h4>Telefono</h4>
			{!!	Form::text('telefono',$cliente->telefono,['class'=>'form-control','placeholder'=>' Ej 381-654321' ,'required'])!!}
			<h4>Direccion</h4>
			{!!	Form::text('direccion',$cliente->direccion,['class'=>'form-control','placeholder'=>'Direccion'])!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Editar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}

</div>
@endsection


