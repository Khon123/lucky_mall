<?php
	use App\Http\Controllers\Helpers\Language;
?>
@extends('backpack::layout')

@section('after_styles')

@endsection

@section('header')
	<section class="content-header">
		<h1>Image Sub Menu</h1>
		<ol class="breadcrumb">
			<li class="active">{{ config('app.name') }}</li>
			<li class="active">Image Sub Menu</li>
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
							<button class="btn btn-default" id="add">Add New Image</button>
						@endif
						{{-- ===========include modal========== --}}
						{{--@include('backpack::menus.modalMenu')--}}
					
					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered tblData" id="tblData">
						<thead>
						<tr>
							<th class="text-center">Menu</th>
							<th class="text-center">SubMenu</th>
							<th class="text-center">Image</th>
							<th class="text-center">Caption</th>
							<th class="text-center">Status</th>
							<th class="text-center">Action</th>
						</tr>
						</thead>
						<tbody id="image-sub-menu-table" name="image-sub-menu-table">
						@foreach($images as $row)
							<tr id="image-sub-menu{{$row->id}}">
								<td class="text-center">{{$row->menu->name}}</td>
								<td class="text-center">{{$row->sub_menu->name }}</td>
								<td class="text-center"><img src="{{ asset('images').'/'. $row->image }}" style=" width: 50px; height: 50px;"></td>
								<td class="text-center" id="col_caption{{ $row->id }}">{{ $row->caption }}</td>
								<td class="text-center">{{ $row->status }}</td>
								<td class="text-center">
									<button class="edit_data btn btn-info open-modal" id="edit-modal" value="{{$row->id}}">
										<span class="glyphicon glyphicon-edit"></span>
									</button>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					{{ $images->links() }}
					<!--========================form======================-->
					<div class="row">
						<div class="col-md-8 col-sm-8 col-xs-12">
							<form class="form-horizontal form hide" id="frmData">
								@if(Language::getTitleLang()=='en')
									<div class="form-group ">
										<label class="control-label col-sm-3 requiredField" for="menu_id">
											Menu
											<span class="asteriskField">*</span>
										</label>
										<div class="col-sm-9">
											<select class="select form-control" id="menu_id" name="menu_id">
												<option></option>
												@foreach($menus as $menu)
													<option value="{{ $menu->id }}">{{ $menu->name }}</option>
												@endforeach
											</select>
										</div>
										
									</div>
									<div class="form-group ">
										<label class="control-label col-sm-3 requiredField" for="sub_menu">
											Sub Menu
											<span class="asteriskField">*</span>
										</label>
										<div class="col-sm-8">
											<select class="select form-control" id="sub_menu" name="sub_menu">
											
											</select>
										</div>
										<div class="col-sm-1">
											<button class="btn btn-default" id="addNewSubMenu" style="margin-left: -22px;">NEW</button>
										</div>
										
									</div>
									<div class="form-group ">
										<label class="control-label col-sm-3" for="image">
											Image
										</label>
										<div class="input-group">
											<div class="input-group col-sm-3">
												
												<span class="input-group-btn">
		                                            <button class="btn btn-default" id="browse"><span> Browse </span></button>
		                                        </span>
												<input type="text" id="image" name="image" style="width: 466px;" class="form-control">
											</div>
										</div>
									</div>
								@endif
								<div class="form-group ">
									<label class="control-label col-sm-3 " for="caption">
										Caption Image
									</label>
									<div class="col-sm-9">
										<input class="form-control" id="caption" name="caption" type="text"/>
									</div>
									
								</div>
								@if(Language::getTitleLang()=='en')
									<div class="form-group ">
										<label class="control-label col-sm-3 " for="status">
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
								@endif
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-3">
										<button class="btn btn-primary" id="save" value="1">
											Submit
										</button>
										<button class="btn btn-default" id="cancel">Cancel</button>
									
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
	@include('backpack::image-sub-menus.modalImage')
	@include('backpack::image-sub-menus.modalAddNewSubMenu')
	<meta name="_token" content="{!! csrf_token() !!}" />
@stop
@section('after_scripts')
	
	<script type="text/javascript">


        var url = '{{ url('admin/image-submenu') }}';
        //==================click edit ==============
        $(document).on('click', '.open-modal', function () {
            var id = $(this).val();
            $('#save').val(id);
            $('#save').text('Update');
            $('#add').hide();
            $.get(url+'/'+id, function (data) {
                var urlSubMenu = '{{ url('admin/sub-menu') }}';
                $.get(urlSubMenu+'/'+ data.sub_menu_id, function (e) {
                    var option = '<option value="'+ e.id +'">'+ e.name +'</option>';
                    $('#sub_menu').append(option);
                });
                $('#menu_id').val(data.menu_id);
                $('#image').val(data.image);
                $('#caption').val(data.caption);
                $('#status').val(data.status);

                $('#frmData').removeClass('hide');
                $('.tblData').addClass('hide');
                $('#save').text('Update');
            });

        });
        //==============click add new area ===================
        $('#add').click(function () {
            $(this).hide();
            $('#frmData').removeClass('hide');
            $('.tblData').addClass('hide');
            $('#frmData').trigger('reset');
            $('#save').text('Save');
        });
        
		//==================click menu in select option============

        $('#menu_id').change(function() {
            var id = $(this).val();
            console.log(id);
            $('#sub_menu').find('option').remove().end();
            
                $.get('getSubMenuReferIdMenu'+ '/'+ id, function (datas) {
	                for(var i=0; i<datas.length; i++){
                        var option = '<option value="'+ datas[i].id +'">'+ datas[i].name +'</option>';
                        $('#sub_menu').append(option);
	                }
//	                console.log(datas);
                });
            
        });
        
        //=================click add new sub menu===============
        $('#addNewSubMenu').click(function (e) {
	        e.preventDefault();
	        $('#modalAddNewSubMenu').modal('show');
        })

        //================click browse image===================
        $('#browse').click(function (e) {
            e.preventDefault();
            $('#myModal').modal('show');
            $('#add-new-image').show();
            $('#myDropzone').hide();
        });
        //==============click cancel ===================
        $('#cancel').click(function (e) {
            e.preventDefault();
            $('#add').show();
            $('.form').addClass('hide');
            $('#tblData').removeClass('hide');

        });
		
        //===============click Save Sub menu==================
        $('#saveNewSubMenu').click(function (e) {
            e.preventDefault();
//
            var type = 'POST';
            var formData  = {
                menu_id : $('#menu_id1').val(),
                name: $('#name1').val()
            };
            var url1 = '{{ url('admin/sub-menu') }}';
            $.ajax({
                type: type,
                data: formData,
                url: url1,
                success: function (data) {
	                var option = '<option value="'+ data[0].id +'">'+ data[0].name +'</option>';
                    $('#sub_menu').append(option);
                    $('#modalAddNewSubMenu').modal('hide');
                },
                error: function (data) {
                    console.log("Error:", data);
                }
            });

        });
        
        // ===================click save ====================
        $('#save').click(function (e) {
            e.preventDefault();
            var id = $(this).val();
            console.log(id);
            var state = $(this).text();
            console.log(state);
            var type = 'POST';
            var formData  = {
                menu_id : $('#menu_id').val(),
	            sub_menu_id: $('#sub_menu').val(),
	            image: $('#image').val(),
                caption: $('#caption').val(),
                status: $('#status').val()
            };
            var url1 = url;
            if(state == "Update"){
                url1 = url1+'/'+id;
            }

            $.ajax({
                type: type,
                data: formData,
                url: url1,
                success: function (data) {
	                
                    if('<?php echo Language::getTitleLang() != 'kh'?>'){
                        
                        if(state == 'Update'){
                            var rowImageSubMenu = '<tr id="image-sub-menu'+ data.id +'">';
                            rowImageSubMenu += '<td class="text-center">'+ $('#menu_id option:selected'). text() +'</td>';
                            rowImageSubMenu +='<td class="text-center">'+ $('#sub_menu option:selected').text() +'</td>';
                            rowImageSubMenu += '<td class="text-center"><img src="{{ asset('images').'/'}}'+ data.image +'" style=" width: 50px; height: 50px;"></td>';
                            rowImageSubMenu += '<td class="text-center">'+ data.caption +'</td>';
                            rowImageSubMenu += '<td class="text-center">'+ data.status +'</td>';
                            rowImageSubMenu += '<td class="text-center"> <button class="edit_data btn btn-info open-modal" id="edit-modal" value="'+ data.id +'"> <span class="glyphicon glyphicon-edit"></span> </button> </td> </tr>';

                            $('#image-sub-menu'+id).replaceWith(rowImageSubMenu);
                            $('#add').show();
                            $('.form').addClass('hide');
                            $('#tblData').removeClass('hide');
                        }else{
                            var rowImageSubMenu = '<tr id="image-sub-menu'+ data[0].id +'">';
                            rowImageSubMenu += '<td class="text-center">'+ $('#menu_id option:selected'). text() +'</td>';
                            rowImageSubMenu +='<td class="text-center">'+ $('#sub_menu option:selected').text() +'</td>';
                            rowImageSubMenu += '<td class="text-center"><img src="{{ asset('images').'/'}}'+ data[0].image +'" style=" width: 50px; height: 50px;"></td>';
                            rowImageSubMenu += '<td class="text-center">'+ data[0].caption +'</td>';
                            rowImageSubMenu += '<td class="text-center">'+ data[0].status +'</td>';
                            rowImageSubMenu += '<td class="text-center"> <button class="edit_data btn btn-info open-modal" id="edit-modal" value="'+ data[0].id +'"> <span class="glyphicon glyphicon-edit"></span> </button> </td> </tr>';

                            $('#image-sub-menu-table').prepend(rowImageSubMenu);

                            $('#add').show();
                            $('.form').addClass('hide');
                            $('#tblData').removeClass('hide');

                        }
                    }else{
                        
                        var col_caption = '<td class="text-center" id="col_caption'+ data.id +'">'+ data.caption +'</td>';
                        $('#col_caption'+id).replaceWith(col_caption);
                        
                        $('#add').show();
                        $('.form').addClass('hide');
                        $('#tblData').removeClass('hide');
                    }
                    
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
        $('#update').click(function (e) {
            e.preventDefault();
            var imgUse = $('#imageUse').val();
            $('#image').val(imgUse);
            $('#myModal').modal('hide');
        });
	
	</script>

@stop