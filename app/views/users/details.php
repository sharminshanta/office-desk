<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h3>USER DETAILS &raquo; <?php echo $details['user']->first_name . " " . $details['user']->last_name; ?></h3>
        </div>
    </div>
    <?php
        $userRole = $this->session->userdata('role');
        if ($userRole->slug == 'super-administrator') { ?>
            <p class="pull-right">
                <a class="btn btn-primary" href="/users/home"
                   title="Add a new user">
                    <i class="fa fa-plus"></i>
                    Add User
                </a>
                <a class="btn btn-warning" href="/users/lists"
                   title="Users List">
                    <i class="fa fa-list"></i>
                    Users List
                </a>
                <a class="btn btn-info" href="/roles/lists"
                   title="Check security settings">
                    <i class="fa fa-user-secret"></i>
                    Roles & Permissions
                </a>
            </p>
        <?php } ?>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
                <li class="<?php echo (($this->uri->segment(4)) == 'overview' ? 'active' : '')?>"><a
                        href="/users/details/<?php echo $details['user']->uuid; ?>/overview">Overview</a></li>
                <li id="nav_generalInformation2" class="<?php echo (($this->uri->segment(3)) == 'profile' ? 'active' : '')?>"><a
                        href="/users/profile/<?php echo $details['user']->uuid; ?>">Profile</a>
                </li>
                <li id="nav_generalInformation3" class="<?php echo (($this->uri->segment(2)) == 'notes' ? 'active' : '')?>"><a
                        href="/users/notes/<?php echo $details['user']->uuid; ?>">Notes</a>
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
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $details['user']->first_name . " " . $details['user']->last_name; ?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3 col-lg-3 " align="center">

                <?php
                if ($details['user']->picture != null) { ?>
                    <img src="<?php echo base_url() . $details['user']->picture; ?>" class="profile-pic"
                         onerror="this.onerror=null;this.src='<?php echo base_url() ?>assets/img/profile.jpg'"/>
                <?php } else { ?>
                    <img src="<?php echo base_url() ?>assets/img/profile.jpg" class="profile-pic"/>
                <?php } ?>
            </div>

            <div class=" col-md-9 col-lg-9 ">
                <table class="table table-user-information">
                    <tbody>
                    <tr>
                        <td>Role:</td>
                        <td><?php echo($role->name ?: ""); ?></td>
                    </tr>
                    <tr>
                        <td>Hire date:</td>
                        <td><?php echo($details['user']->created ?: "N/A") ?></td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td><?php echo($details['user']->date_of_birth ?: "N/A") ?></td>
                    </tr>

                    <tr>
                    <tr>
                        <td>Gender</td>
                        <td><?php echo($details['user']->gender ?: "N/A") ?></td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td><?php echo($details['user']->title ?: "N/A") ?></td>
                    </tr>
                    <?php
                    if($details['address'] != null) { ?>
                        <tr>
                            <td>Home Address</td>
                            <td>
                                <?php echo ($details['address']->street ? "Street: ".$details['address']->street : "N/A") . "<br>";?>
                                <?php echo($details['address']->city ? "City: ".$details['address']->city : "N/A");?>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td>Email</td>
                        <td>
                            <a href="info@support.com"><?php echo($details['user']->email_address ?: "N/A") ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?php echo($details['user']->status == 1 ? "<span class='label label-info'>Active</span>" : "<span class='label label-danger'>Not Active</span>"); ?></td>
                    </tr>
                    <tr>
                        <td>Visibility</td>
                        <td><?php echo($details['user']->is_visible == 1 ? "<span class='label label-success'>Visible</span>" : "<span class='label label-danger'>Disable</span>"); ?></td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td><?php if(isset($details['address']) && $details['address']->phone) { echo $details['address']->phone; } else {echo 'N/A' ;} ?></td>
                    </tr>

                    </tbody>
                </table>

                <a href="#" class="btn btn-primary">My Attendance</a>
                <a href="#" class="btn btn-primary">My Leave</a>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button"
           class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
        <?php
            if ($userRole->slug == 'super-administrator') { ?>
                <span class="pull-right">
                    <a href="/users/profile/<?php echo($details['user']->uuid); ?>" title="Edit this user" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                    <a title="Remove this user" href="/users/delete/<?php echo($details['user']->uuid); ?>" class="btn btn-sm btn-danger deleteUserBtn"><i class="glyphicon glyphicon-remove"></i></a>
                </span>
            <?php } ?>
    </div>
</div>
<br> <br>


