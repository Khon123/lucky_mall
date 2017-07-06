<!-- Portfolio Item Row -->
<div class="container">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
            <?php $i=1;?>
			@foreach($sliders as $slider)
				@if($i ==1)
					<div class="item active">
						<img class="img-responsive" src="{{ asset('images').'/'. $slider->image }}" alt="" style=" width:100%; height:550px;">
					</div>
				@endif
				
				<div class="item">
					<img class="img-responsive" src="{{ asset('images').'/'. $slider->image }}" alt="" style=" width:100%; height:550px;">
				</div>

                <?php $i++;?>
			@endforeach
		
		</div>
		
		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>

</div>