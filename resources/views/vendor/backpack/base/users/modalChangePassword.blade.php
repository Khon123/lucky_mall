{{-- Modal --}}
<div class="modal fade" id="modalChangePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 7px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h2 class="modal-title" id="myModalLabel" style="color: blue;">Change Password</h2>
            </div>
            <div class="modal-body">
                <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                <div class="bootstrap-iso">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="box-body">
                                        <form id="frmChangePassword" name="frmChangePassword" class="form-horizontal" role="form" method="POST" action="">
                                            {!! csrf_field() !!}
                                            
                                            <div class="form-group{{ $errors->has('currentPassword') ? ' has-error' : '' }}">
                                                <label class="col-md-4 control-label">Current Password</label>

                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" name="currentPassword" id="currentPassword">

                                                    @if ($errors->has('currentPassword'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('currentPassword') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('newPassword') ? ' has-error' : '' }}">
                                                <label class="col-md-4 control-label">{{ trans('backpack::base.password') }}</label>

                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" name="newPassword" id="newPassword">

                                                    @if ($errors->has('newPassword'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('newPassword') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                <label class="col-md-4 control-label">{{ trans('backpack::base.confirm_password') }}</label>

                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">

                                                    @if ($errors->has('password_confirmation'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary pull-right">
                                                        <i class="fa fa-btn fa-key"></i> Change Password
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>