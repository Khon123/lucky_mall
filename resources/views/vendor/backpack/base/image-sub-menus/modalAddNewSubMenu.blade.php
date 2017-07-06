{{-- modal --}}
<div class="modal fade" id="modalAddNewSubMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 7px;width: 375px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h2 class="modal-title" id="myModalLabel" style="color:#007bb6;">New Sub Menu</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
            
                        <form class="form-horizontal" id="formData">
                            <div class="form-group ">
                                <label class="control-label col-sm-3" for="menus_id">
                                    Menu
                                </label>
                                <div class="col-sm-9">
                                    <select class="select form-control" id="menu_id1" name="menu_id1">
                                        <option></option>
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-md-3 requiredField" for="name">
                                    SubMenu
                                </label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="name1" name="name1" type="text"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-3">
                                    <button class="btn btn-primary" id="saveNewSubMenu" value="1">
                                        Save
                                    </button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                    
                                </div>
                            </div>
            
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>