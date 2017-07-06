<?php
	use App\Http\Controllers\Helpers\Language;
?>
@extends('backpack::layout')

@section('after_styles')

@endsection

@section('header')
	<section class="content-header">
		<h1>About</h1>
		<ol class="breadcrumb">
			<li class="active">{{ config('app.name') }}</li>
			<li class="active">About</li>
		</ol>
	</section>
@endsection

@section('content')
	@include('backpack::inc.message')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<form id="frmEdit" name="frmEdit" class="hide form">
						{{ csrf_field() }}
						<div class="form-group">
							<textarea class="form-control my-editor" id="description" name="description"></textarea>
						</div>
						
						<div class="form-group">
							<button class="btn btn-info " id="update" name="update" value="">Update</button>
							<button class="btn btn-default " id="cancel" name="cancel" value="" style="margin-left: 40px;">Cancel</button>
						
						</div>
					</form>
					<div class="box-title">
					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered" id="table">
						<thead>
						<tr>
							<th class="text-center">ID</th>
							<th class="text-center">Image</th>
							<th class="text-center">Description</th>
							<th class="text-center">Action</th>
						</tr>
						</thead>
						<tbody id="about-table" name="about-table">
						@foreach($abouts as $row)
							<tr id="about{{$row->id}}">
								<td class="text-center">1</td>
								<td class="text-center" id="id_img{{ $row->id }}"><img src="{{ asset('images').'/'. $row->image }}" style=" width: 50px; height: 50px;"></td>
								<td class="text-center" id="id_des{{ $row->id }}"><?php echo substr($row->description, 0, 100) .' ...';?></td>
								<td class="text-center">
									<button class="edit_data btn btn-info open-modal" id="edit-des" value="{{$row->id}}">
										<span class="glyphicon glyphicon-edit">DES</span>
									</button>
									@if(Language::getTitleLang() == 'en')
										<button class="edit_data btn btn-info open-modal" id="edit-img" value="{{$row->id}}">
											<span class="glyphicon glyphicon-edit">IMG</span>
										</button>
									@endif
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@include('backpack::abouts.modalImage')
@stop

@section('after_scripts')
	
	<script type="text/javascript">
		var url = '{{ url('admin/about') }}';
		//==================click edit des==============
		$('#edit-des').click(function () {
		    var id = $(this).val();
		    $('#update').val(id);
			console.log(id);
			
			$.get(url+'/'+id, function (data) {
			    console.log(data);
                var des = data.description;

                if(des != null){
                    tinymce.editors['description'].setContent(des);
                }else{
                    tinymce.get('description').setContent('');
                }
                
                $('#frmEdit').removeClass('hide');
                $('.table').addClass('hide');
				
            });
        });

        //==============click cancel ===================
        $('#cancel').click(function (e) {
            e.preventDefault();
            $('.form').addClass('hide');
            $('#table').removeClass('hide');
        });
		
        //===============click update ===================
        $('#update').click(function (e) {
            var id = $(this).val();
            console.log(id);
            e.preventDefault();

            var type = "POST";
            var token = $('input[name=_token]').val();

            var des = tinyMCE.get('description').getContent();

            if(des== null){
                return false;
            }

            $.ajax({
                type: type,
                url: url+'/'+id,
                data : {_token: token, description: des },
                success: function (data) {
                    console.log(data);
                    var des = data.description;
                    var col_des='<td class="text-center" id="id_des'+data.id+'">'+des.substr(0,100)+'...</td>';
	                   
                    $("#id_des" + id).replaceWith( col_des );

                    $('.form').addClass('hide');
                    $('#table').removeClass('hide');
                },
                error: function (data) {
                    console.log("Error:", data);
                }
            });

        });
	//======================================================================================

        // ===========myDropzone in modal=============
        Dropzone.options.myDropzone = {

            url: "{{ url('admin/masterImage') }}",
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                }
                else { done(); }
            },
//            ===========uload success=========
            success: function(file,response){
                if(response.status == 'error')
                {
                    alert( response.reason );
                }
                else{
                    $.get('{{ url('admin/masterImage') }}', function (data) {
                        var urlImage = "{{ url('images/') }}";
                        var image = '<div class="col-md-3 col-sm-4 col-xs-12"> <button class="image" value="'+ data.id +'" style="background: none; border: none"> <img src="{{ url('images').'/'}}'+data.name+'" style=" border-radius: 5px; width: 200px; height: 200px; border: solid 1px #31CCFF;margin-bottom: 7px;"> </button> </div>'
                        $('#image-list').prepend(image);
                        $('#myDropzone').hide();
                        $('#add-new-image').show();
                    });

                }
            }
        };

//        =========== display  modal edit image=============
		$('#edit-img').click(function () {
            var id = $(this).val();
            console.log(id);
            $('#updateImg').val($(this).val());
            $('#frmUpdateImage').trigger("reset");
            $('#myModal').modal('show');
            $('#add-new-image').show();
            $('#myDropzone').hide();
        })

        // ============click image==============
        $(document).on('click','.image', function () {

            var id = $(this).val();
            console.log(id);
            $.get('image/imageMaster/' + id, function (data) {
                //success data
                console.log(data);
                $('#imageUse').val(data.name);

            });
        });

        //        ==============click add new Image to display dropzone=======
        $('#add-new-image').click(function () {
            $('#add-new-image').hide();
            $('#myDropzone').show();
        });

        //        ================close dropzone=========
        $('#hideDropzone').click(function () {
            $('#myDropzone').hide();
            $('#add-new-image').show();
        });

        //        ==============click to upload image===========

        $('#myDropzone').on('submit',function (e) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            e.preventDefault();
            var urlUpload ="{{ url('admin/masterImage') }}";
            var type = "POST";
            var token = $('input[name=_token]').val();
            var image = $('input[name=image]').val();
            console.log(image);
            var formData = $( this ).serialize();

            $.ajax({
                type: type,
                url: urlUpload,
                data : {_token:token, image:image},
                contentType: false,
                processData:false,
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {
                    console.log("Error:", data);
                }
            });

        });

        //    ================click to update image=======================
        $('#updateImg').click(function (e) {
            var id = $(this).val();
            console.log(id);
            var urlUpdate = url+'/'+id;
            e.preventDefault();

            var type = "POST";
            var token = $('input[name=_token]').val();

            var imageUse = $('input[name=imageUse]').val();

            $.ajax({
                type: type,
                url: urlUpdate,
                data : {_token: token, image: imageUse },
                success: function (data) {
                    console.log(data);

                    var col_img = '<td class="text-center" id="id_img'+data.id+'"><img src="{{ asset('images').'/'}}'+data.image+'" style=" width: 50px; height: 50px;"></td>'
                    $("#id_img" + id).replaceWith( col_img );

                    $('#myModal').modal('hide');
                },
                error: function (data) {
                    console.log("Error:", data);
                }
            });

        });
	</script>
@stop