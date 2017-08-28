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
<?php
    $errors = $this->session->userdata('errors');
    $insert_error = $this->session->userdata('insert_error');
        if (isset($errors) || $errors['name']) { ?>
            <?php
                foreach ($errors as $error) { ?>
                  <li class="text-danger"><?php echo $error[0]?><li>
           <?php } ?>
         <?php $this->session->unset_userdata('errors'); ?>
    <?php } ?>
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
                        <a class="btn btn-success changeRole" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i>Add Role</a>
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
                                <th class="text-right">Action</th>
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
                                    <td class="text-right">
                                        <a href="<?php echo base_url()?>roles_Permissions/assign/<?php echo $role->uuid; ?>" class="btn btn-sm btn-success fa fa-pencil" title="Assign Permissions">Assign Permissions</a>
                                        <a href="" class="btn btn-danger fa fa-trash" title="Delete this role ?"> Delete</a>
                                        <a href="" class="btn btn-primary fa fa-edit" title="Update this role ?"> Update</a>
                                    </td>
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


<!-- Role Modal -->
<div class="modal fade" id="changeRole" tabindex="-1" role="dialog" aria-labelledby="searchUser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header panel-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="searchUser">Add New Role</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() ?>roles/addRole" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="form-type">Name</label>
                                <input id="roleName" name="role[name]" type="text" placeholder="Name" class="form-control" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="form-type">Description</label>
                                <textarea class="form-control" name="role[description]" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>