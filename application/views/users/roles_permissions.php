<?php
$error = $this->session->userdata('error');
$oldValue = $this->session->userdata('oldValue');
?>
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h3>Roles And Permissions</h3>
            <p>Add a new role and permission of that our platform</p>
        </div>
    </div>
</div>
<div class="widget">
    <div class="widget-header">
        <div class="pull-left">
            <h3 class="panel-title">Roles And Permissions</h3>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="widget-body">
        <form action="<?php echo base_url()?>users/create" method="post" id="signup_signupForm">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputLastName" class="control-label">Role Name</label><br>
                        <input type="text" id="roleName" name="permission[role_id]" class="form-control" value="<?php echo $role->name; ?>">
                    </div>
                </div>
            </div>
            <?php
            foreach ($permissions as $permission) { ?>
                <p>
                    <label for="exampleInputLastName" class="control-label"><?php echo $permission->description; ?></label><br>
                    <input type="checkbox" id="subscribeNews" name="permission[id]" value="<?php echo $permission->id; ?>">
                    <?php echo $permission->name; ?>
                </p>
            <?php } ?>
            <button type="submit" class="btn btn-success" id="signup_btnCreate">Assign Permission</button>
            <br>
        </form>
    </div>
</div>