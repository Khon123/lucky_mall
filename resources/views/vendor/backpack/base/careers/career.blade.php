
@extends('backpack::layout')

@section('after_styles')
	<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
@endsection

@section('header')
	<section class="content-header">
		<h1>Career</h1>
		<ol class="breadcrumb">
			<li class="active">{{ config('app.name') }}</li>
			<li class="active">Career</li>
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
						<button class="btn btn-default" id="add">Add New Job</button>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered tblCareer tblData" id="tblData">
						<thead>
						<tr>
							<th class="text-center">Job Title</th>
							<th class="text-center">Post Date</th>
							<th class="text-center">Close Date</th>
							<th class="text-center">Status</th>
							<th class="text-center">Action</th>
						</tr>
						</thead>
						<tbody id="career-table" name="career-table">
						<?php $id = 1; ?>
						@foreach($careers as $row)
							<tr id="career{{$row->id}}">
								<td class="text-center">{{ $row->job_title }}</td>
								<td class="text-center">{{$row->post_date}}</td>
								<td class="text-center">{{$row->close_date}}</td>
								<td class="text-center">{{$row->status}}</td>
								<td class="text-center">
									<button class="edit_data btn btn-info open-modal" id="edit-modal" value="{{$row->id}}">
										<span class="glyphicon glyphicon-edit"></span>
									</button>
								</td>
							</tr>
							<?php $id++;?>
						@endforeach
						</tbody>
					</table>
					<!--===================form==============-->
					<div class="row form hide" id="frmInput">
						<div class="col-md-8 col-sm-8 col-xs-12">
							
							<form class="form-horizontal" id="formData">
								<div class="form-group ">
									<label class="control-label col-sm-3 requiredField" for="job_title">
										Job Title
										<span class="asteriskField">
                                    *
                                </span>
									</label>
									<div class="col-sm-9">
										<input class="form-control" id="job_title" name="job_title" type="text" required/>
									</div>
								</div>
								<div class="form-group ">
									<label class="control-label col-sm-3" for="job_description">
										Job Description
									</label>
									<div class="col-sm-9">
										<textarea class="form-control my-editor" cols="40" id="job_description" name="job_description" rows="5"></textarea>
									</div>
								</div>
								<div class="form-group ">
									<label class="control-label col-sm-3" for="job_requirement">
										Job Requirement
									</label>
									<div class="col-sm-9">
										<textarea class="form-control my-editor" cols="40" id="job_requirement" name="job_requirement" rows="5"></textarea>
									</div>
								</div>
								{{--@if(Language::getTitleLang() =='en')--}}
								<div class="form-group ">
									<label class="control-label col-sm-3" for="post_date">
										Post Date
									</label>
									<div class="col-sm-9">
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar">
												</i>
											</div>
											<input class="form-control" id="post_date" name="post_date" type="text"/>
										</div>
									</div>
								</div>
								<div class="form-group ">
									<label class="control-label col-sm-3" for="close_date">
										Close Date
									</label>
									<div class="col-sm-9">
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar">
												</i>
											</div>
											<input class="form-control" id="close_date" name="close_date" type="text"/>
										</div>
									</div>
								</div>
								{{--@endif--}}
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
										<button class="btn btn-primary" id="save">
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
	
@stop

@section('after_scripts')
	<script type="text/javascript">
		
		var url = '{{ url('admin/career') }}';

         //===============post_date datepicker //////////////
		$(document).ready(function(){
            var date_input = $('input[name="post_date"]');//our date in put has the name "post_date"
            var container = $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent():"body";
            date_input.datepicker({
                format: "yyyy-mm-dd",
                container: container,
                todayHighlight: true,
                autoclose: true
            });
        });
         //==================close_date datepicker==============
	
		$(document).ready(function(){
            var date_input = $('input[name="close_date"]');//our date in put has the name "post_date"
            var container = $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent():"body";
            date_input.datepicker({
                format: "yyyy-mm-dd",
                container: container,
                todayHighlight: true,
                autoclose: true
            });
        });
		
		//=============Click to add new job==========
		$('#add').click(function () {
		    console.log(4);
            $('#frmInput').removeClass('hide');
            $('.tblData').addClass('hide');
            $('#formData').trigger('reset');
            $('#save').text('Save');
            
			
        })
		
		//===========Click to close form ==========
		$('#cancel').click(function (e) {
            e.preventDefault();//not refresh
			$('#tblData').removeClass('hide');
			$('.form').addClass('hide');
        })
		
		//==========click to edit button=========
		$(document).on('click', '.open-modal', function () {
		    var id = $(this).val();
		    $('#save').val($(this).val());
		    $('#save').text('Update');
		    console.log(id);
			$('.tblData').addClass('hide');
			
			$.get(url+'/'+id, function (data) {
                $('#frmInput').removeClass('hide');
			    console.log(data);
				$('#job_title').val(data.job_title);
				var job_des = data.job_description;
				var job_req = data.job_requirement;
				if(job_des != null){
                    tinymce.editors['job_description'].setContent(data.job_description);
				}else{
                    tinymce.get('job_description').setContent('');
				}
				
				if(job_req!=null){
                    tinymce.editors['job_requirement'].setContent(data.job_requirement);
				}else{
                    tinymce.get('job_description').setContent('');
				}

                $('#post_date').val(data.post_date);
                $('#close_date').val(data.close_date);
				
            })
        });
		
		//===============click to save data ================
		$('#save').click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            e.preventDefault();
            var id = $(this).val();
            var state = $(this).text();
            var type = 'POST';
            var token = $('input[name=_token]').val();
            var formData = {
                job_title : $('#job_title').val(),
                job_description : tinyMCE.get('job_description').getContent(),
                job_requirement : tinyMCE.get('job_requirement').getContent(),
                post_date : $('#post_date').val(),
                close_date : $('#close_date').val(),
                status : $('#status').val()
			
            };
            var url = '{{ url('admin/career') }}';
            
            if(state == 'Update'){
                url = url + '/' + id ;
            }
            $.ajax({
	            url: url,
	            type: type,
	            data: formData ,
	            success: function (data) {
	             
		            if(state == 'Update'){
                        
                        var id_row = $('#id_row'+ id).text();
                        var careerRow ='<tr id="career'+data.id+'">';
                        careerRow+='<td class="text-center">'+data.job_title+'</td>';
                        careerRow+='<td class="text-center">'+data.post_date+'</td>';
                        careerRow+='<td class="text-center">'+data.close_date+'</td>';
                        careerRow+='<td class="text-center">'+data.status+'</td>';
                        careerRow+='<td class="text-center"> <button class="edit_data btn btn-info open-modal" id="edit-modal" value="'+data.id+'"> <span class="glyphicon glyphicon-edit"></span> </button> </td> </tr>'
                        
                        $('#career'+id).replaceWith(careerRow);

                        $('#tblData').removeClass('hide');
                        $('.form').addClass('hide');
                       
		            }else{
		                for(var i=0; i<data.length;i++){
                            var careerRow ='<tr id="career'+data[i].id+'">';
                            careerRow+='<td class="text-center">'+data[i].job_title+'</td>';
                            careerRow+='<td class="text-center">'+data[i].post_date+'</td>';
                            careerRow+='<td class="text-center">'+data[i].close_date+'</td>';
                            careerRow+='<td class="text-center">'+data[i].status+'</td>';
                            careerRow+='<td class="text-center"> <button class="edit_data btn btn-info open-modal" id="edit-modal" value="'+data[i].id+'"> <span class="glyphicon glyphicon-edit"></span> </button> </td> </tr>'
							console.log(data[i].id);
                            $('#career-table').prepend(careerRow);
                            $('#tblData').removeClass('hide');
                            $('.form').addClass('hide');
                            i=2;
		                }
			            
                    
			            
                    }
		            
                },
                error: function (data) {
                    console.log("Error:", data);
                }
            });
        })
	</script>
@stop


