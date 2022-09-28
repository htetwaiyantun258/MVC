<?php require_once APPROOT . "/views/inc/header.php";?>
<?php require_once APPROOT . "/views/inc/nav.php";?>



<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card  p-5">
                <h1 class="text-info text-center mb-3">Create Post</h1>
                <form action="<?php echo URLROOT . "/Post/edit" ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="cat_id">Post Category</label>
                        <select class="form-control" id="cat_id" name="cat_id">
                        <?php foreach($data["cats"] as $cat):?>
                            <?php if($cat->id == $data['post']->cat_id): ?>
                                <option value="<?php echo $cat->id  ?>" selected><?php echo $cat->name ?></option>
                            <?php else: ?>
                                <option value="<?php echo $cat->id  ?>"><?php echo $cat->name ?></option>
                            <?php endif; ?>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label" >Title</label>
                        <input type="text" class="form-control <?php echo !empty($data['name_err']) ? 'is-invalid' : '';?>" id="title" name="title" value="<?php echo $data['post']->title ?>" >
                        <span class="text-danger"><?php echo !empty($data['title_err']) ? $data['title_err'] : '';?></span>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea  rol="20" class="form-control <?php echo !empty($data['desc_err']) ? 'is-invalid' : '';?>" id="description" name="description"  ><?php echo $data['post']->description ?></textarea>
                        <span class="text-danger"><?php echo !empty($data['desc_err']) ? $data['desc_err'] : '';?></span>
                    </div>
                
                    <div class="form-group">
                        <label for="file">Image file input</label>
                        <input type="file" class="form-control-file" id="file" name="file">
                        <span class="text-danger"><?php echo !empty($data['file_err']) ? $data['file_err'] : '';?></span>
                        <input type="hidden"  id="file" name="old_file" value="<?php echo $data['post']->image; ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="content" class="form-label">Content</label>
                        <textarea  class="form-control <?php echo !empty($data['content_err']) ? 'is-invalid' : '';?>" id="content" name="content" ><?php echo $data['post']->content ?></textarea>
                        <span class="text-danger"><?php echo !empty($data['content_err']) ? $data['content_err'] : '';?></span>
                    </div>

                    <div class="row justify-content-end no-gutters">
                        <div>
                            <button class="btn btn-outline-secondary ">Cancle</button>
                            <button class="btn btn-outline-primary" name="submit">update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php";?>
