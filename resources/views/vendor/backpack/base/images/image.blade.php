@extends('backpack::layout')

@section('after_styles')
    <style>
        label.myLabel input[type="file"] {
            position: fixed;
            top: -1000px;
        }

        /***** Example custom styling *****/
        .myLabel {
            border: 2px solid #AAA;
            border-radius: 4px;
            padding: 2px 5px;
            margin: 2px;
            background: #DDD;
            display: inline-block;
        }
        .myLabel:hover {
            background: #CCC;
        }
        .myLabel:active {
            background: #CCF;
        }
        .myLabel :invalid + span {
            color: #A44;
        }
        .myLabel :valid + span {
            color: #4A4;
        }
    </style>
@endsection

@section('header')
    <section class="content-header">
        <h1>Image</h1>
        <ol class="breadcrumb">
            <li class="active">{{ config('app.name') }}</li>
            <li class="active">Image</li>
        </ol>
    </section>
@endsection

@section('content')
    @include('backpack::inc.message')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    {{--<form action="{{ url('admin/imageUpload') }}"--}}
                          {{--class="dropzone hide closeDropzone"--}}
                          {{--id="myDropzonePage" style="margin-left: 16px;width: 816px;margin-bottom: 10px;">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<button type="button" id="closeDropzone" class="pull-right" style="margin-top: -22px;margin-right: -22px;"><span aria-hidden="true">×</span></button>--}}
                    {{--</form>--}}
                    <div class="box-title">

                        {{-- ===========include modal========== --}}
                        @include('backpack::images.modalImage')
                        {{--<button class="btn btn-default" id="add">Add New Image</button>--}}
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody id="image-table" name="image-table">
                        <?php $id= 1; ?>
                        @foreach($images as $row)
                            <tr id="image{{$row->id}}">
                                <td class="text-center">{{ $id }}</td>
                                <td class="text-center"><img src="{{ asset('images').'/'. $row->url }}" style=" width: 50px; height: 50px;"></td>
                                <td class="text-center">{{$row->status}}</td>
                                <td class="text-center">
                                    <button class="edit_data btn btn-info open-modal" id="edit-modal" value="{{$row->id}}">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                </td>
                            </tr>
                            <?php $id++; ?>
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

        var url ="{{ url(config('backpack.base.route_prefix', 'admin').'/image')}}";

        // ===========myDropzone in modal=============
        Dropzone.options.myDropzone = {

            url: "{{ url('admin/image') }}",
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
        {{--//====================dropzone in page===================--}}
        {{--Dropzone.options.myDropzonePage = {--}}

            {{--url: "{{ url('admin/imageUpload') }}",--}}
            {{--paramName: "file", // The name that will be used to transfer the file--}}
            {{--maxFilesize: 2, // MB--}}
            {{--accept: function(file, done) {--}}
                {{--if (file.name == "justinbieber.jpg") {--}}
                    {{--done("Naha, you don't.");--}}
                {{--}--}}
                {{--else { done(); }--}}
            {{--},--}}
{{--//            ===========uload success=========--}}
            {{--success: function(file,response){--}}
                {{--if(response.status == 'error')--}}
                {{--{--}}
                    {{--alert( response.reason );--}}
                {{--}--}}
                {{--else{--}}
                    {{--$.get('{{ url('admin/imageUpload') }}', function (data) {--}}
                        {{--var image = '<tr id="image'+data.id+'">';--}}
                        {{--image+='<td class="text-center">'+0+'</td>';--}}
                        {{--image+='<td class="text-center"><img src="{{ asset('images').'/' }}'+data.url+'" style=" width: 50px; height: 50px;"></td>';--}}
                        {{--image+='<td class="text-center">Enabled</td>';--}}
                        {{--image+='<td class="text-center"> <button class="edit_data btn btn-info open-modal" id="edit-modal" value="'+ data.id +'"> <span class="glyphicon glyphicon-edit"></span> </button> </td></tr>';--}}
                        {{--$('#image-table').prepend(image);--}}
                        {{--$('.closeDropzone').addClass('hide');--}}
                    {{--});--}}

                {{--}--}}
            {{--}--}}
        {{--};--}}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        // ====================open update==============
        $(document).on('click', '.open-modal', function () {

            var id = $(this).val();
            console.log(id);
            $('#add-new-image').val($(this).val());
            $('#frmUpdateImage').trigger("reset");
            $('#myModal').modal('show');
            $('#add-new-image').show();
            $('#myDropzone').hide();

        });

        // ============click add new image============
        $('#add-new-image').click(function () {
            $('#myDropzone').show();
            $('#add-new-image').hide();
        });

        // ============click image==============
        $(document).on('click','.image', function () {

            var id = $(this).val();
            console.log(id);
            $.get(url + '/imageMaster/' + id, function (data) {
                //success data
                console.log(data);
                $('#imageUse').val(data.name);

            });
        });
        

        // ==================click to hide dropzone in modal==============

        $('#hideDropzone').click(function () {
            $('#myDropzone').hide();
            $('#add-new-image').show();
        });
        
//        //===============add new image============
//        $('#add').click(function () {
//            console.log(3);
//            $('#myDropzonePage').removeClass('hide');
//            $('#add').hide();
//
//        });
//
//        //===============click to hide dropzone in page=============
//        $('#closeDropzone').click(function () {
//            $('.closeDropzone').addClass('hide');
//            $('#add').show();
//        });

        //==============update Image===============
        
        $('#update').click(function (e) {
            var id = $('#add-new-image').val();
            console.log(id);
            var urlUpdate = url+'/'+id;
            e.preventDefault();

//            var formData = {
//               name: $('#imageUse').val ()
//            };
//            console.log(formData);
            var type = "POST";
            var token = $('input[name=_token]').val();

            var imageUse = $('input[name=imageUse]').val();

            $.ajax({
                type: type,
                url: urlUpdate,
                data : {_token: token, imageUse: imageUse },
                success: function (data) {
                    console.log(data);

                    var image = '<tr id="image'+id+'">';
                        image+='<td class="text-center">'+ id +'</td>';
                        image+='<td class="text-center"><img src="{{ asset('images').'/' }}'+data.url+'" style=" width: 50px; height: 50px;"></td>';
                        image+='<td class="text-center">Enabled</td>';
                        image+='<td class="text-center"> <button class="edit_data btn btn-info open-modal" id="edit-modal" value="'+ data.id +'"> <span class="glyphicon glyphicon-edit"></span> </button> </td></tr>';

                    $("#image" + id).replaceWith( image );

                    $('#myModal').modal('hide');
                },
                error: function (data) {
                    console.log("Error:", data);
                }
            });

        });

    </script>

@stop