@extends('admin.template.main')

@section('title', 'Pedidos pendientes.')

@section('content')

<div class="monthly-grid">
	<div class="panel panel-widget">
		<div class="panel-title">
			INGREDIENTES
		</div>
			<div class="panel-body">
				<!-- status -->
				<div class="contain">									
					<div class="gantt">
						<a href="{{ route('admin.ingredientes.index') }}" class="btn btn-info">Registrar nuevo ingrediente</a>
						</div>
<!-- busca ingrediente -->
                {!! Form::open(['route' => 'admin.ingredientes.index', 'method' => 'GET', 'class' => 'navbar-form pull-left'])!!}
                <div class="input-group">
                  {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Buscar ingrediente..', 'aria-describedby' => 'search'])!!}
                  <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" id="search" aria-hidden="true"></span></span>
                </div>
              {!! Form::close() !!}

				</div>
			</div>
			<!-- status -->
		</div>
	</div>

@foreach ($ingredientes as $ingrediente)
	<div class="col-md-5 skil" style="margin-right:10px;margin-bottom:10px;background-color:#FFB347">
		<div class="content-top-1">
			<div class="col-md-6 top-content">
				<h5>
				<a href="{{ route('admin.ingredientes.edit', $ingrediente->id) }}"> {{$ingrediente->nombre}}</a>
				</h5>
				<label>{{$ingrediente->cantidad}}</label>
			</div>
			<div class="col-md-6 top-content1">	   
				@if( (($ingrediente->cantidad * 100)/ $ingrediente->max) >= 70 )
					<div id="demo-pie-1" class="pie-title-center verde" data-percent="{{($ingrediente->cantidad * 100)/ $ingrediente->max}}"> <span class="pie-value">{{($ingrediente->cantidad * 100)/ $ingrediente->max}}%</span> </div>
				@else
					@if( (($ingrediente->cantidad * 100)/ $ingrediente->max) > 30 )
						<div id="demo-pie-1" class="pie-title-center naranja" data-percent="{{($ingrediente->cantidad * 100)/ $ingrediente->max}}"> <span class="pie-value">{{($ingrediente->cantidad * 100)/ $ingrediente->max}}%</span> </div>
					@else
						<div id="demo-pie-1" class="pie-title-center rojo" data-percent="{{($ingrediente->cantidad * 100)/ $ingrediente->max}}"> <span class="pie-value">{{($ingrediente->cantidad * 100)/ $ingrediente->max}}%</span> </div>
					@endif
				@endif
			</div>
			 <div class="clearfix"> </div>

		</div>
	</div>
@endforeach
		<div class="clearfix"> </div>
		<div class="text-center">
			{!! $ingredientes->render()!!}
		</div>
		

<script type="text/javascript">

        $(document).ready(function () {
            $('.pie-title-center.rojo').pieChart({
                barColor: '#ff3333',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('.pie-title-center.verde').pieChart({
                barColor: '#00cc00',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('.pie-title-center.naranja').pieChart({
                barColor: '#ff8533',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });
           
        });

    </script>


@endsection








