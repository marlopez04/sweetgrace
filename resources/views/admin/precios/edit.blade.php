@extends('admin.template.main')

@section('title', 'Agregar Un Insumo'. $listaprecio->nombre)

@section('content')

<!-- lista de precio actual inicio -->

<div class="women_main">
<div class="w_content">
<div class="panel panel-widget">
	<div class="panel-title">
			Editar {{ $listaprecio->nombre }}
	</div>
	{!! Form::open(['route' =>['admin.precios.update', $listaprecio], 'method' => 'PUT']) !!}
		<div class="form-group">
			<table class="table table-striped">
				<thead>
					<th>Nombre</th>
					<th>Vigencia desde</th>
					<th>Vigencia hasta</th>
				</thead>
				<tbody>
					<tr>
						<td>{!!	Form::text('nombre',$listaprecio->nombre,['class'=>'form-control','required'])!!}</td>
						<td>{!!	Form::date('vigencia',$listaprecio->vigencia_desde,['class'=>'form-control', 'required'])!!}</td>
						<td>{!!	Form::date('vigencia',$listaprecio->vigencia_hasta,['class'=>'form-control', 'required'])!!}</td>
						<td>{!!	Form::submit('Guardar',['class' =>'btn btn-primary']) !!}</td>
					</tr>
				</tbody>
			</table>
		</div>
	{!!Form::close()!!}

</div>


<div class="clearfix"></div>

<!-- lista de precio actual fin -->

<div class="area">
	<div class="col-md-6 chrt-two area">
	<h4>Lista de precio anterior</h4>
			<table class="table table-striped">
				<thead>
					<th>Lista</th>
					<th>Porcentaje de aumento</th>
					<th></th>
				</thead>
		<tr>
			<td>{!! Form::select('lista_id', $listasprecios, null, ['class' => 'form-control select-category', 'required']) !!}</td>
			<td>{!!	Form::number('porcentaje',null,['class'=>'porcentaje'])!!}
			</td>
			<td><button type="button" class="btn btn-danger" id="cargar">Cargar</button></td>
		</tr>
	</table>

       <div id="ingrediente" hidden></div>
       <div id="insumo" hidden></div>

<!-- INICIO muestra la lista de precio seleccionada -->

{!! Form::open(['route' => ['admin.precios.show', ':LISTA_ID'], 'method' => 'POST' , 'id' => 'form-lista' ]) !!}
{!! Form::close() !!}

<!-- FIN muestra la lista de precio seleccionada-->

</div>

	<div class="col-md-6 chrt-three">
		<h4>Lista Con aumento</h4>
		<td><button type="button" class="btn btn-danger" id="confirmar">Confirmar</button></td>
		<div id="insumosingredientes"></div>
	</div>

</div>
<div class="clearfix"></div>

<div id="correctorscroll">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
</div>

</div>
</div>

@endsection


