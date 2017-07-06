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
			
			<div class="col-sm-9" style="color:#103a71;">
				<h3 style="margin-top:5px;"><?php echo Language::getTitleLang()=='en'?'Career Opportunities':'ឱកាសការងារ';?></h3>
			</div>
			
			<div class="col-sm-9">
				<p><?php echo html_entity_decode($careerContents[0]->detial)?></p>
			</div>
			
			<div class="col-sm-9" style="border-top: 1px solid red;">
				@foreach($careers as $career)
					<h3 style="color:#103a71;">{{ $career->job_title }}</h3>
					<p><?php echo html_entity_decode($career->job_description)?></p>
					<p><a style="color:blue;"><?php echo Language::getTitleLang()=='en'?'Posted Date :':'កាលបរិច្ឆេទប្រកាស :';?><?php echo date("d-m-Y", strtotime($career->post_date)); ?></a></p>
					<p><a style="color:blue;"><?php echo Language::getTitleLang()=='en'?'Closing Date :':'កាលបរិច្ឆេទបិទ :';?><?php echo date("d-m-Y", strtotime($career->close_date)); ?></a></p>
					<a class="btn btn-primary read-more" id="{{ $career->id }}" href="javascript:void(0)"><?php echo Language::getTitleLang()=='en'?'Read More':'អានបន្ត';?><i class="fa fa-angle-right"></i></a>
					<hr>
				@endforeach
				
			</div>
		</div><!-- close row--->
		<hr>
	</div><!-- /.container -->
	@include('frontend.inc.modalCareerDetail')
@stop

@section('after_scripts')
	<script type="text/javascript">
		$(document).on('click', '.read-more', function () {
			var id = $(this).attr('id');
			$.get('admin/career'+'/'+ id, function (data) {
			    console.log(data);
			   
				$('#job_title').text(data.job_title);
				$('#job_des').html(data.job_description);
				$('#job_req').html(data.job_requirement);
				
				$('#myModal').modal('show');
            });
        });
	</script>
@stop

