<?php
use App\Http\Controllers\Helpers\Language;
?>
@extends('backpack::layout')
@section('after_styles')

@endsection

@section('header')
	<section class="content-header">
		<h1>Area Information</h1>
		<ol class="breadcrumb">
			<li class="active">{{ config('app.name') }}</li>
			<li class="active">Area Information</li>
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
						@if(Language::getTitleLang()=='en')
							<button class="btn btn-default" id="add">Add New Area</button>
						@endif
					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered tblData" id="tblData">
						<thead>
						<tr>
							<th class="text-center">Image</th>
							<th class="text-center">Information</th>
							<th class="text-center">Status</th>
							<th class="text-center">Action</th>
						</tr>
						</thead>
						<tbody id="area-table" name="area-table">
                        <?php $i=1?>
						@foreach($areaInfos as $row)
							<tr id="area{{$row->id}}">
								<td class="text-center"><img src="{{ asset('images').'/'. $row->image }}" style=" width: 50px; height: 50px;"></td>
								<td class="text-center"><?php echo substr($row->information,0,100).'...';?></td>
								<td class="text-center">{{$row->status}}</td>
								<td class="text-center">
									<button class="edit_data btn btn-info open-modal" id="edit-des" value="{{$row->id}}">
										<span class="glyphicon glyphicon-edit"></span>
									</button>
								</td>
							</tr>
                            <?php $i++?>
						@endforeach
						</tbody>
					</table>
					<!--============================form=======================-->
					<div class="row form hide" id="frmInput">
						<div class="col-md-8 col-sm-8 col-xs-12">
							
							<form class="form-horizontal" id="formData">
								
								<div class="form-group ">
									<label class="control-label col-sm-3" for="information">
										Information
									</label>
									<div class="col-sm-9">
										<textarea class="form-control my-editor" cols="40" id="information" name="information" rows="5"></textarea>
									</div>
								</div>
								
								@if(Language::getTitleLang() == 'en')
									<div class="form-group ">
										<label class="control-label col-sm-3" for="image">
											Image
										</label>
										<div class="input-group col-sm-9" >
											<div class="input-group-addon">
												<button type="button" id="browse" class="btn-default">Browse</button>
												
											</div>
											<input class="form-control" id="image" name="image" type="text"/>
										</div>
									</div>
								@endif
								
								<div class="form-group ">
									<label class="control-label col-sm-3" for="status">
										Status
									</label>
									<div class="col-sm-9">
										<select class="select form-control" id="status" name="status">
											<option value="Enabled">
												Enabled
											</option>
											<option value="Disabled">
												Disabled
											</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-3">
										<button class="btn btn-primary" id="save" value="1">
											Submit
										</button>
										<button class="btn btn-warning" style="margin-left: 380px;" id="cancel">Cancel</button>
									
									</div>
								</div>
							
							</form>
						</div>
					</div>
					<!--=====================close============-->
				</div>
			</div>
		</div>
	</div>
	@include('backpack::areas.modalImage')
@stop

@section('after_scripts')
	<script type="text/javascript">

        var url = '{{ url('admin/area-information') }}';
        //==================click edit ==============
        $(document).on('click', '.open-modal', function () {
            var id = $(this).val();
            $('#save').val(id);
            $('#save').text('Update');
            $('#add').hide();
            $.get(url+'/'+id, function (data) {
                console.log(data);
                var info = data.information;

                $('#image').val(data.image);

                if(info != null){
                    tinymce.editors['information'].setContent(info);
                }else{
                    tinymce.get('information').setContent('');
                }

                $('#frmInput').removeClass('hide');
                $('.tblData').addClass('hide');

            });
        });
        //==============click add new area ===================
        $('#add').click(function () {
            console.log(4);
            $(this).hide();
            $('#frmInput').removeClass('hide');
            $('.tblData').addClass('hide');
            $('#formData').trigger('reset');
            $('#save').text('Save');
        })
		
        //==============click cancel ===================
        $('#cancel').click(function (e) {
            e.preventDefault();
            $('#add').show();
            $('.form').addClass('hide');
            $('#tblData').removeClass('hide');
            
        });
        
//        ================click browse===================
        $('#browse').click(function (e) {
	        e.preventDefault();
	        $('#myModal').modal('show');
            $('#add-new-image').show();
            $('#myDropzone').hide();
        });
        
//        ===================click save ====================
        $('#save').click(function (e) {
	        e.preventDefault();
	        var id = $(this).val();
	        console.log(id);
	        var state = $(this).text();
	        console.log(state);
	        var type = 'POST';
	        var formData  = {
                information : tinyMCE.get('information').getContent(),
		        image: $('#image').val(),
		        status: $('#status').val()
	        };
	        var url1 = '{{ url('admin/area-information') }}';
	        if(state == "Update"){
	            url1 = url1+'/'+id;
	        }
	        
	        $.ajax({
		       type: type,
		        data: formData,
		        url: url1,
		        success: function (data) {
			        if(state == 'Update'){
			            var rowArea = '<tr id="area'+data.id+'">';
                        rowArea+='<td class="text-center"><img src="{{ asset('images').'/'}}'+data.image+'" style=" width: 50px; height: 50px;"></td>';
                        rowArea+='<td class="text-center">'+ data.information.substr(0,100) +'...</td>';
                        rowArea+='<td class="text-center">'+ data.status +'</td>';
                        rowArea+='<td class="text-center"> <button class="edit_data btn btn-info open-modal" id="edit-des" value="'+ data.id +'"> <span class="glyphicon glyphicon-edit"></span> </button> </td> </tr>';
			            
				        $('#area'+ id).replaceWith(rowArea);
			        }else{
                        
                        for(var i=0; i<data.length; i++){
                            var rowArea = '<tr id="area'+data[i].id+'">';
                            rowArea+='<td class="text-center"><img src="{{ asset('images').'/'}}'+data[i].image+'" style=" width: 50px; height: 50px;"></td>';
                            rowArea+='<td class="text-center">'+ data[i].information.substr(0,100) +'...</td>';
                            rowArea+='<td class="text-center">'+ data[i].status +'</td>';
                            rowArea+='<td class="text-center"> <button class="edit_data btn btn-info open-modal" id="edit-des" value="'+ data[i].id +'"> <span class="glyphicon glyphicon-edit"></span> </button> </td> </tr>';
                            
                            $('#area-table').prepend(rowArea);
                            i=2;
                        }
			        }
                    $('#add').show();
                    $('.form').addClass('hide');
                    $('#tblData').removeClass('hide');
			        
                },
                error: function (data) {
                    console.log("Error:", data);
                }
	        });
	        
        });
		
		// ==========================modal================================
        
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
        
        //==============click use img==============
		$('#btnUse').click(function (e) {
			e.preventDefault();
			var imgUse = $('#imageUse').val();
			$('#image').val(imgUse);
			$('#myModal').modal('hide');
        });
	</script>
@stop