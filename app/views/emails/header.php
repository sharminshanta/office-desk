<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $this->uri->segment(1) . " | " . $this->uri->segment(2); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url()?>assets/img/favicon.png" rel="icon"/>
    <!--SCRIPTS-->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()?>assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <link href="<?php echo base_url()?>assets/css/custom_login.css" rel="stylesheet" type="text/css" />

</head>

<body>