@extends('admin.template.main')

@section('title', 'Crear un movimiento')

@section('content')
<div class="panel panel-widget">
	<div class="panel-title">
			Crear nuevo movimiento.	  
	</div>
	{!! Form::open(['route' =>'admin.movimientos.update', 'method' => 'POST']) !!}
		<div class="form-group">
			<h4>Detalle</h4>
			{!!	Form::textarea('detalle',$movimiento->detalle,['class'=>'form-control','placeholder'=>'Descripcion del movimiento', 'required'])!!}
			<h4>Importe</h4>
			{!!	Form::number('importe',$movimiento->importe,['class'=>'form-control', 'id'=>'cantidad', 'required'])!!}
			<h4>Tipo</h4>
			{!! Form::select('tipo', ['ingreso' => 'Ingreso', 'egreso' => 'Egreso'], $movimiento->tipo, ['class'=> 'form-control', 'placeholder' => 'Seleccione una opción...', 'required'])!!}
			<h4>Tipo</h4>
			{!! Form::select('estado', ['pendiente' => 'Pendiente', 'confirmado' => 'Confirmado'], $movimiento->estado, ['class'=> 'form-control', 'placeholder' => 'Seleccione una opción...', 'required'])!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Guardar',['class' =>'btn btn-primary']) !!}
			<a href="{{ route('admin.movimientos.destroy', $movimiento->id) }}" class="btn btn-danger"> Borrar</a>
		</div>
	{!!Form::close()!!}

</div>
@endsection
