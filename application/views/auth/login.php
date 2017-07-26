<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login - Besofty Software Limited</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url();?>assets/img/besofty.png" rel="icon"/>
    <!--SCRIPTS-->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <link href="<?php echo base_url();?>assets/css/custom_login.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="wrapper">
    <form name="login-form" class="login-form" action="login/test" method="post">
        <div class="header">
            <img src="<?php echo base_url();?>assets/img/besofty.png" class="logo"><br><br>
            <h4>Login - Besofty Software Ltd.</h4>
        </div>

        <div class="content">
            <input name="email" type="email" autofocus class="input username" placeholder="Email" required="required" onfocus="this.value=''" />
            <input name="password" type="password" class="input password" placeholder="Password" required="required" onfocus="this.value=''" />
        </div>

        <div class="footer">
            <input type="submit" name="btnsubmit" id='btn' onclick="move()" value="Login" class="button animate-me" />
           <div class="formFooter">
               <a href="">haven't account?</a>
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