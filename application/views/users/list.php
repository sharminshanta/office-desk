<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h3 class="panel-title">List of Users </h3>
                </div>
                <div class="pull-right">
                    <h3 class="panel-title">Total users # 2 </h3>
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
                                    <td><a href="details/<?php echo $user->uuid; ?>"><?php echo ($user->id ?: '-'); ?></a></td>
                                    <td><a href="details/<?php echo $user->uuid; ?>"><?php echo ($userDetails['user']->first_name ?: '-') . " " . ($userDetails['user']->last_name ?: '-'); ?></a></td>
                                    <td><a href="details/<?php echo $user->uuid; ?>"><?php echo ($user->email_address ?: '-'); ?></a></td>
                                    <td>
                                        <?php echo ($user->status == 1 ? '<span class="label label-info">Active</span>': "-"); ?>
                                    </td>
                                    <td><?php echo ($user->is_visible == 1 ? '<span class="label label-success">Visible</span>': "-"); ?></td>
                                    <td><?php echo ($user->created ?: '-'); ?></td>
                                    <td><?php echo ($user->last_seen ?: '-')?></td>
                                </tr>
                           <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>