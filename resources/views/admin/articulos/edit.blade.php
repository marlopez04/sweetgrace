@extends('admin.template.main')

@section('title', 'Editar articulo' . $articulo->nombre)

@section('content')

<div class="women_main">
<div class="w_content">
        <div class="women">
            <h4>Editar Articulo: {{ $articulo->nombre}}</h4>
             <div class="clearfix"></div>
        </div>
         <a href="{{ route('admin.recetas.edit', $articulo->receta_id) }}" class="btn btn-info">Receta</a>
	{!! Form::open(['route' =>['admin.articulos.update', $articulo], 'method' => 'PUT', 'files' => true]) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!! Form::text('nombre', $articulo->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre del articulo', 'required'])!!}
		</div>
		<div class="form-group">
			<h4>Categoria</h4>
			{!! Form::select('categoria_id', $categorias, $articulo->categoria->id, ['class' => 'form-control select-category', 'required']) !!}
		</div>
				<div class="form-group">
			<h4>Lista de Precio</h4>
			{!! Form::select('lista_id', $listasprecios, $articulo->listaprecio->id, ['class' => 'form-control select-category', 'required']) !!}
		</div>
		<h4>Precio</h4>
			{!!	Form::number('precio',$articulo->precio,['class'=>'form-control', 'required'])!!}

		<div class="form-group">
			<h4>Imagen</h4>
			{!! Form::file('imagen',['required'])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}

</div>
	
</div>
@endsection




















