@extends('admin.template.main')

@section('title', 'Agregar Un Ingrediente')

@section('content')
<div class="panel panel-widget">
	<div class="panel-title">
			Agregar ingrediente	  
	</div>
	{!! Form::open(['route' =>'admin.users.store', 'method' => 'POST']) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!!	Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre del insumo', 'required'])!!}
			<h4>Email</h4>
			{!!	Form::email('email',null,['class'=>'form-control', 'required'])!!}
			<h4>Contraseña</h4>
			{!!	Form::password('password',['class'=>'form-control','placeholder'=>'********' ,'required'])!!}
			<h4>Tipo</h4>
			{!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], null, ['class'=> 'form-control', 'placeholder' => 'Seleccione una opción...', 'required'])!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Registrar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}

</div>
@endsection