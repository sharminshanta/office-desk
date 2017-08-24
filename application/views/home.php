
<?php
$userRole = $this->session->userdata('role');
$userDetails = $this->session->userdata('details');
if ($userRole->slug == 'super-administrator') { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h2>Administrator Dashboard</h2>
                <p>Manage your company. Manage your credentials. All in one place to integrate platform
                    with third party tools and libraries.</p>
                <p>
                    <a class="btn btn-success" onclick="addUser()"><i class="fa fa-plus"></i> Add User</a>
                    <!--<a href="#" data-toggle="modal" data-target="#createUserModal" class="btn btn-primary" href="/profile/general/update"
                       title="Add user"><i class="fa fa-info"></i>
                        Add User
                    </a>-->
                    <a class="btn btn-primary" href="<?php echo base_url()?>users/home"
                       title="Add a new user">
                        <i class="fa fa-info"></i>
                        Add User
                    </a>
                    <a class="btn btn-warning" href="<?php echo base_url()?>users/lists"
                       title="Users List">
                        <i class="fa fa-user-secret"></i>
                        Users List
                    </a>
                    <a class="btn btn-info" href="/profile/security"
                       title="Check security settings">
                        <i class="fa fa-shield"></i>
                        Review Security Settings
                    </a>
                    <a class="btn btn-info" href="<?php echo base_url()?>roles/lists"
                       title="Check security settings">
                        <i class="fa fa-shield"></i>
                        Roles & Permissions
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

    <!-- Users Overview -->
    <?php
        if((sizeof($users) > 0) or sizeof($attendance) > 0) { ?>
            <div class="row">
                <div class="col-md-12">
                    <h3>Users Overview</h3>
                    <div class="tabbable-panel">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs ">
                                <?php if(sizeof($users) > 0) { ?>
                                    <li class="active">
                                        <a href="#usersList" data-toggle="tab">Users List</a>
                                    </li>
                                <?php } ?>
                                <?php if(sizeof($attendance) > 0) { ?>
                                    <li <?php if(sizeof($users) < 1) { ?> class="active" <?php } ?>>
                                        <a href="#usersAttendanceList" data-toggle="tab">Attendance List</a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <div class="tab-content">
                                <?php if(sizeof($users) > 0) { ?>
                                    <div class="tab-pane active" id="usersList">
                                        <h3>This is Users List</h3>
                                        <!--<table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Api Key</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {% for apikey in api_keys %}
                                            <tr>
                                                <td>
                                                    <a href="/developers/api_keys/{{ apikey.uuid }}">{{ apikey.name }}</a>
                                                </td>
                                                <td>{{ apikey.api_keys }}</td>
                                                <td>{{ apikey.is_active == 1 ? "Enabled" : "Disabled" }}</td>
                                                <td>{{ apikey.created | date("Y-m-d h:i A", currentUser.timezone ?: "UTC") }}</td>
                                            </tr>
                                            {% endfor %}
                                            </tbody>
                                        </table>-->
                                    </div>
                                <?php } ?>
                                <?php if(sizeof($attendance) > 0) { ?>
                                    <div class="tab-pane <?php if(sizeof($users) < 1) {?> active <?php } ?>"
                                         id="usersAttendanceList">
                                        <h3>This is Attendance List</h3>
                                        <!--<table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Name of Client</th>
                                                <th>Client ID</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {% for client in oauth_clients %}
                                            <tr>
                                                <td>
                                                    <a href="/developers/oauth_clients/{{ client.uuid }}">{{ client.client_name }}</a>
                                                </td>
                                                <td>{{ client.client_id }}</td>
                                                <td>{{ client.is_active == 1 ? "Enabled" : "Disabled" }}</td>
                                                <td>{{ client.created | date("Y-m-d h:i A", currentUser.timezone ?: "UTC") }}</td>
                                            </tr>
                                            {% endfor %}
                                            </tbody>
                                        </table>-->
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php } ?>
    <!-- Modal -->
    <?php require 'blocks/modal.php'; ?>
<?php } else { ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Welcome,
                        <?php echo $userDetails['user']->first_name . " " . $userDetails['user']->last_name; ?>
                    </h3>
                </div>
                <div class="panel-body text-center" id="leftPanel">
                    <a class="btn btn-primary" href="<?php echo base_url()?>users/profile/<?php echo $userDetails['user']->uuid; ?>"
                       title="Update your profile"><i class="fa fa-info"></i>
                        Update Profile
                    </a>
                    <a class="btn btn-danger" href="/profile/security"
                       title="Change account password">
                        <i class="fa fa-user-secret"></i>
                        Change Password
                    </a>
                    <a class="btn btn-info" href="<?php echo base_url()?>settings/security/<?php echo $userDetails['user']->uuid;''?>"
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
