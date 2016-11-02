@extends('admin.template.mainprueba')

@section('title', 'Pedidos pendientes.')

@section('content')

<div class="monthly-grid">
	<div class="panel panel-widget">
		<div class="panel-title">
			Pedidos Pendientes	  
		</div>
			<div class="panel-body">
				<!-- status -->
				<div class="contain">									
					<div class="gantt">
						<table class="table table-striped">
							<thead>
								<th>Cliente</th>
								<th>Fecha pedido</th>
								<th>Fecha entrega</th>
								<th>Dias restantes</th>
								<th>Editar</th>
							</thead>
							<tbody>
								<tr>
									<td>Martin</td>
									<td>12/10/2016</td>
									<td>15/10/2016</td>
									<td>3</td>
									<td>
										<a href="#" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
									</td>
								</tr>
									<tr>
										<td>Laura</td>
										<td>12/10/2016</td>
										<td>15/10/2016</td>
										<td>3</td>
										<td>
											<a href="#" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
										</td>
									</tr>
									<tr>
										<td>Griselda</td>
										<td>12/10/2016</td>
										<td>15/10/2016</td>
										<td>3</td>
										<td>
											<a href="#" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
										</td>
									</tr>
									<tr>
										<td>Graciela</td>
										<td>20/10/2016</td>
										<td>25/10/2016</td>
										<td>5</td>
										<td>
											<a href="#" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
										</td>
									</tr>
							</tbody>
						</table>
						</div>
				</div>
			</div>
			<!-- status -->
		</div>
	</div>



<div class="col-md-5 skil">
	<div class="content-top-1">
		<div class="col-md-6 top-content">
			<h5>Harina</h5>
			<label>8761</label>
		</div>
		<div class="col-md-6 top-content1">	   
			<div id="demo-pie-1" class="pie-title-center" data-percent="25"> <span class="pie-value">25%</span> </div>
		</div>
			<div class="clearfix"> </div>
	</div>
	<div class="content-top-1">
		<div class="col-md-6 top-content">
			<h5>Chocolate Negro</h5>
			<label>6295</label>
		</div>
		<div class="col-md-6 top-content1">	   
			<div id="demo-pie-2" class="pie-title-center" data-percent="50"> <span class="pie-value">50%</span> </div>
		</div>
		 <div class="clearfix"> </div>
	</div>
	<div class="content-top-1">
		<div class="col-md-6 top-content">
			<h5>Chocolate Blanco</h5>
			<label>3401</label>
		</div>
		<div class="col-md-6 top-content1">	   
			<div id="demo-pie-3" class="pie-title-center" data-percent="75"> <span class="pie-value">75%</span> </div>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>


<script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>


@endsection








