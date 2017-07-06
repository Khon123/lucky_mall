@extends('backpack::layout')

@section('after_styles')
	<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
@stop

@section('header')
<section class="content-header">
	<h1>User</h1>
	<ol class="breadcrumb">
		<li class="active">{{ config('app.name') }}</li>
		<li class="active">User</li>
	</ol>
</section>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<div class="box-title">
						{{-- ===========include modal========== --}}
						@include('backpack::users.modalUser')
						
					</div>
				</div>

				<div class="box-body">

				@include('backpack::inc.message')
				
					<table class="table table-bordered">
						<thead>
							<tr>	
								<th class="text-center">Name</th>
								<th class="text-center">Email</th>
								<th class="text-center">Phone</th>
								<th class="text-center">Address</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody >
							@foreach($users as $row)
							<tr id="event{{$row->id}}" class="event{{ $row->id_table }}">
								
								<td class="text-center">{{$row->name}}</td>
								<td class="text-center">
									<span class="glyphicon glyphicon-envelope" data-toggle="tooltip" title="{{$row->email}}"></span>
								</td>
								<td class="text-center">{{$row->phone}}</td>
								<td class="text-center">{{$row->address}}</td>
								<td class="text-center">
									<button class="edit_data btn btn-info open-modal" id="edit-modal" value="{{$row->id}}">
										<span class="glyphicon glyphicon-edit">edit</span>
									</button>
									@include('backpack::users.modalChangePassword')
									<button class=" btn btn-info changePassword-modal" id="changePassword"><i class="fa fa-key" aria-hidden="true"></i>
										<span>Change Password</span>
									</button>
								</td>
							</tr>

							@endforeach
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div>
<meta name="_token" content="{!! csrf_token() !!}" />
@stop

@section('after_scripts')

<script type="text/javascript">
	
	$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });

    var url ="{{ url(config('backpack.base.route_prefix', 'admin').'/user') }}";

    var urlChangePassword = "{{ url(config('backpack.base.route_prefix', 'admin').'/change-password') }}";
    
    //display modal form for product editing
    //// ==============Open modal with class==============
    $(document).on('click','.open-modal',function(){
		$('.save').text("Update");
		var id = $(this).val();
		console.log(id);

		$("#frmUser").attr('method', 'POST');
		$("#frmUser").attr('action', url + '/' + id );

		$.get(url + '/' + id, function (data) {
		    //success data
			console.log(data);

			$('#name').val(data.name);
			$('#email').val(data.email);
			$('#phone').val(data.phone);
			$('#address').val(data.address);

			$('#myModal').modal('show');
		});
    });
    // display modal change password
    
    $(document).on('click','.changePassword-modal',function(){
    	$('#modalChangePassword').modal('show');
    	$('#frmChangePassword').attr('action', urlChangePassword);
    });

    // form validation 
    $(document).ready(function() {
    	$('#frmUser').formValidation({
    		framework: 'bootstrap',
    		excluded: 'disabled',
    		fields: {
    			name: {
    				validators: {
    					notEmpty: {
    						message: 'The name is required'
    					}
    				}
    			},
    			email: {
    				validators: {
    					notEmpty: {
    						message: 'The email is required'
    					},
    					emailAddress: {
    						message: 'The input is not a valid email address'
    					}
    				}
    			}
    		}
    	});
    });
    // form validation form change password
    $(document).ready(function() {
    	$('#frmChangePassword').formValidation({
    		framework: 'bootstrap',
    		excluded: 'disabled',
    		fields: {
    			currentPassword: {
    				validators: {
    					notEmpty: {
    						message: 'The current password is required'
    					}
    				}
    			},
    			newPassword: {
    				validators: {
    					notEmpty: {
    						message: 'The new  password is required'
    					}
    				}
    			},
    			password_confirmation: {
    				validators: {
    					notEmpty: {
    						message: 'The comfirm password is required'
    					}
    				}
    			}
    		}

    	});
    });

</script>
@stop