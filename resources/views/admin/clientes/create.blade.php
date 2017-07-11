@extends('admin.template.main')

@section('title', 'Agregar Un Cliente')

@section('content')
<div class="panel panel-widget">
	<div class="panel-title">
			Agregar cliente
	</div>
	{!! Form::open(['route' =>'admin.clientes.store', 'method' => 'POST']) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!!	Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre del cliente', 'required'])!!}
			<h4>Email</h4>
			{!!	Form::email('email',null,['class'=>'form-control', 'placeholder'=>' hola@hola.com '])!!}
			<h4>Telefono</h4>
			{!!	Form::text('telefono',null,['class'=>'form-control','placeholder'=>' Ej 381-654321' ,'required'])!!}
			<h4>Direccion</h4>
			{!!	Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Direccion'])!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Registrar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}

</div>
@endsection