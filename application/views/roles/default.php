<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h3 class="panel-title">List of Roles </h3>
                </div>
                <div class="pull-right">
                    <h3 class="panel-title">Total Roles # <?php echo sizeof($roles); ?> </h3>
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
                                <th>Created</th>
                                <th>Modified</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            /**
                             * Get all users with their details
                             * Firstly fetch all user then call a userDetails method from UsersModel
                             * and put the $uuid parameter
                             */
                            foreach ($roles as $role) { ?>
                                <tr>
                                    <td><a href="<?php echo base_url()?>roles_Permissions/assign/<?php echo $role->uuid; ?>" title="Assign permissions"><?php echo ($role->id ?: '-'); ?></a></td>
                                    <td><a href="<?php echo base_url()?>roles_Permissions/assign/<?php echo $role->uuid; ?>" title="Assign permissions"><?php echo ($role->name ?: '-') ?></a></td>
                                    <td><?php echo ($role->created ?: '-'); ?></td>
                                    <td><?php echo ($role->modified ?: '-')?></td>
                                    <td><a class="btn btn-sm btn-success">Assign Permissions</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <?php
/*                        $page = 1;

                        if($_SERVER['QUERY_STRING'] == 'page'){
                            $page = $_SERVER['QUERY_STRING'];
                        }

                        $total = sizeof($roles);
                        $perPage = 10;
                        $totalPage = $total/$perPage;
                        */?>
                        <!--<nav aria-label="Page navigation">
                            <ul class="pagination pull-right">
                                <?php /*if ($page != 1) { */?>
                                    <li>
                                        <a href="lists?page=<?php /*($page-1) ;*/?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php /*} */?>

                                <?php /*if ($page < ($total)/$perPage) { */?>
                                    <li>
                                        <a href="lists?page=<?php /*($page+1) ;*/?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php /*} */?>
                            </ul>
                        </nav>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>