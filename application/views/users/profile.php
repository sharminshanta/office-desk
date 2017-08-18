<?php
$userRole = $this->session->userdata('role');
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h3>USER DETAILS
                &raquo; <?php echo $details['user']->first_name . " " . $details['user']->last_name; ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
                <li class="<?php echo(($this->uri->segment(4)) == 'overview' ? 'active' : '') ?>"><a
                            href="<?php echo base_url() ?>users/details/<?php echo $details['user']->uuid; ?>/overview">Overview</a>
                </li>
                <li id="nav_generalInformation2"
                    class="<?php echo(($this->uri->segment(2)) == 'profile' ? 'active' : '') ?>"><a
                            href="<?php echo base_url() ?>users/profile/<?php echo $details['user']->uuid; ?>">Profile</a>
                </li>
                <li id="nav_generalInformation3"
                    class="<?php echo(($this->uri->segment(4)) == 'notes' ? 'active' : '') ?>"><a
                            href="<?php echo base_url() ?>users/notes/<?php echo $details['user']->uuid; ?>">Notes</a>
                </li>
            </ul>
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
<!-- Profile Area -->
<?php
$errors = $this->session->userdata('errors');
$oldValues = $this->session->userdata('oldValues');
?>
<div class="widget">
    <div class="widget-header">
        <div class="pull-left">
            <h3 class="panel-title">General Information</h3>
        </div>
        <?php
        if ($userRole->slug == 'super-administrator') { ?>
            <div class="pull-right">
                <a class="btn btn-sm btn-danger" title="Delete this user?">Delete</a>
            </div>
        <?php } ?>
        <div class="clearfix"></div>
    </div>
    <div class="widget-body">
        <form class="form" method="post"
              action="<?php echo base_url() ?>users/updateProfile/<?php echo $details['user']->uuid; ?>"
              id="pupdate_puForm">
            <div class="row">
                <div class="col-lg-6">
                    <input type="hidden" name="profile[user_id]"
                           value="<?php echo(isset($details['user']->user_id) ? $details['user']->user_id : ''); ?>">
                    <input type="hidden" name="profile[user_uuid]"
                           value="<?php echo(isset($details['user']->uuid) ? $details['user']->uuid : ''); ?>">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input name="profile[first_name]" type="text"
                               value="<?php echo(isset($details['user']->first_name) ? $details['user']->first_name : ''); ?>"
                               class="form-control" placeholder="First name" required="required">
                        <?php echo(isset($oldValues['first_name']) ? $oldValues['first_name'] : '');
                        $this->session->unset_userdata('oldValues'); ?>
                        <?php
                        if (isset($errors['first_name'])) { ?>
                            <span class="error-text">
                                    <?php
                                    echo $errors['first_name'][0];
                                    $this->session->unset_userdata('errors');
                                    ?>
                                </span>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input name="profile[last_name]" type="text"
                               value="<?php echo(isset($details['user']->last_name) ? $details['user']->last_name : ''); ?>"
                               class="form-control" placeholder="Last name" required="required">
                        <?php echo(isset($oldValues['last_name']) ? $oldValues['last_name'] : '');
                        $this->session->unset_userdata('oldValues'); ?>
                        <?php
                        if (isset($errors['last_name'])) { ?>
                            <span class="error-text">
                                    <?php
                                    echo $errors['last_name'][0];
                                    $this->session->unset_userdata('errors');
                                    ?>
                                </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="firstName">Family Name</label>
                        <input name="profile[family_name]" type="text"
                               value="<?php echo(isset($details['user']->family_name) ? $details['user']->family_name : ''); ?>"
                               class="form-control" placeholder="Family name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="lastName">Nick Name</label>
                        <input name="profile[nick_name]" type="text"
                               value="<?php echo(isset($details['user']->nick_name) ? $details['user']->nick_name : ''); ?>"
                               class="form-control" placeholder="Nick name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <select name="profile[title]" class="form-control">
                            <option value="" hidden>Choose one</option>
                            <option value="Mr" <?php echo $details['user']->title == 'Mr' ? 'selected' : ''; ?>>Mr
                            </option>
                            <option value="Mrs" <?php echo $details['user']->title == 'Mrs' ? 'selected' : ''; ?>>Mrs
                            </option>
                            <option value="Miss" <?php echo $details['user']->title == 'Miss' ? 'selected' : ''; ?>>
                                Miss
                            </option>
                            <option value="Ms" <?php echo $details['user']->title == 'Ms' ? 'selected' : ''; ?>>Ms
                            </option>
                            <option value="Dr" <?php echo $details['user']->title == 'Dr' ? 'selected' : ''; ?>>Dr
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="timezone">Timezone</label>
                        <select name="profile[timezone]" id="time" class="form-control" required="required">
                            <option value="" hidden>Choose one</option>
                            <?php
                            foreach ($timezones as $timezone) { ?>
                                <option value="<?php echo $timezone; ?>" <?php echo ($timezone == $details['user']->timezone) ? 'selected' : '' ?>>
                                    <?php echo $timezone; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php
                        if (isset($errors['timezone'])) { ?>
                            <span class="error-text">
                                <?php
                                echo $errors['timezone'][0];
                                $this->session->unset_userdata('errors');
                                ?>
                                </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="profile[gender]" class="form-control" style="color: grey" required="required">
                            <option value="" hidden>Choose one</option>
                            <option value="male" <?php echo($details['user']->gender == 'male' ? 'selected' : '') ?>>
                                Male
                            </option>
                            <option value="female" <?php echo($details['user']->gender == 'female' ? 'selected' : '') ?>>
                                Female
                            </option>
                        </select>
                        <?php
                        if (isset($errors['gender'])) { ?>
                            <span class="error-text">
                                <?php
                                echo $errors['gender'][0];
                                $this->session->unset_userdata('errors');
                                ?>
                                </span>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="birthdate">Date of birth</label>
                        <input name="profile[date_of_birth]" type="date"
                               value="<?php echo($details['user']->date_of_birth ?: ''); ?>" class="form-control">
                        <?php
                        if (isset($errors['date_of_birth'])) { ?>
                            <span class="error-text">
                                <?php
                                echo $errors['date_of_birth'][0];
                                $this->session->unset_userdata('errors');
                                ?>
                                </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="language">Language</label>
                        <select name="profile[language]" class="form-control" style="color: grey">
                            <option value="" hidden>Choose one</option>
                            <option value="bn_BD" <?php echo($details['user']->language == 'bn_BD' ? 'selected' : ""); ?>>
                                Bangla
                            </option>
                            <option value="en_US" <?php echo($details['user']->language == 'en_US' ? 'selected' : ""); ?>>
                                English
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" id="pu_btnUpdate">Update</button>
        </form>
    </div>
</div>
<!-- Role and Accsess Settings -->
<?php
if ($userRole->slug == 'super-administrator') { ?>
    <div class="widget">
        <div class="widget-header">
            <div class="pull-left">
                <h2>Roles and Access Control</h2>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="form" method="post"
                          action="/user-manager/user/{{ user.uuid }}/update_roles_access_control"
                          id="pupdate_puForm">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="isVisible">Is Visible</label>
                                    <select name="users[is_visible]" class="form-control" style="color: grey">
                                        <option value="" hidden>Choose one</option>
                                        <option value="0" <?php echo($details['user']->is_visible == 0 ? 'selected' : ""); ?>>
                                            No
                                        </option>
                                        <option value="1" <?php echo($details['user']->is_visible == 1 ? 'selected' : ""); ?>>
                                            Yes
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="users[status]" class="form-control" style="color: grey">
                                        <option value="" hidden="hidden">Choose one</option>
                                        <option value="0" <?php echo($details['user']->status == 0 ? 'selected' : ""); ?>>
                                            No
                                        </option>
                                        <option value="1" <?php echo($details['user']->status == 1 ? 'selected' : ""); ?>>
                                            Yes
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="status">Roles</label>
                                    <select multiple="multiple" name="roles[role_id][]" class="form-control"
                                            style="color: grey">
                                        <option value="" hidden="hidden">Choose one</option>
                                        <?php
                                        foreach ($roles as $role) { ?>
                                            <option value="<?php echo $role->id; ?>"><?php echo $role->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" id="pu_btnUpdate">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Security Settings -->
    <div class="row">
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <div class="pull-left">
                        <h2>Security Settings</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="widget-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form" method="post" action="" id="pupdate_puForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">First Question</label>
                                            <select class="form-control"
                                                    name="user[security_questions_one]">
                                                <option value="" hidden="hidden">Please select one</option>
                                                <option value="What is your pet’s name?" <?php echo($details['user']->security_questions_one == "What is your pet’s name?" ? 'selected' : ""); ?>>
                                                    What is your pet’s name?
                                                </option>
                                                <option value="In what year was your father born?" <?php echo($details['user']->security_questions_one == "In what year was your father born?" ? 'selected' : ""); ?>>
                                                    In what year was your father born?
                                                </option>
                                                <option value="What is your favorite color?" <?php echo($details['user']->security_questions_one == "What is your favorite color?" ? 'selected' : ""); ?>>
                                                    What is your favorite color?
                                                </option>
                                                <option value="What is your favorite game?" <?php echo($details['user']->security_questions_one == "What is your favorite game?" ? 'selected' : ""); ?>>
                                                    What is your favorite game?
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group form-group">
                                            <label class="control-label">Answer</label>
                                            <input type="text" class="form-control" value=""
                                                   name="user[security_questions_one_answer]" placeholder="Answer One">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Second Question</label>
                                            <select class="form-control"
                                                    name="user[security_questions_two]">
                                                <option value="" hidden="hidden">Please select one</option>
                                                <option value="What is your pet’s name?" <?php echo($details['user']->security_questions_two == "What is your pet’s name?" ? 'selected' : ""); ?>>
                                                    What is your pet’s name?
                                                </option>
                                                <option value="In what year was your father born?" <?php echo($details['user']->security_questions_two == "In what year was your father born?" ? 'selected' : ""); ?>>
                                                    In what year was your father born?
                                                </option>
                                                <option value="What is your favorite color?" <?php echo($details['user']->security_questions_two == "What is your favorite color?" ? 'selected' : ""); ?>>
                                                    What is your favorite color?
                                                </option>
                                                <option value="What is your favorite game?" <?php echo($details['user']->security_questions_two == "What is your favorite game?" ? 'selected' : ""); ?>>
                                                    What is your favorite game?
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Answer</label>
                                            <input type="text" class="form-control"
                                                   value=""
                                                   name="user[security_questions_two_answer]" placeholder="Answer Two">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" value="********"
                                                   class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="passwordHash">Password Hash</label>
                                            <input type="text" value="********"
                                                   class="form-control" placeholder="Password Hash"
                                                   disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="passwordToken">Password Token</label>
                                            <input type="text"
                                                   value="********"
                                                   class="form-control" placeholder="Password Token"
                                                   disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="passwordLastModified">Password Last Modified</label>
                                            <input name="profile[general][password_last_modified]" type="date"
                                                   value=""
                                                   class="form-control" placeholder="Password Token"
                                                   disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="PasswordLastModifiedIP">Password Last Modified IP</label>
                                            <input name="profile[general][password_last_modified_ip]" type="text"
                                                   value=""
                                                   class="form-control"
                                                   placeholder="Password Last ModifiedIP"
                                                   disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                                <input name="csrf_token" type="hidden" value="{{ csrf_token }}">
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
<?php } ?>
<!-- Address Area -->
<?php
$errors = $this->session->userdata('errors');
?>
<div class="widget">
    <div class="widget-header">
        <div class="pull-left">
            <h3 class="panel-title">Primary Address</h3>
        </div>
        <br>
        <div class="clearfix"></div>
    </div>
    <div class="widget-body">
        <form class="form" method="post" action="<?php echo base_url() ?>users/address/<?php echo $details['user']->uuid; ?>" id="pu_puAddForm">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="street">Street Address *</label>
                        <input name="address[street]" type="text"
                               value="<?php if (isset($details['address']) && $details['address']->street) {
                                   echo $details['address']->street;
                               } ?>" class="form-control"
                               placeholder="Street" required="required">
                        <?php
                        if (isset($errors['street'])) { ?>
                            <span class="error-text">
                                    <?php
                                    echo $errors['street'][0];
                                    $this->session->unset_userdata('errors');
                                    ?>
                                </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="streetsecondary">Additional Street</label>
                        <input name="address[street_secondary]" type="text"
                               value="<?php if (isset($details['address']) && $details['address']->street_secondary) {
                                   echo $details['address']->street_secondary;
                               } ?>"
                               class="form-control" placeholder="Additional Street">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="city">City *</label>
                        <input  name="address[city]" type="text"
                               value="<?php if (isset($details['address']) && $details['address']->city) {
                                   echo $details['address']->city;
                               } ?>"
                               class="form-control" placeholder="City name" required="required">
                        <?php
                        if (isset($errors['city'])) { ?>
                            <span class="error-text">
                                    <?php
                                    echo $errors['city'][0];
                                    $this->session->unset_userdata('errors');
                                    ?>
                                </span>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="state">State</label>
                        <input name="address[state]" type="text"
                               value="<?php if (isset($details['address']) && $details['address']->state) {
                                   echo $details['address']->state;
                               } ?>" class="form-control" placeholder="State name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input name="address[postal_code]" type="text"
                               value="<?php if (isset($details['address']) && $details['address']->postal_code) {
                                   echo $details['address']->postal_code;
                               } ?>"
                               class="form-control" placeholder="Postal Code">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="country">Country *</label>
                        <select  name="address[country]" id="country" class="form-control" required="required">
                            <option value="" hidden>Choose one</option>
                            <?php
                            foreach ($countries as $country) { ?>
                                <option value="<?php echo $country; ?>" <?php if (isset($details['address']) && ($country == $details['address']->country)) {
                                    echo 'selected';
                                } ?>>
                                    <?php echo $country; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php
                        if (isset($errors['country'])) { ?>
                            <span class="error-text">
                                    <?php
                                    echo $errors['country'][0];
                                    $this->session->unset_userdata('errors');
                                    ?>
                                </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Phone *</label>
                        <input  name="address[phone]" type="text"
                               value="<?php if (isset($details['address']) && $details['address']->phone) {
                                   echo $details['address']->phone;
                               } ?>" class="form-control" placeholder="Phone" required="required">
                        <?php
                        if (isset($errors['phone'])) { ?>
                            <span class="error-text">
                                    <?php
                                    echo $errors['phone'][0];
                                    $this->session->unset_userdata('errors');
                                    ?>
                                </span>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fax">Fax</label>
                        <input name="address[fax]" type="text"
                               value="<?php if (isset($details['address']) && $details['address']->fax) {
                                   echo $details['address']->fax;
                               } ?>"
                               class="form-control" placeholder="Fax">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" id="pupdate_btnAUpdate">Update</button>
        </form>
    </div>
</div>