@extends('admin.template.main')

@section('title', 'Crear un movimiento')

@section('content')
<div class="panel panel-widget">
	<div class="panel-title">
			Crear nuevo movimiento.	  
	</div>
	{!! Form::open(['route' =>'admin.movimientos.store', 'method' => 'POST']) !!}
		<div class="form-group">
			<h4>Detalle</h4>
			{!!	Form::textarea('detalle',null,['class'=>'form-control','placeholder'=>'Descripcion del movimiento', 'required'])!!}
			<h4>Importe</h4>
			{!!	Form::number('importe',null,['class'=>'form-control', 'id'=>'cantidad', 'required'])!!}
			<h4>Tipo</h4>
			{!! Form::select('tipo', ['ingreso' => 'Ingreso', 'egreso' => 'Egreso'], null, ['class'=> 'form-control', 'placeholder' => 'Seleccione una opción...', 'required'])!!}
			<h4>Tipo</h4>
			{!! Form::select('estado', ['pendiente' => 'Pendiente', 'confirmado' => 'Confirmado'], null, ['class'=> 'form-control', 'placeholder' => 'Seleccione una opción...', 'required'])!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Registrar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}

</div>
@endsection
