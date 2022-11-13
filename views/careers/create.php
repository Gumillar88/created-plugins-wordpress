<form role="form" method="POST" action="<?= admin_url().'admin.php'.$createAction.$editAction ?>" multiple enctype="multipart/form-data">
    <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
    <input type="hidden" value="<?= $careers['edit']->image ? $careers['edit']->image :''; ?>" name="old_image">
    <input type="hidden" value="<?= $careers['edit']->thumb ? $careers['edit']->thumb :''; ?>" name="thumb">
    <input type="hidden" value="<?= $careers['edit']->path ? $careers['edit']->path :''; ?>" name="path">
    <div class="row pt-1 bg-white">
        <div class="col-12 mt-4">
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="ex: Looking Fullstack Developer" value="<?= $careers['edit']->title ? $careers['edit']->title : ''; ?>" required>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="form-group">
                <label for="name">Position</label>
                <input type="text" class="form-control" name="position" id="position" placeholder="ex: Fullstack" value="<?= $careers['edit']->position ? $careers['edit']->position : ''; ?>" required>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="form-group">
                <label for="name">Description</label>
                <textarea name="content" cols="30" rows="10" class="form-control">
                    <?= $careers['edit']->content ? $careers['edit']->content : ''; ?>
                </textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="image">
                    Image
                    <br>
                    <span style="font-style: italic;color: red;">Image Must be : svg, png, jpeg, jpg<br>size: width: 912px, height: 816px</span>
                    <?php if (isset($careers['edit']->image)) { ?>
                    <img src="<?= $careers['edit']->path.'/'.$careers['edit']->image ?>" style="width: 100%;height: 200px;object-fit: contain;">
                    <?php } ?>
                </label>
                
                <?php 
                    if (isset($careers['edit']->image)) 
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