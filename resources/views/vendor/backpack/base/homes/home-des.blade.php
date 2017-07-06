@extends('backpack::layout')
@section('after_styles')

@endsection

@section('header')
	<section class="content-header">
		<h1>Home Description</h1>
		<ol class="breadcrumb">
			<li class="active">{{ config('app.name') }}</li>
			<li class="active">Home Description</li>
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
							<th class="text-center">Description</th>
							<th class="text-center">Action</th>
						</tr>
						</thead>
						<tbody id="about-table" name="about-table">
						@foreach($homeDes as $row)
							<tr id="about{{$row->id}}">
								<td class="text-center">1</td>
								<td class="text-center" id="id_des{{ $row->id }}"><?php echo html_entity_decode($row->description);?></td>
								<td class="text-center">
									<button class="edit_data btn btn-info open-modal" id="edit-des" value="{{$row->id}}">
										<span class="glyphicon glyphicon-edit"></span>
									</button>
									{{--@if(Language::getTitleLang() == 'en')--}}
										{{--<button class="edit_data btn btn-info open-modal" id="edit-img" value="{{$row->id}}">--}}
											{{--<span class="glyphicon glyphicon-edit">IMG</span>--}}
										{{--</button>--}}
									{{--@endif--}}
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop

@section('after_scripts')
	<script type="text/javascript">
		
        var url = '{{ url('admin/home-descriptions') }}';
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
                    console.log(des)
                    var col_des='<td class="text-center" id="id_des'+data.id+'">'+des+'</td>';

                    $("#id_des" + id).replaceWith( col_des );

                    $('.form').addClass('hide');
                    $('#table').removeClass('hide');
                },
                error: function (data) {
                    console.log("Error:", data);
                }
            });

        });
	</script>
@stop