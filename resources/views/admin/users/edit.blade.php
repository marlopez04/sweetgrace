@extends('admin.template.main')

@section('title', 'Agregar Un Insumo'. $user->nombre)

@section('content')
<div class="panel panel-widget">
	<div class="panel-title">
			Editar {{ $user->name }}
	</div>
	{!! Form::open(['route' =>['admin.users.update', $user], 'method' => 'PUT']) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!!	Form::text('name',$user->name,['class'=>'form-control', 'required'])!!}
			<h4>Email</h4>
			{!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'ejemplo@ejemplo.com', 'required'])!!}
			<h4>Contraseña</h4>
			{!!	Form::password('password',['class'=>'form-control','placeholder'=>'********' ,'required'])!!}
			<h4>Tipo</h4>
			{!! Form::select('type', [''=>'', 'member' => 'Miembro', 'admin' => 'Administrador'], $user->type, ['class'=> 'form-control'])!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Editar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}

</div>
@endsection


