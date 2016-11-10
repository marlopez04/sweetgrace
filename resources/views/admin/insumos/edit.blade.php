@extends('admin.template.main')

@section('title', 'Agregar Un Insumo'. $insumo->nombre)

@section('content')
<div class="panel panel-widget">
	<div class="panel-title">
			Editar {{ $insumo->nombre }}
	</div>
	{!! Form::open(['route' =>['admin.insumos.update', $insumo], 'method' => 'PUT']) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!!	Form::text('nombre',$insumo->nombre,['class'=>'form-control', 'required'])!!}
			<h4>Costo</h4>
			{!!	Form::number('costo',$insumo->costo,['class'=>'form-control', 'required'])!!}
			<h4>Cantidad</h4>
			{!!	Form::number('cantidad',$insumo->cantidad,['class'=>'form-control', 'required'])!!}
			<h4>StockCritico</h4>
			{!!	Form::number('stockcritico',$insumo->stockcritico,['class'=>'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Registrar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}

</div>
@endsection


