<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h3>USER DETAILS &raquo; <?php echo $details['user']->first_name . " " . $details['user']->last_name; ?></h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs" role="tablist">
            <li class="<?php echo (($this->uri->segment(4)) == 'overview' ? 'active' : '')?>"><a
                    href="<?php echo base_url()?>users/details/<?php echo $details['user']->uuid; ?>/overview">Overview</a></li>
            <li id="nav_generalInformation2" class="<?php echo (($this->uri->segment(2)) == 'profile' ? 'active' : '')?>"><a
                    href="<?php echo base_url()?>users/profile/<?php echo $details['user']->uuid; ?>">Profile</a>
            </li>
            <li id="nav_generalInformation3" class="<?php echo (($this->uri->segment(4)) == 'notes' ? 'active' : '')?>"><a
                    href="<?php echo base_url()?>users/details/<?php echo $details['user']->uuid; ?>/notes">Notes</a>
            </li>
        </ul>
    </div>
</div>
<!--<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h2>Update Profile</h2>
            <p>Update our general information, addresses, timezone, language to personalized your experience with
                our platform</p>
        </div>
    </div>
</div>-->
<!-- Profile Area -->
<div class="widget">
    <div class="widget-header">
        <div class="pull-left">
            <h3 class="panel-title">General Information</h3>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="widget-body">
        <form class="form" method="post" action="<?php echo base_url()?>users/profile" id="pupdate_puForm">
            <div class="row">
                <div class="col-lg-6">
                    <input type="hidden" name="profile[user_id]" value="<?php echo (isset($details['user']->user_id) ? $details['user']->user_id : ''); ?>">
                    <input type="hidden" name="profile[user_uuid]" value="<?php echo (isset($details['user']->uuid) ? $details['user']->uuid : ''); ?>">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input name="profile[first_name]" type="text"
                               value="<?php echo (isset($details['user']->first_name) ? $details['user']->first_name : ''); ?>" class="form-control" placeholder="First name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input name="profile[last_name]" type="text"
                               value="<?php echo (isset($details['user']->last_name) ? $details['user']->last_name : ''); ?>" class="form-control" placeholder="Last name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="firstName">Family Name</label>
                        <input name="profile[family_name]" type="text"
                               value="<?php echo (isset($details['user']->family_name) ? $details['user']->family_name : ''); ?>" class="form-control" placeholder="Family name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="lastName">Nick Name</label>
                        <input name="profile[nick_name]" type="text"
                               value="<?php echo (isset($details['user']->nick_name) ? $details['user']->nick_name : ''); ?>" class="form-control" placeholder="Nick name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <select name="profile[title]" class="form-control">
                            <option value="" hidden>Choose one</option>
                            <option value="Mr" <?php echo $details['user']->title == 'Mr' ? 'selected' : ''; ?>>Mr</option>
                            <option value="Mrs" <?php echo $details['user']->title == 'Mrs' ? 'selected' : ''; ?>>Mrs</option>
                            <option value="Miss" <?php echo $details['user']->title == 'Miss' ? 'selected' : ''; ?>>Miss</option>
                            <option value="Ms" <?php echo $details['user']->title == 'Ms' ? 'selected' : ''; ?>>Ms</option>
                            <option value="Dr" <?php echo $details['user']->title == 'Dr' ? 'selected' : ''; ?>>Dr</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="timezone">Timezone</label>
                        <select name="profile[timezone]" id="time" class="form-control">
                            <option value="" hidden>Choose one</option>
                            <?php
                                foreach ($timezones as $timezone) { ?>
                                    <option value="<?php echo $timezone; ?>" <?php echo ($timezone == $details['user']->timezone) ? 'selected' : ''?>>
                                        <?php echo $timezone; ?>
                                    </option>
                                <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="profile[gender]" class="form-control" style="color: grey">
                            <option value="" hidden>Choose one</option>
                            <option value="male" <?php echo ($details['user']->gender == 'male' ? 'selected' : '')?>>Male</option>
                            <option value="female" <?php echo ($details['user']->gender == 'female' ? 'selected' : '')?>>Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="birthdate">Date of birth</label>
                        <input name="profile[date_of_birth]" type="date" value="<?php echo isset($details['user']->date_of_birth) ?: ''?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="language">Language</label>
                        <select name="profile[language]" class="form-control" style="color: grey">
                            <option value="" hidden>Choose one</option>
                            <option value="bn_BD" <?php echo ($details['user']->language == 'bn_BD' ? 'selected' : "");?>>Bangla</option>
                            <option value="en_US" <?php echo ($details['user']->language == 'en_US' ? 'selected' : "");?>>English</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" id="pu_btnUpdate">Update</button>
        </form>
    </div>
</div>
<!-- Address Area -->
<div class="widget">
    <div class="widget-header">
        <div class="pull-left">
            <h3 class="panel-title">Primary Address</h3>
        </div>
        <br>
        <div class="clearfix"></div>
    </div>
    <div class="widget-body">
        <form class="form" method="post" action="<?php echo base_url()?>users/address" id="pu_puAddForm">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="street">Street Address *</label>
                        <input name="address[street]" type="text" value="<?php if(isset($details['address']) && $details['address']->street) { echo $details['address']->street; } ?>" class="form-control"
                               placeholder="Street" required="required">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="streetsecondary">Additional Street</label>
                        <input name="address[street_secondary]" type="text" value="<?php if(isset($details['address']) && $details['address']->street_secondary) { echo $details['address']->street_secondary; } ?>"
                               class="form-control" placeholder="Additional Street">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="city">City *</label>
                        <input required="required" name="address[city]" type="text" value="<?php if(isset($details['address']) && $details['address']->city) { echo $details['address']->city; } ?>"
                               class="form-control" placeholder="City name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="state">State</label>
                        <input name="address[state]" type="text" value="<?php if(isset($details['address']) && $details['address']->state) { echo $details['address']->state; } ?>" class="form-control" placeholder="State name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input name="address[postal_code]" type="text" value="<?php if(isset($details['address']) && $details['address']->postal_code) { echo $details['address']->postal_code; } ?>"
                               class="form-control" placeholder="Postal Code">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="country">Country *</label>
                        <select required="required" name="address[country]" id="country" class="form-control">
                            <option value="" hidden>Choose one</option>
                            <?php
                            foreach ($countries as $country) { ?>
                                <option value="<?php echo $country;?>" <?php if(isset($details['address']) && ($country == $details['address']->country)) { echo 'selected'; } ?>>
                                    <?php echo $country; ?>
                                </option>
                            <?php } ?>
                        </select>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Phone *</label>
                        <input required="required" name="address[phone]" type="text" value="<?php if(isset($details['address']) && $details['address']->phone) { echo $details['address']->phone; } ?>" class="form-control" placeholder="Phone">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fax">Fax</label>
                        <input name="address[fax]" type="text" value="<?php if(isset($details['address']) && $details['address']->fax) { echo $details['address']->fax; } ?>"
                               class="form-control" placeholder="Fax">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" id="pupdate_btnAUpdate">Update</button>
        </form>
    </div>
</div>