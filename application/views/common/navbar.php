<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                <a href="/"><img src="assets/img/besofty.png" class="logo" alt="Logo"/></a>
            </a>
        </li>
        <?php
            $userDetails = $this->session->userdata('details');
            $userRole = $this->session->userdata('role');
        ?>
        <li>
            <a href="dashboard"><i class="col-md-4"></i> Hi, <?php echo $userRole->name; ?></a>
        </li>
        <li>
            <a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>

        <?php
            if($userRole->slug == 'super-administrator'){ ?>
            <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#settings" class="collapsed"
               aria-expanded="false">
                <i class="fa fa-fw fa-cog"></i> Settings
                <i class="fa fa-fw fa-caret-down"></i>
            </a>
            <ul id="settings" class="submenu collapse" aria-expanded="false" style="height: 0px;">
                <li>
                    <a href="<?php echo base_url(); ?>roles">Roles</a>
                </li>
                <li>
                    <a href="/profile/profile_picture">Departments</a>
                </li>
                <li>
                    <a href="/profile/profile_picture">Office Time</a>
                </li>
            </ul>
        </li>
        <?php } ?>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#manage_profile" class="collapsed"
               aria-expanded="false">
                <i class="fa fa-fw fa-users"></i> Manage Profile
                <i class="fa fa-fw fa-caret-down"></i>
            </a>
            <ul id="manage_profile" class="submenu collapse" aria-expanded="false" style="height: 0px;">
                <li>
                    <a href="/profile/update">Update Profile</a>
                </li>
                <li>
                    <a href="/profile/profile_picture">Change Profile Picture</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#security_settings" class="collapsed"
               aria-expanded="false">
                <i class="fa fa-fw fa-lock"></i> Security Settings
                <i class="fa fa-fw fa-caret-down"></i>
            </a>
            <ul id="security_settings" class="submenu collapse" aria-expanded="false" style="height: 0px;">
                <li>
                    <a href="/settings/security_question">Security Questions</a>
                </li>
                <li>
                    <a href="/settings/change_password">Change Password</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#preferences" class="collapsed"
               aria-expanded="false">
                <i class="fa fa-fw fa-inbox"></i> Your Preferences
                <i class="fa fa-fw fa-caret-down"></i>
            </a>
            <ul id="preferences" class="submenu collapse" aria-expanded="false" style="height: 0px;">
                <li>
                    <a href="/preference/email-notifications">Email Notifications</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- /#sidebar-wrapper -->

<div id="page-content-wrapper">
    <button href="#menu-toggle" class="wrapper_toggle_btn" id="menu-toggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <div class="clearfix"></div>
    <!-- Header -->
    <div class="header">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-6 visible-lg visible-md">
                <!--<div class="search_bar">
                    <div class="input-group search_bar_input">
                        <span class="input-group-addon">
                            <button type="submit">
                                <span class="fa fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </div>-->
            </div>
            <div class="col-lg-6">
                <div class="pull-right">
                    <div class="profile-overview">
                        <div class="dropdown customm-dropdown">
                            <img src="" class="profile-pic" onerror="this.onerror=null;this.src='assets/img/profile.jpg'"/>
                            <!--<img src="assets/img/profile_pic.jpg" class="profile-pic"/>-->
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenu1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <?php
                                    echo $userDetails['user']->first_name . " " .$userDetails['user']->last_name;
                                ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li>
                                    <a href="/profile"><i class="fa fa-user"></i>
                                        <?php
                                            echo $userDetails['user']->first_name . " " .$userDetails['user']->last_name;
                                        ?>
                                    </a>
                                </li>
                                <li><a href="/settings"><i class="fa fa-wrench"></i> Setting</a></li>
                                <li><a href="logout/"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>