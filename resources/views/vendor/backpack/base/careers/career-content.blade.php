@extends('backpack::layout')

@section('after_styles')

@endsection

@section('header')
	<section class="content-header">
		<h1>Career Content</h1>
		<ol class="breadcrumb">
			<li class="active">{{ config('app.name') }}</li>
			<li class="active">Career Content</li>
		</ol>
	</section>
@endsection

@section('content')
	@include('backpack::inc.message')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-default">
				<div class="box-header with-border">
					
					<div class="box-title">
						
						{{-- ===========include modal========== --}}
						{{--@include('backpack::careers.modalCareerContent')--}}
						{{--<button class="btn btn-default" id="add">Add New Image</button>--}}
					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered tblData" id="tblData">
						<thead>
						<tr>
							<th class="text-center">ID</th>
							<th class="text-center">Detial</th>
							<th class="text-center">Language</th>
							<th class="text-center">Action</th>
						</tr>
						</thead>
						<tbody id="career-table" name="career-table">
						@foreach($careerContents as $row)
							<tr id="career{{$row->id}}">
								<td class="text-center">1</td>
								<td class="text-center"><?php echo html_entity_decode($row->detial);?></td>
								<td class="text-center">{{$row->lang}}</td>
								<td class="text-center">
									<button class="edit_data btn btn-info open-modal" id="edit-modal" value="{{$row->id}}">
										<span class="glyphicon glyphicon-edit"></span>
									</button>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					
					<!--===================form==================-->
					<form id="frmEdit" name="frmEdit" class="hide form">
						{{ csrf_field() }}
						<div class="form-group">
							<textarea class="form-control my-editor" id="detial" name="detial"></textarea>
						</div>
						{{--<button type="button" id="closeDropzone" class="pull-right" style="margin-top: -22px;margin-right: -22px;"><span aria-hidden="true">×</span></button>--}}
						<div class="form-group">
							<button class="btn btn-info " id="update" name="update" value="">Update</button>
							<button class="btn btn-default" id="cancel">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop

@section('after_scripts')
	
	<script type="text/javascript">
		
		var url = '{{ url('admin/career-content') }}'
		// ===============click edit button=================
		$(document).on('click', '.open-modal', function () {
            $('.tblData').addClass('hide');
		    var id = $(this).val();
		    $('#update').val(id);
		    $.get(url+'/'+id, function (data) {
		        console.log(data);
		        var detial = data.detial;
		        
		        if(detial != null){
                    tinymce.get('detial').setContent(data.detial);
		        }else{
                    tinymce.get('detial').setContent('');
		        }
			    $('#frmEdit').removeClass('hide');
            });
        });
//		===============click update===============
        $('#update').click(function (e) {
            var id = $(this).val();
            console.log(id);
            var urlUpdate = url+'/'+id;
            e.preventDefault();
	        
            var type = "POST";
            var token = $('input[name=_token]').val();

            var detial = tinyMCE.get('detial').getContent();
	        
            if(detial == null){
                return false;
            }

            $.ajax({
                type: type,
                url: urlUpdate,
                data : {_token: token, detial: detial },
                success: function (data) {
                    console.log(data);

                    var careerContent = '<tr id="career'+data.id+'">';
                    careerContent+='<td class="text-center">'+data.id+'</td>';
                    careerContent+='<td class="text-center">'+data.detial+'</td>';
                    careerContent+='<td class="text-center">'+data.lang+'</td>';
                    careerContent+='<td class="text-center"> <button class="edit_data btn btn-info open-modal" id="edit-modal" value="'+ data.id +'"> <span class="glyphicon glyphicon-edit"></span> </button> </td></tr>';

                    $("#career" + id).replaceWith( careerContent );

                    $('.form').addClass('hide');
                    $('#tblData').removeClass('hide');
                },
                error: function (data) {
                    console.log("Error:", data);
                }
            });

        });
//        =====================click cancel ===================
		$('#cancel').click(function (e) {
		    e.preventDefault();
			$('.form').addClass('hide');
			$('#tblData').removeClass('hide');
        })
	</script>
@stop
