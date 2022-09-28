<?php require_once APPROOT . "/views/inc/header.php";?>
<?php require_once APPROOT . "/views/inc/nav.php";?>



<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h6><?php echo $data['post']->title ?></h6>
                </div>
                <div class="card-block p-2">
                    <img style="width:600px" src="<?php echo URLROOT . "/assets/upload/" . $data['post']->image; ?>" alt="">
                    <p><?php echo $data['post']->content; ?></p>
                </div>
                <div class="card-footer">
                    <a href="<?php echo URLROOT . "/Post/create/" . $data['post']->cat_id; ?>">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php";?>
