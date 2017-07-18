				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="{{ route('admin.index')}}"><i class="glyphicon glyphicon-home"></i> <span>Inicio</span></a></li>
										 <li id="menu-academico" ><a href="#"><i class="glyphicon glyphicon-shopping-cart"></i> <span>Pedidos</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="{{ route('admin.pedidos.create')}}">Nuevo Pedido</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.pedidos.index')}}">Todos los pedidos</a></li>
										  </ul>
										</li>
										 <li id="menu-academico" ><a href="#"><i class="glyphicon glyphicon-gift"></i> <span>Articulos</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.articulos.index')}}">Articulos</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.categorias.index')}}">Categorias</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.precios.index')}}">Lista de Precios</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.insumos.index')}}">Insumos</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.ingredientes.index')}}">Ingredientes</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.stocks.index')}}">Stock</a></li>
										  </ul>
										</li>
										<li id="menu-academico" ><a href=""><i class="glyphicon glyphicon-user"></i> <span>Clientes</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="{{ route('admin.pedidos.create')}}">Nuevo Cliente</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.clientes.index')}}">Clientes</a></li>
										  </ul>
										</li>
										<li id="menu-academico" ><a href=""><i class="glyphicon glyphicon-usd"></i> <span>Balance</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="{{ route('admin.movimientos.index')}}">Ingresos / Egresos</a></li>
										  </ul>
										</li>
										<li id="menu-academico" ><a href=""><i class="glyphicon glyphicon-signal"></i> <span>Balance</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="{{ route('admin.movimientos.index')}}">Estadisticas</a></li>
										  </ul>
										</li>
									<li id="menu-academico" ><a href=""><i class="fa fa-table"></i> <span>Usuarios</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="{{ route('admin.users.create')}}">Nuevo Usuario</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{ route('admin.users.index')}}">Usuarios</a></li>
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