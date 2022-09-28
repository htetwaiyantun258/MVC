<?php require_once APPROOT . "/views/inc/header.php";?>
<?php require_once APPROOT . "/views/inc/nav.php";?>


<div class="container">
<a class="btn btn-primary mt-2 no-getter" href="<?php echo URLROOT . "/Post/createpost" ?>">Create</a>

    <div class="row">
        <div class="col-md-4 mt-3">
            <div class="card rounded-0">
                <div class="card-header">
                    <h2>Category</h2>
                </div>
                <div class="card-block">
                    <ul class="list-group ">
                        <?php foreach($data['cats'] as $getdata): ?>
                                <li class="list-group-item rounded-0 d-flex justify-content-between">
                                <span>
                                <a href="<?php echo URLROOT .'/Post/create/' . $getdata->id?>" ><?php echo $getdata->name; ?></a>
                                </span>
                                <span>
                                    <a href="<?php echo URLROOT . '/Category/edit/'. $getdata->id ?>"><i class="fa fa-edit text-warning"></i></a>
                                    <a href="<?php echo URLROOT . '/Category/delete/'. $getdata->id ?>"><i class="fa fa-trash text-danger"></i></a>
                                </span>
                                </li>
                        <?php endforeach; ?>                          
                    </ul>
                </div>
            </div>     
        </div>
        <div class="col-md-8">
            <!-- post card start -->
            <?php foreach($data['posts'] as $post): ?>
                <div class="card border-primary mb-8 offset-md-3 mt-3" style="max-width: 35rem;">
                <div class="card-header text-center"><?php echo $post->title ?></div>
                <div class="card-body text-dark">
                    <h5 class="card-title"><?php echo $post->description ?></h5>
                    <p class="card-text"><?php echo $post->content ?></p>
                    <div class="row justify-content-end">
                        <a href="<?php echo URLROOT . "/Post/show/" . $post->id ?>" class="btn btn-success btn-sm">Detail</a>
                        <a href="<?php echo URLROOT . "/Post/edit/" . $post->id?>" class="btn btn-warning ml-3 btn-sm">Edit</a>
                        <a href="<?php echo URLROOT . "/Post/delete/" . $post->id?>" class="btn btn-danger ml-3 btn-sm">Delete</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            
            <!-- post card end  -->
        </div>
        
    </div>
</div>
<?php require_once APPROOT . "/views/inc/footer.php";?>

