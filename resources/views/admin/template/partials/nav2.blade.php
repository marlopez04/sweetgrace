				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="{{ route('admin.index')}}"><i class="fa fa-tachometer"></i> <span>Inicio</span></a></li>
										 <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span>Pedidos</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="{{ route('admin.pedidos.create')}}">Nuevo Pedido</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.pedidos.create')}}">Pendientes</a></li>
											<li id="menu-academico-boletim" ><a href="{{ route('admin.pedidos.create')}}">Entregados</a></li>
										  </ul>
										</li>
										 <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span>Categorias</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="{{ route('admin.categorias.create')}}">Nueva</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.categorias.index')}}">Categorias</a></li>
										  </ul>
										</li>
										 <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span>Lista de Precios</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="{{ route('admin.precios.index')}}">Nueva lista</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.precios.create')}}">Lista de Precios</a></li>
										  </ul>
										 <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span>Articulos</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="{{ route('admin.articulos.create')}}">Nuevo</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.articulos.index')}}">Articulos</a></li>
										  </ul>
										</li>
										<li id="menu-academico" ><a href=""><i class="fa fa-table"></i> <span>Clientes</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="{{ route('admin.pedidos.create')}}">Nuevo Cliente</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.clientes.index')}}">Clientes</a></li>
										  </ul>
										</li>
									<li id="menu-academico" ><a href=""><i class="fa fa-table"></i> <span>Usuarios</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="{{ route('admin.users.create')}}">Nuevo Usuario</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.users.index')}}">Usuarios</a></li>
										  </ul>
										</li>
									<li id="menu-academico" ><a href="shoes.html"><i class="lnr lnr-book"></i> <span>Shoes</span></a></li>
									 <li><a href="bags.html"><i class="lnr lnr-envelope"></i> <span>Bags</span></a></li>
									<li><a href="products.html"><i class="lnr lnr-chart-bars"></i> <span>Watches</span></a></li>
							        <li id="menu-academico" ><a href="#"><i class="lnr lnr-layers"></i> <span>Tabs & Calender</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										 <ul id="menu-academico-sub" >
											<li id="menu-academico-avaliacoes" ><a href="tabs.html">Tabs</a></li>
											<li id="menu-academico-boletim" ><a href="calender.html">Calender</a></li>

										  </ul>
									 </li>
									<li><a href="#"><i class="lnr lnr-chart-bars"></i> <span>Forms</span> <span class="fa fa-angle-right" style="float: right"></span></a>
									  <ul>
										<li><a href="input.html"> Input</a></li>
										<li><a href="validation.html">Validation</a></li>
									</ul>
									</li>
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = false;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>