<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login | Besofty Software Limited </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/img/favicon.png" rel="icon"/>
    <!--SCRIPTS-->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <script src="/assets/js/bootstrap.min.js"></script>
    <link href="/assets/css/custom_login.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="wrapper">
    <form name="login-form" class="login-form" action="/login/authentication" method="post">
        <div class="header">
            <img src="/assets/img/favicon.png" class="logo"><br><br>
            <h4>Login - Besofty Software Ltd.</h4>
            <?php
            $error = $this->session->userdata('error');
            $success = $this->session->userdata('success');

            if (isset($error)) {
                echo "<span style='color:red; font-size: 13px'>$error</span>";
                $this->session->unset_userdata('error');
            } elseif (isset($success)) {
                echo "<span style='color:green; font-size: 13px'>$success</span>";
                $this->session->unset_userdata('success');
            } else {
                echo '<span>Authorized User Only</span>';
            }
            ?>
        </div>

        <div class="content">
            <input name="email_address" type="email" autofocus class="input username" placeholder="example@besofty.com" required="required" onfocus="this.value=''" />
            <input name="password" type="password" class="input password" placeholder="Password" required="required" onfocus="this.value=''" />
        </div>

        <div class="footer">
            <input type="submit" name="btnsubmit" id='btn' onclick="move()" value="Login" class="button animate-me" />
           <div class="formFooter">
               <div class="pull-left"><a href="">Haven't account?</a></div>
               <div class="pull-right"><a href="/security">Forgot password?</a></div>
           </div>
            <script>
                $('.animate-me').on('click',function(){
                    $('.login-form').addClass('animated fadeOutLeft');
                });
            </script>
        </div>
    </form>
</div>
<div class="gradient"></div>
</body>
</html>