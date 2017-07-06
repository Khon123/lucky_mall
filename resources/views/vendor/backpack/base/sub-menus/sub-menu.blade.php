<?php
	use App\Http\Controllers\Helpers\Language;
?>
@extends('backpack::layout')

@section('after_styles')

@endsection

@section('header')
	<section class="content-header">
		<h1>SubMenu</h1>
		<ol class="breadcrumb">
			<li class="active">{{ config('app.name') }}</li>
			<li class="active">SubMenu</li>
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
							<button class="btn btn-default" id="add">Add New SubMenu</button>
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
							<th class="text-center">Status</th>
							<th class="text-center">Action</th>
						</tr>
						</thead>
						<tbody id="subMenu-table" name="subMenu-table">
                        <?php $id= 1; ?>
						@foreach($subMenus as $row)
							<tr id="subMenu{{$row->id}}">
								<td class="text-center" id="col_menu{{ $row->id }}">{{$row->menu->name}}</td>
								<th class="text-center" id="col_name{{ $row->id }}">{{ $row->name }}</th>
								<th class="text-center" id="col_status{{ $row->id }}">{{ $row->status }}</th>
								<td class="text-center" id="col_action{{ $row->id}}">
									<button class="edit_data btn btn-info open-modal" id="edit-modal" value="{{$row->id}}">
										<span class="glyphicon glyphicon-edit"></span>
									</button>
								</td>
							</tr>
                            <?php $id++; ?>
						@endforeach
						</tbody>
					</table>
					
					<!--========================form======================-->
					<div class="row form hide" id="frmInput">
						<div class="col-md-8 col-sm-8 col-xs-12">
							
							<form class="form-horizontal" id="formData">
								@if(Language::getTitleLang() == 'en')
									<div class="form-group ">
										<label class="control-label col-sm-3" for="menus_id">
											Menu
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
								@endif
								<div class="form-group ">
									<label class="control-label col-md-3 requiredField" for="name">
										SubMenu
										<span class="asteriskField">
								        *
								       </span>
									</label>
									<div class="col-sm-9">
										<input class="form-control" id="name" name="name" type="text"/>
									</div>
								</div>
							
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
	<meta name="_token" content="{!! csrf_token() !!}" />
@stop
@section('after_scripts')
	
	<script type="text/javascript">


        var url = '{{ url('admin/sub-menu') }}';
        //==================click edit ==============
        $(document).on('click', '.open-modal', function () {
            var id = $(this).val();
            $('#save').val(id);
            $('#save').text('Update');
            $('#add').hide();
	        $.get(url+'/'+id, function (data) {
		        $('#menu_id').val(data.menu_id);
		        $('#name').val(data.name);
		        $('#status').val(data.status);

                $('#frmInput').removeClass('hide');
                $('.tblData').addClass('hide');
            })
            

            
        });
        //==============click add new area ===================
        $('#add').click(function () {
            console.log(4);
            $(this).hide();
            $('#frmInput').removeClass('hide');
            $('.tblData').addClass('hide');
            $('#formData').trigger('reset');
            $('#save').text('Save');
	        
        });

        //==============click cancel ===================
        $('#cancel').click(function (e) {
            e.preventDefault();
            $('#add').show();
            $('.form').addClass('hide');
            $('#tblData').removeClass('hide');

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
                menu_id : $('#menu_id').val(),
                name: $('#name').val(),
                status: $('#status').val()
            };
            var url1 = '{{ url('admin/sub-menu') }}';
            if(state == "Update"){
                url1 = url1+'/'+id;
            }

            $.ajax({
                type: type,
                data: formData,
                url: url1,
                success: function (data) {
                    
                    
                    if(state == 'Update'){
	                    var col_name = '<th class="text-center" id="col_name'+ data.id +'">'+ data.name +'</th>';
	                    var col_status = '<th class="text-center" id="col_status'+ data.id +'">'+ data.status +'</th>';
	                    
                        var menu_id = data.menu_id;
                        $.get('{{ url('admin/menu').'/' }}'+menu_id, function (e) {

                            var col_menu = '<td class="text-center" id="col_menu'+ data.id +'">'+ e.name +'</td>';
                            
                            $('#col_menu'+ id).replaceWith(col_menu);
                        });
                        
	                    $('#col_name'+id).replaceWith(col_name);
                        $('#col_status'+id).replaceWith(col_status);
                        
                        $('#add').show();
                        $('.form').addClass('hide');
                        $('#tblData').removeClass('hide');
                        
                    }else{
                        
                        var menu_id = data[0].menu_id;
                        $.get('{{ url('admin/menu').'/' }}'+menu_id, function (e) {

                            var rowSubMenu ='<tr id="subMenu'+ data[0].id +'"><td class="text-center" id="col_menu'+ data[0].id +'">'+ e.name +'</td>';
	                        rowSubMenu+='<th class="text-center" id="col_name'+ data[0].id +'">'+ data[0].name +'</th>';
                            rowSubMenu+= '<th class="text-center" id="col_status'+ data[0].id +'">'+ data[0].status +'</th>';
                            rowSubMenu+= '<td class="text-center" id="col_action'+ data[0].id +'"> <button class="edit_data btn btn-info open-modal" id="edit-modal" value="'+ data[0].id +'"> <span class="glyphicon glyphicon-edit"></span> </button> </td></tr>';
                            
                            $('#subMenu-table').prepend(rowSubMenu);
                        });
                      
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
	
	</script>

@stop