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
			
			<div class="col-sm-9" style="background:non; height:40px; color:#103a71;">
				<h3 style="margin-top:5px;"><?php echo Language::getTitleLang()=='en'?'About Lucky Mall':'អំពីឡាក់គីម៉ល';?></h3>
			</div>
			<div class="col-sm-5" style="margin-top:2%;">
				<a href="#" class="thumbnail">
					<img src="{{ asset('images').'/'. $abouts[0]->image }}" alt="..." style="width:100%; height:350px;">
				</a>
			
			</div>
			<div class="col-sm-4" style="margin-top: 10px;">
				<p><?php echo html_entity_decode($abouts[0]->description)?></p>
			</div>
		
		</div><!-- close row-->
		<hr>
	</div><!-- /.container -->
@stop
