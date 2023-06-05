
<?php views('/partials/header.php'); ?>

<?php foreach($data as $dt){ ?>
    <li><?php echo $dt['buyer'] ?></li>
<?php } ?>
<?php views('/partials/footer.php'); ?>


