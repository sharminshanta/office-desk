<?php
$error = $this->session->userdata('error');
$oldValue = $this->session->userdata('oldValue');
?>
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h3>Roles And Permissions</h3>
            <p>Add a new role and permission of that our platform</p>
        </div>
    </div>
</div>
<div class="widget">
    <div class="widget-header">
        <div class="pull-left">
            <h3 class="panel-title">Roles And Permissions</h3>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="widget-body">
        <form action="<?php echo base_url()?>users/create" method="post" id="signup_signupForm">
            <div class="form-group <?php echo(isset($error['last_name']) ? 'has-error' : ''); ?>">
                <label for="exampleInputLastName" class="control-label">Permissions</label>
            </div>
            <button type="submit" class="btn btn-success" id="signup_btnCreate">Assign Permission</button>
            <br>
        </form>
    </div>
</div>