<form role="form" method="POST" action="<?= admin_url().'admin.php'.$createAction.$editAction ?>" multiple enctype="multipart/form-data">
    <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
    <input type="hidden" value="<?= $expertises['edit']->image ?>" name="old_image">
    <input type="hidden" value="<?= $expertises['edit']->image_home ?>" name="old_image_home">
    <input type="hidden" value="<?= $expertises['edit']->path ?>" name="path">
    <div class="row pt-1 bg-white">
        <div class="col-12 mt-4">
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="ex: Serenia Hills" value="<?= $expertises['edit']->title ? $expertises['edit']->title : ''; ?>" required>
            </div>
            
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="image">
                    Image
                    <br>
                    <span style="font-style: italic;color: red;">Image Must be : svg, png, jpeg, jpg<br>size: width: 912px, height: 816px</span>
                    <?php if (isset($expertises['edit']->image)) { ?>
                    <img src="<?= $expertises['edit']->path.'/'.$expertises['edit']->image ?>" style="width: 100%;">
                    <?php } ?>
                </label>
                <?php 
                    if (isset($expertises['edit']->image)) 
                    {
                        $required = '';
                    } 
                    else 
                    {
                        $required = 'required';
                    }
                ?>
                <input type="file" class="form-control float-right" name="image" id="image" placeholder="Full Image" <?= $required ?>>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="image">
                    Image Homepage
                    <br>
                    <span style="font-style: italic;color: red;">Image Must be : svg, png, jpeg, jpg<br>size: width: 912px, height: 816px</span>
                    <?php if (isset($expertises['edit']->image_home)) { ?>
                    <img src="<?= $expertises['edit']->path.'/'.$expertises['edit']->image_home ?>" style="width: 100%;">
                    <?php } ?>
                </label>
                <?php 
                    if (isset($expertises['edit']->image_home)) 
                    {
                        $required = '';
                    } 
                    else 
                    {
                        $required = 'required';
                    }
                ?>
                <input type="file" class="form-control float-right" name="image_home" <?= $required ?>>
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