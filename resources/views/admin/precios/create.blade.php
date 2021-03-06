@extends('admin.template.main')

@section('title', 'Agregar Un Ingrediente')

@section('content')
<div class="panel panel-widget">
	<div class="panel-title">
			Crear Nueva lista de Precios  
	</div>
	{!! Form::open(['route' =>'admin.precios.store', 'method' => 'POST']) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!!	Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre ej: 08-2016', 'required'])!!}
			<h4>Vigente desde</h4>
			{!!	Form::date('vigencia_desde',null,['class'=>'form-control', 'required'])!!}
			<h4>Vigente hasta</h4>
			{!!	Form::date('vigencia_hasta',null,['class'=>'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Registrar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}

</div>
@endsection
