{{-- modal --}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 7px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h2 class="modal-title" id="myModalLabel" style="color:#007bb6;">Update video</h2>
            </div>
            <div class="modal-body">
                <form method="POST"
                      id="frmVideo"
                      name="frmVideo"
                      enctype="multipart/form-data"
                      action=""
                      class="form-horizontal">
                {{ csrf_field() }}
                <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                    <div class="bootstrap-iso">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form method="post" >
                                        <div class="form-group">
                                            <label class="control-label requiredField" for="url">
                                                Url
                                                <span class="asteriskField">
													*
												</span>
                                            </label>
                                            <input class="form-control" id="url" name="url" type="text"/>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-primary save" id="btn-add" value="add">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>