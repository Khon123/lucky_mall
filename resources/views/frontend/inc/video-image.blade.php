<div class="col-sm-3">
	<div class="leftHalf">
		<!-- facbook -->
		<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLucky-Salon-Spa-280393978778604%2F%3Ffref%3Dts&tabs=timeline&width=350&height=225&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="280" height="200" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
		<!-- close facbook-->
		<!--- video -->
		@foreach($videos as $video)
			<div class="embed-responsive embed-responsive-16by9">
				<object width="425" height="400">
					<param name="movie" value="{{ $video->url }}"></param>
					<param name="allowFullScreen" value="true"></param>
					<embed src="{{ $video->url }}" type="application/x-shockwave-flash" allowfullscreen="true" style="top:14%; width:100%; height:150px;">
					</embed>
				</object>
			</div><!--close embed-responsive-16by9-->
		@endforeach
		
		<?php $i=1;?>
		@foreach($images as $image)
			<a href="#" class="thumbnail" <?php echo $i==1 ? 'style="margin-top:10%;"': ''; ?>>
				<img src="{{ asset('images').'/'. $image->url }}" alt="Responsive image" style="width:100%; height:124px;">
			</a>
			<?php $i++?>
		@endforeach
	</div>
</div><!-- close contaner-->
<!-- Add the extra clearfix for only the required viewport -->