<!-- Security question -->
<?php
$error = $this->session->userdata('errors');
$oldValue = $this->session->userdata('oldValue');
?>
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
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h2>Security Questions</h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form" method="post"
                              action="<?php echo base_url() ?>settings/changeSecurityQuestion/<?php echo $userDetails['user']->uuid; ?>"
                              id="pupdate_puForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group <?php echo(isset($error['security_questions_one']) ? 'has-error' : ''); ?>">
                                        <label class="control-label">First Question</label>
                                        <select class="form-control"
                                                name="user[security_questions_one]">
                                            <option value="" hidden="hidden">Please select one</option>
                                            <option value="What is your pet’s name?" <?php echo $userDetails['user']->security_questions_one == 'What is your pet’s name?' ? 'selected' : '' ?>>
                                                What is your pet’s name?
                                            </option>
                                            <option value="In what year was your father born?" <?php echo $userDetails['user']->security_questions_one == 'In what year was your father born?' ? 'selected' : '' ?>>
                                                In what year was your father born?
                                            </option>
                                            <option value="What is your favorite color?" <?php echo $userDetails['user']->security_questions_one == 'What is your favorite color?' ? 'selected' : '' ?>>
                                                What is your favorite color?
                                            </option>
                                            <option value="What is your favorite game?" <?php echo $userDetails['user']->security_questions_one == 'What is your favorite game?' ? 'selected' : '' ?>>
                                                What is your favorite game?
                                            </option>
                                        </select>
                                        <?php
                                        if (isset($error['security_questions_one'])) { ?>
                                            <span class="error-text">
                                                <?php
                                                echo $error['security_questions_one'][0];
                                                $this->session->unset_userdata('errors');
                                                ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group <?php echo(isset($error['security_questions_one_answer']) ? 'has-error' : ''); ?>">
                                        <label class="control-label">Answer</label>
                                        <input type="text" class="form-control"
                                               name="user[security_questions_one_answer]"
                                               value="<?php echo $userDetails['user']->security_questions_one_answer ?: '' ?>"
                                               placeholder="Answer One">
                                        <?php
                                        if (isset($error['security_questions_one_answer'])) { ?>
                                            <span class="error-text">
                                                    <?php
                                                    echo $error['security_questions_one_answer'][0];
                                                    $this->session->unset_userdata('errors');
                                                    ?>
                                                </span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6 <?php echo(isset($error['security_questions_two']) ? 'has-error' : ''); ?>">
                                    <div class="form-group">
                                        <label class="control-label">Second Question</label>
                                        <select class="form-control"
                                                name="user[security_questions_two]">
                                            <option value="" hidden="hidden">Please select one</option>
                                            <option value="What is your pet’s name?" <?php echo $userDetails['user']->security_questions_two == 'What is your pet’s name?' ? 'selected' : '' ?>>
                                                What is your pet’s name?
                                            </option>
                                            <option value="In what year was your father born?" <?php echo $userDetails['user']->security_questions_two == 'In what year was your father born?' ? 'selected' : '' ?>>
                                                In what year was your father born?
                                            </option>
                                            <option value="What is your favorite color?" <?php echo $userDetails['user']->security_questions_two == 'What is your favorite color?' ? 'selected' : '' ?>>
                                                What is your favorite color?
                                            </option>
                                            <option value="What is your favorite game?" <?php echo $userDetails['user']->security_questions_two == 'What is your favorite game?' ? 'selected' : '' ?>>
                                                What is your favorite game?
                                            </option>
                                        </select>
                                        <?php
                                        if (isset($error['security_questions_two'])) { ?>
                                            <span class="error-text">
                                                    <?php
                                                    echo $error['security_questions_two'][0];
                                                    $this->session->unset_userdata('errors');
                                                    ?>
                                                </span>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group <?php echo(isset($error['security_questions_two_answer']) ? 'has-error' : ''); ?>">
                                        <label class="control-label">Answer</label>
                                        <input type="text" class="form-control"
                                               name="user[security_questions_two_answer]"
                                               value="<?php echo $userDetails['user']->security_questions_two_answer ?: '' ?>"
                                               placeholder="Answer Two">
                                        <?php
                                        if (isset($error['security_questions_two_answer'])) { ?>
                                            <span class="error-text">
                                                    <?php
                                                    echo $error['security_questions_two_answer'][0];
                                                    $this->session->unset_userdata('errors');
                                                    ?>
                                                </span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <br>
                                    <p><i class="fa fa-info-circle"></i> <i>Note: Be careful to choose questions and
                                            must set always different question your harden security</i></p>
                                    <br>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success"
                                    id="pu_btnUpdate">Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <! -- Change password -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h2>Security Questions</h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body" id="leftwidget">
                <form method="post"
                      action="<?php echo base_url() ?>settings/changePassword/<?php echo $userDetails['user']->uuid; ?>"
                      id="scpassword_scpForm">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label class=" control-label">Current Password *</label>
                                <input required="required" type="password" class="form-control"
                                       name="user[current_password]" placeholder="Current Password">
                                <?php
                                if (isset($error['current_password'])) { ?>
                                    <span class="error-text">
                                        <?php
                                        echo $error['current_password'][0];
                                        $this->session->unset_userdata('errors');
                                        ?>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label class=" control-label">New Password *</label>
                                <input required="required" type="password" class="form-control"
                                       name="user[new_password]"
                                       placeholder="New Password">
                                <?php
                                if (isset($error['new_password'])) { ?>
                                    <span class="error-text">
                                    <?php
                                    echo $error['new_password'][0];
                                    $this->session->unset_userdata('errors');
                                    ?>
                                </span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label class="control-label">Confirm Password *</label>
                                <input required="required" type="password" class="form-control"
                                       name="user[confirm_password]" placeholder="Confirm Password">
                                <?php
                                if (isset($error['confirm_password'])) { ?>
                                    <span class="error-text">
                                        <?php
                                        echo $error['confirm_password'][0];
                                        $this->session->unset_userdata('errors');
                                        ?>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><i class="fa fa-info-circle"></i> <i>Note: Be careful to choose password. Strong
                                    passwords always harden
                                    your security</i></p>
                            <br>
                        </div>
                    </div>
                    <input name="csrf_token" type="hidden" value="{{ csrf_token }}">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button class="btn btn-success" id="scpassword_btnCPass">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <! profile picture -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h2 class="panel-title">Update Profile Picture</h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body" id="rightwidget">
                <div class="col-lg-offset-4">
                    <a href="">
                        <?php

                        if($userDetails['user']->picture == null) { ?>
                            <img src="<?php echo $userDetails['user']->picture; ?>"
                             class="avatar img-thumbnail profile-pic"
                             onerror="this.onerror=null;this.src='<?php echo base_url() ?>assets/img/profile.jpg'" alt="Profile Photo">
                        <?php } else { ?>
                            <img src="<?php echo base_url() ?>assets/img/profile.jpg" class="avatar img-thumbnail profile-pic"  alt="Profile Photo">
                        <?php } ?>
                    </a>
                    <h6>Upload a different photo...</h6>
                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#changeProfilePhoto">Change Photo</button>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <br>
                            <i class="fa fa-info-circle"></i> <i>Note: Be careful to choose picture. Please choose jpg, png or jpeg
                                for your profile picture
                            </i>
                        </p>
                        <br>
                    </div>
                </div>
                <div class="modal fade" id="changeProfilePhoto" tabindex="-1" role="dialog" aria-labelledby="changeProfilePhotoLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title text-uppercase" id="changeProfilePhotoLabel">Change Profile Photo</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" accept-charset="utf-8" controller="users" enctype="multipart/form-data" class="ng-pristine ng-valid" id="pcppicture_pcppForm">
                                    <div style="display:none;">
                                        <input type="hidden" name="_method" value="POST">
                                    </div>
                                    <input name="photo" type="file"  class="form-control well-sm" required="required">
                                    <br>
                                    <button type="submit" class="btn btn-success" id="pcppicture_btnChange">Change Photo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>