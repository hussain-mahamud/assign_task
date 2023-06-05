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
</head>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Buyer Demand</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Form</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Report</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<body>