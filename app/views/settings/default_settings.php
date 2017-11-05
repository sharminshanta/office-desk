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
        <div class="jumbotron">
            <h2>Office Management</h2>
            <p>Manage your company. Manage your credentials. All in one place to integrate platform
                with third party tools and libraries.</p>
            <?php
            $authUser = $this->session->userdata('details');
            $authRole = Roles_model::getName($authUser['user']->role_id);
            if ($authRole->slug == 'super-administrator') { ?>
                <p>
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
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="widget">
                <div class="widget-header">
                    <div class="pull-left">
                        <h2>Office Start Time</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="widget-body">
                    <form class="form" method="post" action="/settings/setOffice">
                        <div class="form-group">
                            <label>Start From</label>
                            <input name="office_starting_time" value="<?php echo $metaData ;?>" type="time" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="widget">
                <div class="widget-header leave">
                    <div class="pull-left">
                        <h2>Pagination Settings</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="widget-body">
                    <form class="form" method="post" action="/settings">
                        <div class="form-group">
                            <label>user list</label>
                            <input name="user_list_perPage" value="{{ userListperPage }}" type="number" min="10" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>attendance list</label>
                            <input name="attendance_list_perPage" value="{{ attendanceListperPage }}" type="number" min="10" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>leave list</label>
                            <input  name="leave_list_perPage" value="{{ leaveListperPage }}" type="number" min="10" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-leave-days">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>