<?php
	use App\Http\Controllers\Helpers\Language;
?>
@extends('frontend.layout.app')

@section('after_styles')

@stop

@section('content')
	<!-- Page Content -->
	<div class="container">
		
		<!-- Marketing Icons Section -->
		<div class="row" style="margin-top:2px;" id="image">
			@include('frontend.inc.video-image')
			
			<div class="col-sm-9" style="background:none; height:40px; color:#103a71;">
				<h3 style="margin-top:15px; color:#103a71;"><?php echo Language::getTitleLang()=='en'?'Store Directory':'ពត៌មានហាង';?></h3>
			</div>
			<div class="col-sm-9" style="margin-top:0.5%;">
				<ul class="nav navbar-nav">
					<li><a href="javascript:void(0)" id="all-sub_menu" style="color:#103a71;"><b><?php echo Language::getTitleLang()=='en'?'All':'ទាំងអស់';?></b></a></li>
					@foreach($sub_menus as $sub_menu)
						<li><a href="javascript:void(0)" style="color:#103a71;" class="sub-menu" id="{{ $sub_menu->id }}"><b>{{ $sub_menu->name }}</b></a></li>
					@endforeach
				</ul>
			
			</div>
			
			
			@foreach($image_sub_menus as $image_sub_menu)
				<div class="col-sm-3 imageAll">
					<div class="grid" style="margin-top:7%;">
						<figure class="effect-zoe">
							<img src="{{ asset('images').'/'. $image_sub_menu->image }}" alt="..." style="width:90%; height:180px;">
							<figcaption>
								<h3>{{ $image_sub_menu->caption }}</h3>
								<a href="#">View more</a>
							</figcaption>
						</figure>
					</div>
				</div>
			@endforeach
		</div><!-- close row--->
		<hr>
	</div><!-- /.container -->
@stop

@section('after_scripts')
	<script type="text/javascript">
		var url ='{{ url('store-directory') }}';
		$(document).on('click', '.sub-menu', function () {
			var id = $(this).attr('id');
			
			$.get(url+'/'+id, function (data) {
                $('.imageAll').remove();
				console.log(data);
				for(i=0; i<data.length; i++){
				    var image = '<div class="col-sm-3 imageAll"><div class="grid" style="margin-top:7%;">';
					image +='<figure class="effect-zoe"><img src="{{ asset('images').'/'}}'+ data[i].image +'" alt="..." style="width:90%; height:180px;">';
                    image +='<figcaption> <h3>'+ data[i].caption +'</h3> <a href="#">View more</a>';
                    image +='</figcaption></figure></div></div>';
                    $('#image').append(image);
				}
            });
        });
		$('#all-sub_menu').click(function () {
            $.get('image-all', function (data) {
                $('.imageAll').remove();
                console.log(data);
                for(i=0; i<data.length; i++){
                    var image = '<div class="col-sm-3 imageAll"><div class="grid" style="margin-top:7%;">';
                    image +='<figure class="effect-zoe"><img src="{{ asset('images').'/'}}'+ data[i].image +'" alt="..." style="width:90%; height:180px;">';
                    image +='<figcaption> <h3>'+ data[i].caption +'</h3> <a href="#">View more</a>';
                    image +='</figcaption></figure></div></div>';
                    $('#image').append(image);
                }
            });
        });
	</script>
@stop