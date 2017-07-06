@extends('backpack::layout')


@section('header')
    <section class="content-header">
        <h1>Slider</h1>
        <ol class="breadcrumb">
            <li class="active">{{ config('app.name') }}</li>
            <li class="active">Slider</li>
        </ol>
    </section>
@endsection
@section('content')
    @include('backpack::inc.message')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    {{--<form action="{{ url('admin/slider') }}"--}}
                          {{--class="dropzone hide closeDropzone"--}}
                          {{--id="myDropzonePage" style="margin-left: 16px;width: 816px;margin-bottom: 10px;">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<button type="button" id="closeDropzone" class="pull-right" style="margin-top: -22px;margin-right: -22px;"><span aria-hidden="true">×</span></button>--}}
                    {{--</form>--}}
                    <div class="box-title">

                        {{-- ===========include modal========== --}}
                        @include('backpack::sliders.modalSlider')
                        {{--<button class="btn btn-default" id="add">Add Image</button>--}}
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
                        <tbody id="slider-table" name="slider-table">
                        <?php $id= 1; ?>
                        @foreach($images as $row)
                            <tr id="slider{{$row->id}}">
                                <td class="text-center">{{ $id }}</td>
                                <td class="text-center"><img src="{{ asset('images').'/'. $row->image }}" style=" width: 50px; height: 50px;"></td>
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
                    {{$images-> links()}}

                </div>
            </div>
        </div>
    </div>
@stop

@section('after_scripts')
    <script>
        var url ="{{ url(config('backpack.base.route_prefix', 'admin').'/slider')}}";

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

//       =========== display  modal edit image=============
        $(document).on('click', '.open-modal', function () {
//            $('#add-new-image').show();
//            $('#myDropzone').hide();
//            $('#frmUpdateImage').show();
//            $('#myModal').modal('show');
            var id = $(this).val();
            console.log(id);
            $('#add-new-image').val($(this).val());
            $('#frmUpdateImage').trigger("reset");
            $('#myModal').modal('show');
            $('#add-new-image').show();
            $('#myDropzone').hide();
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
//    ================click to update image
        $('#update').click(function (e) {
            var id = $('#add-new-image').val();
            console.log(id);
            var urlUpdate = url+'/'+id;
            e.preventDefault();
            
            var type = "POST";
            var token = $('input[name=_token]').val();

            var imageUse = $('input[name=imageUse]').val();

            $.ajax({
                type: type,
                url: urlUpdate,
                data : {_token: token, imageUse: imageUse },
                success: function (data) {
                    console.log(data);

                    var image = '<tr id="slider'+data.id+'">';
                    image+='<td class="text-center">'+ data.id +'</td>';
                    image+='<td class="text-center"><img src="{{ asset('images').'/' }}'+data.image+'" style=" width: 50px; height: 50px;"></td>';
                    image+='<td class="text-center">Enabled</td>';
                    image+='<td class="text-center"> <button class="edit_data btn btn-info open-modal" id="edit-modal" value="'+ data.id +'"> <span class="glyphicon glyphicon-edit"></span> </button> </td></tr>';

                    $("#slider" + id).replaceWith( image );

                    $('#myModal').modal('hide');
                },
                error: function (data) {
                    console.log("Error:", data);
                }
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

        
    </script>
@stop