@extends('admin.template.main')

@section('title', 'Agregar Un Insumo'. $listaprecio->nombre)

@section('content')
<div class="panel panel-widget">
	<div class="panel-title">
			Editar {{ $listaprecio->nombre }}
	</div>
	{!! Form::open(['route' =>['admin.precios.update', $listaprecio], 'method' => 'PUT']) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!!	Form::text('nombre',$listaprecio->nombre,['class'=>'form-control','required'])!!}
			<h4>Vigencia desde</h4>
			{!!	Form::date('vigencia',$listaprecio->vigencia_desde,['class'=>'form-control', 'required'])!!}
			<h4>Vigencia hasta</h4>
			{!!	Form::date('vigencia',$listaprecio->vigencia_hasta,['class'=>'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Registrar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}

</div>
@endsection


