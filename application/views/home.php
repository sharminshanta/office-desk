<div class="container-fluid">
    <div class="content-area">
        <?php
        $userRole = $this->session->userdata('role');
        $userDetails = $this->session->userdata('details');
        if($userRole->slug == 'super-administrator') { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h2>Administrator Dashboard</h2>
                        <p>Manage your company. Manage your credentials. All in one place to integrate platform
                            with third party tools and libraries.</p>
                        <p>
                            <a href="#" data-toggle="modal" data-target="#createUserModal" class="btn btn-primary" href="/profile/general/update"
                               title="Add user"><i class="fa fa-info"></i>
                                Add User
                            </a>
                            <a class="btn btn-warning" href="/profile/security"
                               title="Users List">
                                <i class="fa fa-user-secret"></i>
                                Users List
                            </a>
                            <a class="btn btn-info" href="/profile/security"
                               title="Check security settings">
                                <i class="fa fa-shield"></i>
                                Review Security Settings
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3>Users Attendance History (Monthly)</h3>
                    <canvas id="apiUsageChartMonthly"></canvas>
                </div>
                <div class="col-md-6">
                    <h3>Users Attendance History (Daily)</h3>
                    <canvas id="apiUsageChartDaily"></canvas>
                </div>
            </div>
            <!-- Modal -->
            <?php require 'blocks/modal.php'; ?>
       <?php } else{ ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Welcome,
                                <?php echo $userDetails['user']->first_name . " " . $userDetails['user']->last_name; ?>
                            </h3>
                        </div>
                        <div class="panel-body text-center" id="leftPanel">
                            <a class="btn btn-primary" href="/profile/general/update"
                               title="Update your profile"><i class="fa fa-info"></i>
                                Update Profile
                            </a>
                            <a class="btn btn-danger" href="/profile/security"
                               title="Change account password">
                                <i class="fa fa-user-secret"></i>
                                Change Password
                            </a>
                            <a class="btn btn-info" href="/profile/security"
                               title="Check security settings">
                                <i class="fa fa-shield"></i>
                                Review Security Settings
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Important Information</h3>
                        </div>
                        <div class="panel-body" id="rightPanel">
                            <div class="notice notice-danger">
                                <a target="_blank" href="https://besofty.com/">
                                    Learn more
                                </a>
                                To assign role permission
                            </div>
                            <div class="notice notice-info">
                                <a target="_blank" href="https://besofty.com/">
                                    Learn more
                                </a>
                                To assign role permission
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>