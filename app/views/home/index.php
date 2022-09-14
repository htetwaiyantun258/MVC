
<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php require_once APPROOT . "/views/inc/nav.php"; ?>


<ul>
    <?php foreach($data as $user):?>
        <li><?php echo $user->name ?></li>
        <?php endforeach; ?>
</ul>
       <?php  flash('login success'); ?>
      

<?php echo APPROOT ?>


<?php require_once APPROOT . "/views/inc/footer.php"; ?>