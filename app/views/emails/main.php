<form name="login-form" class="login-form" action="/security/forgotpwd" method="post">
    <div class="header">
        <img src="/assets/img/favicon.png" class="logo"><br><br>
        <h5>Security - Besofty Software Ltd.</h5>
        <?php
            $error = $this->session->flashdata('error');
            if (isset($error)) {
                echo "<span style='color:red; font-size: 13px'>$error</span>";
            } else {
                echo "<span>Authorized Users Only</span>";
            }
        ?>
    </div>

    <div class="content">
        <input name="email_address" type="email" autofocus class="input username" placeholder="example@besofty.com" required="required" onfocus="this.value=''" />
    </div>

    <div class="footer">
        <input type="submit" name="btnsubmit" id='btn' value="Send" class="button animate-me" />
        <div class="formFooter">
            <div class="pull-left"><a href="/login">Login</a></div>
        </div>
    </div>
</form>