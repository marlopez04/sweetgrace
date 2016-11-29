	<div class="header-section">
	<!-- top_bg -->
			<div class="top_bg">
				
					<div class="header_top">
						<div class="top_right">
							<ul>
								<li><a href=""></a></li>
								<li><a href=""></a></li>
								<li><a href=""></a></li>
								<li>{{ Auth::user()->name }}</li>
								<li><a href="{{ route('admin.auth.logout') }}">(Logout)</a></li>
							</ul>
						</div>
							<div class="clearfix"> </div>
					</div>
				
			</div>
		<div class="clearfix"></div>
	<!-- /top_bg -->
	</div>