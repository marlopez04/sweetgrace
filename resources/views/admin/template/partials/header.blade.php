	<div class="header-section">
	<!-- top_bg -->
			<div class="top_bg">
				
					<div class="header_top">
						<div class="top_right">
							<ul>
								<li><a href="contact.html">help</a></li>|
								<li><a href="contact.html">Contact</a></li>|
								<li><a href="checkout.html">Delivery information</a></li>
							</ul>
						</div>
						<div class="top_left">
							@if(Auth::user())
						    <ul class="nav navbar-nav navbar-right">
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="{{ route('admin.auth.logout') }}">Logout</a></li>
					          </ul>
					        </li>
					      	</ul>

					      	@else
								<h2>USUARIO</h2>
							@endif
						</div>
							<div class="clearfix"> </div>
					</div>
				
			</div>
		<div class="clearfix"></div>
	<!-- /top_bg -->
	</div>