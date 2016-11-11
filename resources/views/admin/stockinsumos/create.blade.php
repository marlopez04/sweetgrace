@extends('admin.template.main')

@section('title', 'Agregar Un Ingrediente')

@section('content')
<div class="panel panel-widget">
	<div class="panel-title">
			Agregar ingrediente	  
	</div>
	{!! Form::open(['route' =>'admin.ingredientes.store', 'method' => 'POST']) !!}
		<div class="form-group">
			<h4>Nombre</h4>
			{!!	Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre del insumo', 'required'])!!}
			<h4>Costo</h4>
			{!!	Form::number('costo',null,['class'=>'form-control', 'required'])!!}
			<h4>Cantidad</h4>
			{!!	Form::number('cantidad',null,['class'=>'form-control', 'id'=>'cantidad', 'required'])!!}
			<h4>StockCritico</h4>
			{!!	Form::number('stockcritico',null,['class'=>'form-control', 'id'=>'stockcritico', 'required'])!!}
		</div>
		<div class="form-group">
			{!!	Form::submit('Registrar',['class' =>'btn btn-primary']) !!}
		</div>
	{!!Form::close()!!}

</div>
@endsection


@section('js')

<script type="text/javascript">

        $(document).ready(function () {

            $("#cantidad").focusout(function(){ 
  			    var a = $("#cantidad").val();
    			var b = a * 0.3;
   				 $("#stockcritico").val(b);
			});
           
        });

    </script>

@endsection