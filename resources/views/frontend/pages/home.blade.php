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
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">
					<?php echo Language::getTitleLang()=='en'? 'Welcome to Lucky Mall': 'សូមស្វាគមន៏មកកាន់​ឡាក់គីម៉ល'?>
				</h3>
				<p><?php echo html_entity_decode($home_des[0]->description)?></p>
			</div>
			<?php $i=1;?>
			@foreach($homeContents as $row)
				<div class="col-sd-4 col-md-4">
					<div class="panel panel-default" style="background:none;">
						<div class="panel-heading">
							<h4>{{ $row->title }}</h4>
						</div>
						<div class="panel-body">
							<p><?php echo html_entity_decode($row->caption);?></p>
							@if($i==1)
								<a href="{{ url('event-promotion') }}" class="btn btn-default"><?php echo Language::getTitleLang() == 'en'? 'Learn More': 'អានបន្ត';?></a>
							
							@endif
							@if($i==2)
								<a href="{{ url('store-directory') }}" class="btn btn-default"><?php echo Language::getTitleLang() == 'en'? 'Learn More': 'អានបន្ត';?></a>
							@endif
							@if($i==3)
								<a href="{{ url('store-directory') }}" class="btn btn-default"><?php echo Language::getTitleLang() == 'en'? 'Learn More': 'អានបន្ត';?></a>
							@endif
						</div>
					</div>
				</div>
				<?php $i++;?>
			@endforeach
		</div>
		<!-- /.row -->
		
		<hr>
	
	</div>
	<!-- /.container -->
@stop
