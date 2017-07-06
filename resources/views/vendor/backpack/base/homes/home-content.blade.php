@extends('backpack::layout')
@section('after_styles')

@endsection

@section('header')
	<section class="content-header">
		<h1>Home Content</h1>
		<ol class="breadcrumb">
			<li class="active">{{ config('app.name') }}</li>
			<li class="active">Home Content</li>
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
						
						<div class="form-group ">
							<label class="control-label requiredField" for="title">Title Caption
								<span class="asteriskField">*</span>
							</label>
							<input class="form-control" id="title" name="title" type="text"/>
						</div>
						<div class="form-group">
							<label class="control-label" for="caption">Caption</label>
							<textarea class="form-control my-editor" id="caption" name="caption"></textarea>
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
							<th class="text-center">Title Caption</th>
							<th class="text-center">Description</th>
							<th class="text-center">Action</th>
						</tr>
						</thead>
						<tbody id="about-table" name="about-table">
						<?php $i=1?>
						@foreach($homeContents as $row)
							<tr id="about{{$row->id}}">
								<td class="text-center">{{ $i }}</td>
								<td class="text-center" id="id_title{{ $row->id }}">{{ $row->title }}</td>
								<td class="text-center" id="id_caption{{ $row->id }}"><?php echo substr($row->caption,0,100).'...';?></td>
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
							<?php $i++?>
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

        var url = '{{ url('admin/home-content') }}';
        //==================click edit des==============
        $(document).on('click', '.open-modal', function () {
            var id = $(this).val();
            $('#update').val(id);
            console.log(id);

            $.get(url+'/'+id, function (data) {
                console.log(data);
                var caption = data.caption;
                
                $('#title').val(data.title);
                
                if(caption != null){
                    tinymce.editors['caption'].setContent(caption);
                }else{
                    tinymce.get('caption').setContent('');
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
            e.preventDefault();

            var type = "POST";
            var token = $('input[name=_token]').val();
			
            var formData = {
                title: $('#title').val(),
                caption: tinyMCE.get('caption').getContent()
            };
            
	        
            $.ajax({
                type: type,
                url: url+'/'+id,
                data : formData,
                success: function (data) {
                    console.log(data);

                    var col_title = '<td class="text-center" id="id_title'+data.id+'">'+data.title+'</td>';
                    var col_caption = '<td class="text-center" id="id_caption'+data.id+'">'+data.caption.substr(0,100)+'...</td>';

                    
                    $("#id_title" + id).replaceWith( col_title );
                    $("#id_caption" + id).replaceWith( col_caption );

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