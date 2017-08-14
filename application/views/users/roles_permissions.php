<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h3>Roles And Permissions</h3>
            <p>Add a new role and permission of that our platform</p>
        </div>
    </div>
</div>
<?php
$message = $this->session->userdata('success');

if (isset($message)) { ?>
    <div class="notice notice-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php
        echo $message;
        $this->session->unset_userdata('success')
        ?>
    </div>
<?php } ?>
<div class="widget">
    <div class="widget-header">
        <div class="pull-left">
            <h3 class="panel-title">Permission for <?php echo $role->name; ?></h3>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="widget-body">
        <?php
            if (!isset($roles_permissions) or $roles_permissions != null) { ?>
                <div class="well">
                    <?php
                    foreach ($roles_permissions as $assignPermissions) { ?>
                        <p><?php echo (Roles_Permissions_model::getAssignPermissionsName($assignPermissions->permission_id)->name); ?></p>
                    <?php } ?>
                </div>
           <?php } ?>
        <form action="<?php echo base_url()?>roles_Permissions/assignPermission/<?php echo $role->uuid; ?>" method="post" id="signup_signupForm">
            <input type="hidden" class="form-control" name="permission[role_id]" value="<?php echo $role->id; ?>">
            <?php
            foreach ($permissions as $permission) { ?>
                <p>
                    <label for="exampleInputLastName" class="control-label"><?php echo $permission->description; ?></label><br>
                    <input type="checkbox" multiple="multiple" id="rolePermission" name="permission[permission_id][]" value="<?php echo $permission->id; ?>">
                    <?php echo $permission->name; ?>
                </p>
            <?php } ?>
            <button type="submit" class="btn btn-success" id="signup_btnCreate">Assign Permission</button>
            <br>
        </form>
    </div>
</div>