{{-- modal --}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="overflow-y: initial">
        <div class="modal-content" style="border-radius: 7px; width: 900px;
margin-left: -143px; height: 620px;
">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h2 class="modal-title" id="myModalLabel" style="color:#007bb6; text-align: center">Choose Image</h2>
                <button id="add-new-image" value="" class="btn btn-default" style="margin-left: 29px;margin-bottom: -12px;">add new</button>
            </div>
            <div class="modal-body" style="height: 521px;overflow-y: auto;">
                <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                <div class="bootstrap-iso">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
    
                                <form action="{{ url('admin/masterImage') }}"
                                      class="dropzone"
                                      id="myDropzone" style="margin-left: 16px;width: 816px;margin-bottom: 10px;">
                                    {{ csrf_field() }}
                                    <button type="button" id="hideDropzone" class="pull-right" style="margin-top: -22px;margin-right: -22px;"><span aria-hidden="true">×</span></button>
                                </form>

                                <form id="frmUpdateImage" action="">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                                            <form method="post">
                                                <div class="form-group ">
                                                    <div class="input-group">
                                                        <div class="input-group">
                                                            <input type="text" id="imageUse" name="imageUse"  style="border-radius: 5px;width: 500px;" class="form-control">
                                                            <span class="input-group-btn">
                                                                    <button class="btn btn-info" id="btnUse"><span> USE </span></button>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </form>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12" id="image-list">
                                        @foreach($masterImages as $image)
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <button class="image" value="{{ $image->id }}" style="background: none; border: none"> <img src="{{ url('images').'/'. $image->name }}" style=" border-radius: 5px; width: 200px; height: 200px; border: solid 1px #31CCFF;margin-bottom: 7px;"> </button>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>