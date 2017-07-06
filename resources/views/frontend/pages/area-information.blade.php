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
		
		<div class="row" style="margin-top:2px;">
			
			@include('frontend.inc.video-image')
			
			<div class="col-lg-9 col-sm-9" style="background:none; height:40px; color:#103a71;">
				<h3 style="margin-top:5px;"><?php echo Language::getTitleLang()=='en'?'Common Area Information':'ទីកន្លែងសំរាប់ជួល';?></h3>
			</div>
			<div class="col-lg-9" style="margin-top:1%;">
				<p>{{ $areaDetails[0]->detail }}</p>
			</div>
			<div class="row">
				@foreach($areaInformations as $areaInformation)
					<div class="col-lg-4" style="margin-top:1%;">
						<p><?php echo html_entity_decode($areaInformation->information)?></p>
					
					</div>
					<div class="col-lg-5" style="margin-top:0.5%;">
						<a href="#" class="thumbnail">
							<img src="{{ asset('images').'/'. $areaInformation->image }}" alt="..." style="width:100%; height:250px;">
						</a>
					</div>
					<hr>
				@endforeach
				<div class="col-lg-9">
					<!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15527.238826322044!2d103.8552592!3d13.3621056!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe144b495cd2a8758!2sLucky+Mall!5e0!3m2!1skm!2skh!4v1465802258163" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>-->
				</div>
			</div><!-- close row-->
		
		</div><!-- close row--->
		<hr>
	</div><!-- /.container -->
@stop