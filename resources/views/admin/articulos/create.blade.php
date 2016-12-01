@extends('admin.template.main')

@section('title', 'Agregar articulo')

@section('content')

<div class="women_main">
<div class="w_content">
        <div class="women">
            <h4>Articulos</h4>
             <div class="clearfix"></div>   
        </div>

	{!! Form::open(['route' => 'admin.articulos.store', 'method' => 'POST', 'files' => true]) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del articulo', 'required'])!!}
		</div>
		<div class="form-group">
			<h4>Categoria</h4>
			{!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control select-category', 'required']) !!}
		</div>
				<div class="form-group">
			<h4>Lista de Precio</h4>
			{!! Form::select('lista_id', $listasprecios, null, ['class' => 'form-control select-category', 'required']) !!}
		</div>
		<h4>Precio</h4>
			{!!	Form::number('precio',null,['class'=>'form-control', 'required'])!!}

		<div class="form-group">
			<h4>Imagen</h4>
			{!! Form::file('imagen',['required'])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Agregar articulo',['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}

</div>
	
</div>
@endsection




















