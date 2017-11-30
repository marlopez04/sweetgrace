@extends('admin.template.main')

@section('title', 'Pedidos pendientes.')

@section('content')
				
<div class="monthly-grid">
	<div class="panel panel-widget">
		<div class="panel-title">
			RIEGO 	  
		</div>
			<div class="panel-body">
				<!-- status -->
				<div class="contain">									
						<h1 class="black">segundos transcurridos</h1>
						<h2 class="black">tiempo total</h2>

						<div class="col-md-9">
						<div class="gantt">
						Sector 3
						</div>

						<div class="progress">
						  <div id="prueba" class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
						  aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
						    50% (REGANDO)
						  </div>
						</div>

					<div class="gantt">
						Riego de girasol
						</div>

						<div class="progress">
						  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar"
						  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
						    60% (EN ESPERA)
						  </div>
						</div>

						<div>
							<iframe src="http://192.168.100.103" frameborder="0"></iframe>
						</div>

						</div>

            			<div class="col-md-3 cart-total">
							<table border=1 class="table">

								<tr>
									<td id="s3"><h3>S3</h5></td>
									<td id="s4"><h3>S4</h5></td>
									<td id="s5"><h3>S5</h5></td>
								</tr>
		  					    <tr>
									<td id="s2" ><h3>S2</h5></td>
									<td><h3></h5></td>
									<td id="s6"><h3>S6</h5></td>
								</tr>
		  					    <tr>
									<td id="s1"><h3>S1</h5></td>
									<td><h3></h5></td>
									<td id="s7"><h3>S7</h5></td>
								</tr>
		  					    <tr>
									<td><h3></h5></td>
									<td><h3></h5></td>
									<td id="s8"><h3>S8</h5></td>
								</tr>
							</table>
						</div>


				</div>
			</div>
			<!-- status -->
		</div>
	</div>

<!-- insumos inicio -->




<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
 
contador = 0;
tiempototal = 15;


//convertir segundos a HH:MM:SS (para mostrar totalizado)   INICIO
var time = tiempototal;

var minutes = Math.floor( time / 60 );
var seconds = time % 60;
 
//Anteponiendo un 0 a los minutos si son menos de 10 
minutes = minutes < 10 ? '0' + minutes : minutes;
 
//Anteponiendo un 0 a los segundos si son menos de 10 
seconds = seconds < 10 ? '0' + seconds : seconds;
 
var result = minutes + ":" + seconds;  // 161:30

var hours = Math.floor( time / 3600 );  
var minutes = Math.floor( (time % 3600) / 60 );
var seconds = time % 60;
 
//Anteponiendo un 0 a los minutos si son menos de 10 
minutes = minutes < 10 ? '0' + minutes : minutes;
 
//Anteponiendo un 0 a los segundos si son menos de 10 
seconds = seconds < 10 ? '0' + seconds : seconds;
 
var result = hours + ":" + minutes + ":" + seconds;  // 2:41:30

tiempoD = result;

//convertir segundos a HH:MM:SS (para mostrar totalizado)   FIN

$("#s3").css("background-color", "#A9C5EB");  //CELESTE
$("#s4").css("background-color", "#FFCFA4");  //NARANJA

//direcciones para arduino

$(document).ready(function() {    
    function changeColor(){
    	contador = contador + 1;
    	porcentaje = Math.round((contador * 100) / tiempototal);

    	porcentajeS = "width:" + porcentaje + "%";
    	display = porcentaje + "% (REGANDO)"

            $('h1').text(contador);
            $('h2').text(tiempoD);
            $("#prueba").attr("aria-valuenow", porcentaje)
            $("#prueba").attr("style", porcentajeS);
            $("#prueba").html(display);

			if (porcentaje == 100) {
				contador = 0;

				if ($("#prueba").hasClass('progress-bar progress-bar-info progress-bar-striped active')) {
					//cambio el tipo de ESPERA
					$("#prueba").removeClass('progress-bar progress-bar-info progress-bar-striped active');
					$("#prueba").addClass('progress-bar progress-bar-warning progress-bar-striped active');
					$("#s3").css("background-color", "#FFCFA4");
				

				ventana1 = window.open("http://192.168.100.103/?VENTILADOR=OFF", "nuevo", "width=400,height=400");

				setTimeout(cerrarVentana,60);
				function cerrarVentana(){
 			    ventana1.close();
				}



					
				}else{
					//cambio el tipo de RIEGO
					$("#prueba").removeClass('progress-bar progress-bar-warning progress-bar-striped active');
					$("#prueba").addClass('progress-bar progress-bar-info progress-bar-striped active');
					$("#s3").css("background-color", "#A9C5EB");


				ventana1 = window.open("http://192.168.100.103/?VENTILADOR=ON", "nuevo", "width=400,height=400");
				setTimeout(cerrarVentana,60);

				function cerrarVentana(){
 			    ventana1.close();
				}


				};
				

			};

    }
    setInterval(changeColor, 1000);
});
</script>



@endsection

