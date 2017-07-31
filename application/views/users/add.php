<div class="container-fluid">
    <div class="content-area">
        <?php
        $error = $this->session->userdata('error');

        if (isset($error)) { ?>
            <div class="notice notice-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php
                echo $error;
                $this->session->unset_userdata('error');
                ?>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3>Add a new user</h3>
                    <p>Add a new user with general information, addresses, timezone, language to personalized your experience with
                        our platform</p>
                </div>
            </div>
        </div>
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h3 class="panel-title">General Information</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <form action="users/create" method="post" id="signup_signupForm">
                    <div class="form-group">
                        <label for="exampleInputFirstName" class="control-label">First Name</label>
                        <input required="required" type="text" name="user[first_name]" class="form-control"
                               value="" id="exampleInputFirstName"
                               placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputLastName" class="control-label">Last Name</label>
                        <input required="required"  type="text" name="user[last_name]" class="form-control"
                                id="exampleInputLastName" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="control-label">Email</label>
                        <input required="required" type="email" name="user[email_address]" class="form-control"
                               placeholder="example@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRole" class="control-label">Role</label>
                        <select required="required" class="form-control" name="user[role_id]">
                            <option value="" hidden="hidden">Choose One</option>
                            <?php foreach($roles as $role) { ?>
                                <option value="<?php echo $role->id; ?>"><?php echo $role->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="control-label">Password</label>
                        <input required="required" type="password" name="user[password]" class="form-control"
                               id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2" class="control-label">Confirm Password</label>
                        <input required="required" type="password" name="user[confirm_password]" class="form-control"
                               id="exampleInputPassword2" placeholder="Confirm Password">
                    </div>
                    <input type="hidden" name="user[timezone]" value="UTC" id="timezoneField">
                    <button type="submit" class="btn btn-success" id="signup_btnCreate">Create User</button><br>
                </form>
            </div>
        </div>
    </div>
</div>