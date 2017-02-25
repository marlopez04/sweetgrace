@extends('admin.template.main')

@section('title', 'Agregar Un Insumo'. $ingrediente->nombre)

@section('content')
<div class="panel panel-widget">
	<div class="panel-title">
			Editar {{ $ingrediente->nombre }}
	</div>
	{!! Form::open(['route' =>['admin.ingredientes.update', $ingrediente], 'method' => 'PUT']) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!!	Form::text('nombre',$ingrediente->nombre,['class'=>'form-control', 'required'])!!}
			<h4>Cantidad</h4>
			{!!	Form::number('cantidad',$ingrediente->cantidad,['class'=>'form-control', 'required'])!!}
			<h4>StockCritico</h4>
			{!!	Form::number('stockcritico',$ingrediente->stockcritico,['class'=>'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Registrar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}

</div>
@endsection


