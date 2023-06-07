<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>
        <?php echo env('APP_TITLE'); ?>
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="<?php echo assets('css/style.css'); ?>">
    <link href="<?php echo assets('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo assets('js/sweetalert2.min.css');?>" rel="stylesheet">
    <script src="<?php echo assets('jquery/jquery.min.js');?>"></script>
   
</head>
<body style="min-height:600p!important;">
<?php views('/partials/navbar.php'); ?>