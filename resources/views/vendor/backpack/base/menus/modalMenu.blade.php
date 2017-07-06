{{-- modal --}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 7px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h2 class="modal-title" id="myModalLabel" style="color:#007bb6;">Update Menu</h2>
            </div>
            <div class="modal-body">
                <form method="POST"
                      id="frmMenu"
                      name="frmMenu"
                      enctype="multipart/form-data"
                      action="">
                {{ csrf_field() }}
                <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                    <div class="bootstrap-iso">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="control-label requiredField" for="name">
                                                Name
                                                <span class="asteriskField">
													*
												</span>
                                            </label>
                                            <input class="form-control" id="name" name="name" type="text"/>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button class="btn btn-primary save" id="update" value="">Submit</button>
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