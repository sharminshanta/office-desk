<form name="login-form" class="login-form" action="<?php echo base_url()?>security/forgotpwd" method="post">
    <div class="header">
        <img src="<?php echo base_url()?>assets/img/favicon.png" class="logo"><br><br>
        <h5>Security - Besofty Software Ltd.</h5>
        <?php
            $error = $this->session->userdata('error');
            $success = $this->session->userdata('success');
            if (isset($error)) {
                echo "<span style='color:red; font-size: 13px'>$error</span>";
                $this->session->unset_userdata('error');
            } elseif(isset($success)) {
                echo "<span style='color:green; font-size: 13px'>$success</span>";
                $this->session->unset_userdata('success');
            }
        ?>
    </div>
    <div class="content">
        <input name="password" type="password" autofocus class="input password" placeholder="New password" required="required" onfocus="this.value=''" />
        <input name="confirm_password" type="password" autofocus class="input password" placeholder="Confirm password" required="required" onfocus="this.value=''" />
        <input type="hidden" class="form-control" value="{{ token }}" name="pwd_reset_token" />
    </div>

    <div class="footer">
        <input type="submit" name="btnsubmit" id='btn' value="Reset Password" class="button animate-me" />
        <div class="formFooter">
            <div class="pull-left"><a href="<?php echo base_url()?>login">Login</a></div>
        </div>
    </div>
</form>