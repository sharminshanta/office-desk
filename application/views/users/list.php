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