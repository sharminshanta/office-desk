<!--Header-->
<?php echo isset($header) ? $header : ""; ?>
<!--End Header-->

<!--wrapper -->
<div id="wrapper">
    <!--Navigation -->
    <?php echo isset($navbar) ? $navbar : ""; ?>
    <!--End Navigation -->

    <!--Placeholder -->
    <div class="container-fluid">
        <div class="content-area">
            <?php echo isset($placeholder) ? $placeholder : ""; ?>
        </div>
    </div>
    <!--End Placeholder-->

    <footer class="footer">
        <div class="container-fluid">
            <p class="copy-text">Copyright &copy; <?php echo date('Y'); ?> All Rights Reserved by <a
                        href="https://www.besofty.com" target="_blank">Besofty Software Limited</a></p>
        </div>
    </footer>
</div>
<!--End wrapper -->

<!--Footer -->
<?php echo isset($footer) ? $footer : ""; ?>
<!--End Footer -->
