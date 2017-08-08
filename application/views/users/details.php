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
            <li id="nav_generalInformation2" class="<?php echo (($this->uri->segment(3)) == 'profile' ? 'active' : '')?>"><a
                href="<?php echo base_url()?>users/profile/<?php echo $details['user']->uuid; ?>">Profile</a>
            </li>
            <li id="nav_generalInformation3" class="<?php echo (($this->uri->segment(4)) == 'notes' ? 'active' : '')?>"><a
                href="<?php echo base_url()?>users/details/<?php echo $details['user']->uuid; ?>/notes">Notes</a>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h2>Basic Information</h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-borderless">
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
                                <td><?php echo($details['user']->date_of_birth ?: "N/A") ;?></td>
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
                            <?php if($details['address'] != null) { ?>
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
                                    <a href="info@support.com"><?php echo($details['user']->email_address ?: "N/A") ;?></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?php echo($details['user']->status == 1 ? "<span class='label label-info'>Active</span>" : "<span class='label label-danger'>Not Active</span>");?></td>
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
                            <tfoot>
                            <tr>
                                <td colspan="2">
                                    <div class="meta" style="color: gray">Last updated at
                                        <?php echo($details['user']->modified ?: "N/A") ;?>
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h2>Other Information</h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td>Status</td>
                                <td>
                                    {{ user.status == 1 ? 'Active' : '<span style="color: #d9534f">Not Active</span>' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Client Group</td>
                                <td>Developer Circle</td>
                            </tr>
                            <tr>
                                <td>Account Manager</td>
                                <td>
                                    {% if accountManager.username == null %}
                                    N/A
                                    {% else %}
                                    <a href="#">{{ accountManager.profile.first_name }} {{ accountManager.profile.last_name }}</a>
                                    {% endif %}
                                </td>
                            </tr>

                            <tr>
                                <td>Last Login</td>
                                <td>
                                    {% if user.last_loggedin == null %}
                                    N/A
                                    {% else %}
                                    {{ user.last_loggedin | date("Y-m-d h:i A", loggedInUser.profile.timezone ?: "UTC") }}
                                    from {{ user.last_seen_ip }}
                                    {% endif %}
                                </td>
                            </tr>

                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2">
                                    <a href="#" class="btn btn-primary btn-sm btnMargin">Create Invoice</a>
                                    <a href="#" class="btn btn-danger btn-sm btnMargin">Generate Due Invoices</a>
                                    <a href="#" class="btn btn-info btn-sm btnMargin">Create Add Funds Invoice</a>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h2>Billing Summery</h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td>Paid</td>
                                <td>$1.00 &raquo; <a href="#">1 invoice</a></td>
                            </tr>
                            <tr>
                                <td>Draft</td>
                                <td>$1.00 &raquo; <a href="#">1 invoice</a></td>
                            </tr>
                            <tr>
                                <td>Unpaid/Due</td>
                                <td>$1.00 &raquo; <a href="#">1 invoice</a></td>
                            </tr>

                            <tr>
                                <td>Cancelled</td>
                                <td>$1.00 &raquo; <a href="#">1 invoice</a></td>
                            </tr>

                            <tr>
                                <td>Refunded</td>
                                <td>$1.00 &raquo; <a href="#">1 invoice</a></td>
                            </tr>

                            <tr>
                                <td>Collections</td>
                                <td>$1.00 &raquo; <a href="#">1 invoice</a></td>
                            </tr>

                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2">
                                    <a href="#" class="btn btn-primary btn-sm btnMargin">Create Invoice</a>
                                    <a href="#" class="btn btn-danger btn-sm btnMargin">Generate Due Invoices</a>
                                    <a href="#" class="btn btn-info btn-sm btnMargin">Create Add Funds Invoice</a>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
/*$message = $this->session->userdata('success');

if (isset($message)) { */?><!--
    <div class="notice notice-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php
/*        echo $message;
        $this->session->unset_userdata('success')
        */?>
    </div>
<?php /*} */?>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><?php /*echo $details['user']->first_name . " " . $details['user']->last_name; */?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3 col-lg-3 " align="center">
                <?php
/*                if ($details['user']->picture != null) { */?>
                    <img src="<?php /*echo $details['user']->picture; */?>" class="profile-pic"
                         onerror="this.onerror=null;this.src='<?php /*echo base_url() */?>assets/img/profile.jpg'"/>
                <?php /*} else { */?>
                    <img src="<?php /*echo base_url() */?>assets/img/profile.jpg" class="profile-pic"/>
                <?php /*} */?>
            </div>

            <div class=" col-md-9 col-lg-9 ">
                <table class="table table-user-information">
                    <tbody>
                    <tr>
                        <td>Role:</td>
                        <td><?php /*echo($role->name ?: ""); */?></td>
                    </tr>
                    <tr>
                        <td>Hire date:</td>
                        <td><?php /*echo($details['user']->created ?: "N/A") */?></td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td><?php /*echo($details['user']->date_of_birth ?: "N/A") */?></td>
                    </tr>

                    <tr>
                    <tr>
                        <td>Gender</td>
                        <td><?php /*echo($details['user']->gender ?: "N/A") */?></td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td><?php /*echo($details['user']->title ?: "N/A") */?></td>
                    </tr>
                    <?php
/*                        if($details['address'] != null) { */?>
                            <tr>
                                <td>Home Address</td>
                                <td>
                                    <?php /*echo ($details['address']->street ? "Street: ".$details['address']->street : "N/A") . "<br>";*/?>
                                    <?php /*echo($details['address']->city ? "City: ".$details['address']->city : "N/A");*/?>
                                </td>
                            </tr>
                       <?php /*} */?>
                    <tr>
                        <td>Email</td>
                        <td>
                            <a href="info@support.com"><?php /*echo($details['user']->email_address ?: "N/A") */?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?php /*echo($details['user']->status == 1 ? "<span class='label label-info'>Active</span>" : "<span class='label label-danger'>Not Active</span>"); */?></td>
                    </tr>
                    <tr>
                        <td>Visibility</td>
                        <td><?php /*echo($details['user']->is_visible == 1 ? "<span class='label label-success'>Visible</span>" : "<span class='label label-danger'>Disable</span>"); */?></td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td><?php /*if(isset($details['address']) && $details['address']->phone) { echo $details['address']->phone; } else {echo 'N/A' ;} */?></td>
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
        <span class="pull-right">
            <a href="<?php /*echo base_url()*/?>users/update/<?php /*echo($details['user']->uuid); */?>" title="Edit this user" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
            <a title="Remove this user" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
        </span>
    </div>

</div>-->

