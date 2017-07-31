<div class="container-fluid">
    <div class="content-area">
        <?php $error = $this->session->userdata('error'); ?>

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
                    <div class="form-group <?php echo (isset($error['first_name']) ? 'has-error' : ''); ?>">
                        <label for="exampleInputFirstName" class="control-label">First Name</label>
                        <input required="required" type="text" name="user[first_name]" class="form-control"
                               value="" id="exampleInputFirstName"
                               placeholder="First Name">
                        <?php
                            if(isset($error['first_name'])){ ?>
                                <span class="error-text">
                                    <?php
                                        echo $error['first_name'][0];
                                        $this->session->unset_userdata('error');
                                    ?>
                                </span>
                           <?php } ?>
                    </div>
                    <div class="form-group <?php echo (isset($error['last_name']) ? 'has-error' : ''); ?>">
                        <label for="exampleInputLastName" class="control-label">Last Name</label>
                        <input required="required" type="text" name="user[last_name]" class="form-control"
                                id="exampleInputLastName" placeholder="Last Name">
                        <?php
                        if(isset($error['last_name'])){ ?>
                            <span class="error-text">
                                    <?php
                                    echo $error['last_name'][0];
                                    $this->session->unset_userdata('error');
                                    ?>
                                </span>
                        <?php } ?>
                    </div>
                    <div class="form-group <?php echo (isset($error['email_address']) ? 'has-error' : ''); ?>">
                        <label for="exampleInputEmail1" class="control-label">Email</label>
                        <input required="required" type="text" name="user[email_address]" class="form-control"
                               placeholder="example@gmail.com">
                        <?php
                        if(isset($error['email_address'])){ ?>
                            <span class="error-text">
                                    <?php
                                    echo $error['email_address'][0];
                                    $this->session->unset_userdata('error');
                                    ?>
                                </span>
                        <?php } ?>
                    </div>
                    <div class="form-group <?php echo (isset($error['role_id']) ? 'has-error' : ''); ?>">
                        <label for="exampleInputRole" class="control-label">Role</label>
                        <select required="required" class="form-control" name="user[role_id]">
                            <option value="" hidden="hidden">Choose One</option>
                            <?php foreach($roles as $role) { ?>
                                <option value="<?php echo $role->id; ?>"><?php echo $role->name; ?></option>
                            <?php } ?>
                        </select>
                        <?php
                        if(isset($error['role_id'])){ ?>
                            <span class="error-text">
                                    <?php
                                    echo $error['role_id'][0];
                                    $this->session->unset_userdata('error');
                                    ?>
                                </span>
                        <?php } ?>
                    </div>
                    <div class="form-group <?php echo (isset($error['password']) ? 'has-error' : ''); ?>">
                        <label for="exampleInputPassword1" class="control-label">Password</label>
                        <input required="required" type="password" name="user[password]" class="form-control"
                               id="exampleInputPassword1" placeholder="Password">
                        <?php
                        if(isset($error['password'])){ ?>
                            <span class="error-text">
                                    <?php
                                    echo $error['password'][0];
                                    $this->session->unset_userdata('error');
                                    ?>
                                </span>
                        <?php } ?>
                    </div>
                    <div class="form-group <?php echo (isset($error['confirm_password']) ? 'has-error' : ''); ?>">
                        <label for="exampleInputPassword2" class="control-label">Confirm Password</label>
                        <input required="required" type="password" name="user[confirm_password]" class="form-control"
                               id="exampleInputPassword2" placeholder="Confirm Password">
                        <?php
                        if(isset($error['confirm_password'])){ ?>
                            <span class="error-text">
                                    <?php
                                    echo $error['confirm_password'][0];
                                    $this->session->unset_userdata('error');
                                    ?>
                                </span>
                        <?php } ?>
                    </div>
                    <input type="hidden" name="user[timezone]" value="UTC" id="timezoneField">
                    <button type="submit" class="btn btn-success" id="signup_btnCreate">Create User</button><br>
                </form>
            </div>
        </div>
    </div>
</div>