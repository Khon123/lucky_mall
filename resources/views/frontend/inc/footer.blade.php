<!-- Footer -->
<footer>
	<div class="row">
		<nav id="myNavbar" class="navbar navbar-default" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="container-fluid" style="margin-left:-7.5%;">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav" style="margin-top:-1%;">
						@foreach($menuContents as $menu)
							@if($menu->alias != 'home')
								<li><a href="{{ $menu->alias }}" style="font-size:15px;">{{ $menu->name }}</a></li>
							@else
								<li><a href="{{ url('') }}" style="font-size:15px;">{{ $menu->name }}</a></li>
							@endif
							
						@endforeach
						{{--<li><a href="index.html" style="font-size:15px;">Home</a></li>--}}
						{{--<li><a href="store.html" style="font-size:15px;">Store Directory</a></li>--}}
						{{--<li><a href="event.html" style="font-size:15px;">Even & Promotion</a></li>--}}
						{{--<li><a href="common.html" style="font-size:15px;">Common Area Information</a></li>--}}
						{{--<li><a href="career.html" style="font-size:15px;">Career</a></li>--}}
					</ul>
					<p style=" padding:13px; color:blue; margin-top:-1%;">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Copyright &copy; <a href="" style="color:blue;">Lucky Mall</a> <?php echo date("Y")-1 . "-" . date("Y"); ?></p>
				</div><!-- /.navbar-collapse -->
			
			</div>
		</nav><!-- Close Menu -->
	</div><!-- close row-->
</footer>