<form name="login-form" class="login-form" action="<?php echo base_url() ?>security/resetPassword" method="post">
    <div class="header">
        <img src="<?php echo base_url() ?>assets/img/favicon.png" class="logo"><br><br>
        <h5>Security - Besofty Software Ltd.</h5>
        <?php
        $error = $this->session->userdata('error');
        $validationError = $this->session->userdata('errors');
        $success = $this->session->userdata('success');
        if (isset($error)) {
            echo "<span style='color:red; font-size: 13px'>$error</span>";
            $this->session->unset_userdata('error');
        } elseif (isset($success)) {
            echo "<span style='color:green; font-size: 13px'>$success</span>";
            $this->session->unset_userdata('success');
        }
        ?>
    </div>
    <div class="content">
        <input name="new_password" type="password" autofocus class="input password" placeholder="New password"
               onfocus="this.value=''"/>
        <?php
        if (isset($validationError['new_password'])) { ?>
            <span class="text-danger">
                <?php
                echo $validationError['new_password'][0];
                $this->session->unset_userdata('errors');
                ?>
            </span>
        <?php } ?>
        <input name="confirm_password" type="password" autofocus class="input password" placeholder="Confirm password"
               onfocus="this.value=''"/>
        <?php
        if (isset($validationError['confirm_password'])) { ?>
            <span class="text-danger">
                <?php
                echo $validationError['confirm_password'][0];
                $this->session->unset_userdata('errors');
                ?>
            </span>
        <?php } ?>
        <input type="hidden" class="form-control" value="<?php echo ($user == false) ? '' : ($user->password_token); ?>"
               name="password_token"/>
    </div>

    <div class="footer">
        <input type="submit" id='btn' value="Reset Password" class="button animate-me"/>
        <div class="formFooter">
            <div class="pull-left"><a href="<?php echo base_url() ?>login">Login</a></div>
        </div>
    </div>
</form>