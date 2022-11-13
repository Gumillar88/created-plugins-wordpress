<form role="form" method="POST" action="<?= admin_url().'admin.php'.$createAction.$editAction ?>" multiple enctype="multipart/form-data">
    <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
    <input type="hidden" value="<?= $peoples['edit']->image ? $peoples['edit']->image :''; ?>" name="old_image">
    <input type="hidden" value="<?= $peoples['edit']->path ? $peoples['edit']->path :''; ?>" name="path">
    <div class="row pt-1 bg-white">
        <div class="col-12 mt-4">
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="ex: Johnny Depp" value="<?= $peoples['edit']->title ? $peoples['edit']->title : ''; ?>" required>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="form-group">
                <label for="name">Position</label>
                <input type="text" class="form-control" name="position" id="position" placeholder="ex: Full Stack" value="<?= $peoples['edit']->position ? $peoples['edit']->position : ''; ?>" required>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="form-group">
                <label for="name">Description</label>
                <textarea name="content" cols="30" rows="10" class="form-control">
                    <?= $peoples['edit']->content ? $peoples['edit']->content : ''; ?>
                </textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="image">
                    Image
                    <br>
                    <span style="font-style: italic;color: red;">Image Must be : svg, png, jpeg, jpg<br>size: width: 912px, height: 816px</span>
                    <?php if (isset($peoples['edit']->image)) { ?>
                    <img src="<?= $peoples['edit']->path.'/'.$peoples['edit']->image ?>" style="width: 100%;height: 200px;object-fit: contain;">
                    <?php } ?>
                </label>
                
                <?php 
                    if (isset($peoples['edit']->image)) 
                    {
                        $required = '';
                    } 
                    else 
                    {
                        $required = 'required';
                    }
                ?>
                <input type="file" class="form-control float-right" name="image" placeholder="Full Image" <?= $required ?>>
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <p class="text-right" style="text-align: right;">
                    <input type="submit" class="btn btn-primary" value="Save" />
                </p>
            </div>
        </div>
    </div>
</form>