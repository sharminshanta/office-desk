<?php
$messageSuccess = $this->session->userdata('success');
if (isset($messageSuccess)) { ?>
    <div class="notice notice-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php
        echo $messageSuccess;
        $this->session->unset_userdata('success')
        ?>
    </div>
<?php } ?>

<?php
$messageError = $this->session->userdata('error');

if (isset($messageError)) { ?>
    <div class="notice notice-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php
        echo $messageError;
        $this->session->unset_userdata('error')
        ?>
    </div>
<?php } ?>
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h2>User List Of Company</h2>
            <p>Manage your company. Manage your credentials. All in one place to integrate platform
                with third party tools and libraries.</p>
            <p>
                <a class="btn btn-primary" href="<?php echo base_url()?>users/home"
                   title="Add a new user">
                    <i class="fa fa-plus"></i>
                    Add User
                </a>
                <a class="btn btn-info" href="<?php echo base_url()?>roles/lists"
                   title="Check security settings">
                    <i class="fa fa-user-secret"></i>
                    Roles & Permissions
                </a>
                <a href="" class="btn btn-success" data-toggle="modal" data-target="#searchUser" title="Search Job">Search User</a>
            </p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h3 class="panel-title">List of Users </h3>
                </div>
                <div class="pull-right">
                    <h3 class="panel-title">Total users # <?php echo sizeof($users); ?> </h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Visibility</th>
                                <th>Created</th>
                                <th>Last Seen</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            /**
                             * Get all users with their details
                             * Firstly fetch all user then call a userDetails method from UsersModel
                             * and put the $uuid parameter
                             */
                                foreach ($users as $user) { $userDetails = UsersModel::userDetails($user->uuid); ?>
                                <tr>
                                    <td><a href="<?php echo base_url()?>users/details/<?php echo $user->uuid; ?>/overview"><?php echo ($user->id ?: '-'); ?></a></td>
                                    <td><a href="<?php echo base_url()?>users/details/<?php echo $user->uuid; ?>/overview"><?php echo ($userDetails['user']->first_name ?: '-') . " " . ($userDetails['user']->last_name ?: '-'); ?></a></td>
                                    <td><a href="<?php echo base_url()?>users/details/<?php echo $user->uuid; ?>/overview"><?php echo ($user->email_address ?: '-'); ?></a></td>
                                    <td>
                                        <?php echo ($user->status == 1 ? '<span class="label label-info">Active</span>': '<span class="label label-danger">Inactive</span>'); ?>
                                    </td>
                                    <td><?php echo ($user->is_visible == 1 ? '<span class="label label-success">Visible</span>': '<span class="label label-warning">Disable</span>'); ?></td>
                                    <td><?php echo ((date("M d, Y", strtotime($user->created)) ?: '-')); ?></td>
                                    <td><?php echo ((date("M d, Y", strtotime($user->last_seen)) ?: '-'));?></td>
                                </tr>
                           <?php } ?>
                            </tbody>
                        </table>
                        <?php
                            $page = 1;

                            if($_SERVER['QUERY_STRING'] == 'page'){
                                $page = $_SERVER['QUERY_STRING'];
                            }

                            $total = sizeof($users);
                            $perPage = 10;
                            $totalPage = $total/$perPage;
                        ?>
                        <nav aria-label="Page navigation">
                            <ul class="pagination pull-right">
                                <?php if ($page != 1) { ?>
                                <li>
                                    <a href="lists?page=<?php ($page-1) ;?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php } ?>

                                <?php if ($page < ($total)/$perPage) { ?>
                                <li>
                                    <a href="lists?page=<?php ($page+1) ;?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Search Modal -->
<div class="modal fade" id="searchUser" tabindex="-1" role="dialog" aria-labelledby="searchUser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title text-uppercase" id="searchUser">Search User</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="get" action="/users/lists">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input name="title" type="text" class="form-control" placeholder="title" value="{{ query.title }}" {{ query.title != '' ? query.title}} >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="position">Email</label>
                                <input name="position" type="text" class="form-control" placeholder="Position" value="{{ query.position }}" {{ query.position != '' ? query.position }}>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="status" class="form-control" style="color: grey">
                                    <option value="">Select one</option>
                                    <option value="1" {{ query.status == 1 ? 'selected' : '' }}>Open</option>
                                    <option value="2" {{ query.status == 2 ? 'selected' : ''}}>Close</option>
                                    <option value="3" {{ query.status == 3 ? 'selected' : ''}}>Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="department">Status</label>
                                <select name="type" class="form-control" style="color: grey">
                                    <option value="">Select one</option>
                                    <option value="1" {{ query.type == 1 ? 'selected' : '' }}>Office</option>
                                    <option value="2" {{ query.type == 2 ? 'selected' : ''}}>Remote</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="createdAt">Visibility</label>
                                <select name="type" class="form-control" style="color: grey">
                                    <option value="">Select one</option>
                                    <option value="1" {{ query.type == 1 ? 'selected' : '' }}>Visible</option>
                                    <option value="2" {{ query.type == 2 ? 'selected' : ''}}>Disable</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="createdAt">Created Date</label>
                                <input name="created_at" type="date" id="createdID" class="form-control" value="{{ query.created_at }}" {{ query.created_at != '' ? 'selected' : '' }}>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>