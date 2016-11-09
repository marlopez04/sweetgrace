@extends('admin.template.main')

@section('title', 'Agregar Un Insumo')

@section('content')
	{!! Form::open(['route' =>'admin.insumos.store', 'method' => 'POST']) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!!	Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre del insumo', 'required'])!!}
			<h4>Costo</h4>
			{!!	Form::number('costo',null,['class'=>'form-control', 'required'])!!}
			<h4>Cantidad</h4>
			{!!	Form::number('cantidad',null,['class'=>'form-control', 'required'])!!}
			<h4>StockCritico</h4>
			{!!	Form::number('stockcritico',null,['class'=>'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Registrar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}

@endsection