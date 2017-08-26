<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h3 class="panel-title">Add New Role</h3>
                </div>
                <div class="pull-right">
                    <h3 class="panel-title">Total Roles # <?php echo sizeof($roles); ?> </h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                        <a class="btn btn-success" onclick="addRole()"><i class="glyphicon glyphicon-plus"></i>Add Role</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Role Lists -->
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h3 class="panel-title">List of Roles </h3>
                </div>
                <div class="pull-right">
                    <h3 class="panel-title">Total Roles # <?php echo sizeof($roles); ?> </h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created</th>
                                <th>Modified</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            /**
                             * Get all users with their details
                             * Firstly fetch all user then call a userDetails method from UsersModel
                             * and put the $uuid parameter
                             */
                            foreach ($roles as $role) { ?>
                                <tr>
                                    <td><a href="<?php echo base_url()?>roles_Permissions/assign/<?php echo $role->uuid; ?>" title="Assign permissions"><?php echo ($role->id ?: '-'); ?></a></td>
                                    <td><a href="<?php echo base_url()?>roles_Permissions/assign/<?php echo $role->uuid; ?>" title="Assign permissions"><?php echo ($role->name ?: '-') ?></a></td>
                                    <td><?php echo (date("M d, Y", strtotime($role->created)) ?: '-'); ?></td>
                                    <td><?php echo (date("M d, Y", strtotime($role->modified)) ?: '-')?></td>
                                    <td><a href="<?php echo base_url()?>roles_Permissions/assign/<?php echo $role->uuid; ?>" class="btn btn-sm btn-success">Assign Permissions</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="roleAddModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Role</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="roleAddForm" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-9">
                                <input name="estu_id" class="form-control" type="hidden">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-9">
                                <input name="role_name" placeholder="Role name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-9">
                                <textarea name="estu_apellido" rows="3" placeholder="Description" class="form-control" type="text"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>