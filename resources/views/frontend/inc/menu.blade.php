<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="subheader">
			<div id="email" class="pull-right" style=" margin-top:20px;">
				@foreach($menuHead as $menu)
					@if($menu->alias != 'home')
						<a href="{{ url($menu->alias) }}" style="font-size:18px;"> {{ $menu->name }} &nbsp;</a> |
					@else
						<a href="{{ url('') }}" style="font-size:18px;"> {{ $menu->name }} &nbsp;</a> |
					@endif
				@endforeach
				{{--<a href="index.html" style="font-size:18px;"> Home &nbsp;</a> |--}}
				{{--<a href="about.html" style="font-size:18px;">About Us &nbsp;</a> | &nbsp;--}}
				{{--<a href="contact.html" style="font-size:18px;">Contact Us</a><br /><br/>--}}
				
				{{--<form class="navbar-form pull-right">--}}
					{{--<a href="index_khmer.html" style=" margin-left:0; font-size:18px;">ភាសាខ្មែរ</a> | <a href="index.html" style="font-size:18px;">English</a> &nbsp;<input type="text" class="form-control" placeholder="Search this site ..." id="searchinput" />--}}
				{{--</form>--}}
				
				<ul style="margin-bottom: 10px;margin-top: 13px; ">
					<li style="display: inline-block;">
						<form action="" method="GET">
							<input type="hidden" name="lang" value="kh">
							<input type="submit" value="ភាសាខ្មែរ" style="border:0px;margin-left:85px; font-size:20px; background: white; color: #0066cc;" >
						</form>
					</li> |
					<li style="display: inline-block;">
						<form action="" method="GET">
							<input type="hidden" name="lang" value="en">
							<input type="submit" value='English' style="border:0px;font-size:20px; background: white;color: #0066cc;">
						</form>
					</li>
				</ul>
			</div>
		</div>
		
		
		<!-- /.navbar-collapse -->
	</div>
	<!-- /
	
<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		
		<a class="navbar-brand" style="margin-top: 5px;" href="index.html"><img src="{{ asset('frontend/images/LUCKYMALL_LOGO_FINAL.png') }}" style="margin-top:-95%; width:110px; height:120px; margin-left: 35%;"></a>
	
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			{{--<li><a href="index.html">Home &nbsp;&nbsp;&nbsp;</a></li>--}}
			{{--<li><a href="store.html">Store Directory &nbsp;&nbsp;&nbsp;</a></li>--}}
			{{--<li><a href="event.html">Event & Promotion &nbsp;&nbsp;&nbsp;</a></li>--}}
			{{--<li><a href="common.html">Common Area Information &nbsp;&nbsp;&nbsp;</a></li>--}}
			{{--<li><a href="career.html">Career</a></li>--}}
			
			@foreach($menuContents as $menu)
				@if($menu->alias != 'home')
					<li><a href="{{ $menu->alias }}">{{ $menu->name }}</a></li>
				@else
					<li><a href="{{ url('') }}">{{ $menu->name }}</a></li>
				@endif
			
			@endforeach
		</ul>
	</div>
	<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>