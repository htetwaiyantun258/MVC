<?php require_once APPROOT . "/views/inc/header.php";?>
<?php require_once APPROOT . "/views/inc/nav.php";?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card rounded-0">
                <div class="card-header">
                    <h2>Side Menu</h2>
                </div>
                <div class="card-block">
                    <ul class="list-group ">
                        <?php foreach($data['cats'] as $getdata): ?>
                                <li class="list-group-item rounded-0 d-flex justify-content-between">
                                <span>
                               <?php echo $getdata->name; ?>
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
        <div class="col-md-5 offset-md-2" >
            <h2 class="mb-3 text-center text-info">Edit Category</h2>
        <form action="<?php echo URLROOT .'/Category/edit' ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control <?php echo !empty($data['name_err']) ? 'is-invalid' : '';?>" id="name" name="name"
                        value="<?php echo $data['currentCat']->name; ?>"  >
                        <span class="text-danger"><?php echo !empty($data['name_err']) ? $data['name_err'] : '';?></span>
                    </div>         
                    <div class="row justify-content-end no-gutters">
                        <div>
                            <button class="btn btn-outline-secondary ">Cancle</button>
                            <button class="btn btn-outline-primary">Update</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>






<?php require_once APPROOT . "/views/inc/footer.php";?>

