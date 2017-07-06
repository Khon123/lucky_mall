@extends('backpack::layout')

@section('after_styles')
    <style>
        .bootstrap-iso .formden_header h2,
        .bootstrap-iso .formden_header p,
        .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif;
            color: black}.bootstrap-iso form button,
                         .bootstrap-iso form button:hover{color: white !important;}
        .asteriskField{color: red;}
    </style>
@endsection

@section('header')
    <section class="content-header">
        <h1>Menu</h1>
        <ol class="breadcrumb">
            <li class="active">{{ config('app.name') }}</li>
            <li class="active">Menu</li>
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

                        {{-- ===========include modal========== --}}
                        @include('backpack::menus.modalMenu')

                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody id="menu-table" name="menu-table">
                        <?php $id= 1; ?>
                        @foreach($menus as $row)
                            <tr id="article{{$row->id}}">
                                <td class="text-center">{{ $id }}</td>
                                <td class="text-center" id="col_name{{ $row->id }}">{{$row->name}}</td>
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


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        var url ="{{ url(config('backpack.base.route_prefix', 'admin').'/menu')}}";

        //display modal form for product editing
        //// ==============Open modal with class==============
        $(document).on('click','.open-modal',function(){
            $('.save').text("Update");
            var id = $(this).val();
            $('#update').val(id);
            console.log(id);

            $("#frmMenu").attr('method', 'POST');
            $("#frmMenu").attr('action', url + '/' + id );

            $.get(url + '/' + id, function (data) {
                //success data
                console.log(data);
                $('#name').val(data.name);
                $('#myModal').modal('show');
            });
        });
        
        $('#update').click(function (e) {
            e.preventDefault();
            var id = $(this).val();
            var type = 'POST';
            var url1 = url+'/'+ id;
            var formData = {
                name: $('#name').val()
            };
            $.ajax({
                type: type,
                url: url1,
                data: formData,
                success: function (data) {
                    var col_name = '<td class="text-center" id="col_name'+ data.id +'">'+ data.name +'</td>';
                    $('#col_name'+id).replaceWith(col_name);
                    $('#myModal').modal('hide');
                },
                error: function (data) {
                    console.log("Error:", data);
                }
            });
        });

    </script>

@stop