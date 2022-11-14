<?php

$contentPost    = $projects['create']['contentPost'];
$categories     = $projects['create']['categories'];
$tags           = $projects['create']['tags'];
$clients        = $projects['create']['clients'];

?>
<form role="form" method="POST" action="<?= admin_url().'admin.php'.$createAction.$editAction ?>" multiple enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">
            <div class="form-group py-2">
                <label>Type Content</label>
                <select class="select form-control" name="project_category_id">
                    <option selected="" disabled="">Please Choose Category</option>
                    <?php foreach($contentPost as $column) { ?>
                        <?php if ($column->ID != 1) { ?>
                        <option value="<?= $column->ID ?>"><?= $column->post_title ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group py-2">
                <label>Category</label>
                <select class="select form-control" name="project_subcategory_id">
                    <option selected="" disabled="">Please Choose Sub Category</option>
                    <?php foreach($categories as $column) { ?>
                        <?php if ($column->term_taxonomy_id != 1) { ?>
                        <option value="<?= $column->term_taxonomy_id ?>"><?= $column->name ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group py-2">
                <label>Clients</label>
                <select class="select form-control" name="client_id">
                    <option selected="" disabled="">Please Choose Clients</option>
                    <?php foreach($clients as $column) { ?>
                        <option value="<?= $column->id ?>"><?= $column->title ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group py-2">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="" required="">
            </div>
            <div class="form-group py-2">
                <label for="short_description">Short Description</label>
                <textarea class="form-control" name="short_description" placeholder="Short Description" style="height: 150px;" required=""></textarea>
            </div>
            <div class="form-group py-2">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" placeholder="Description" style="height: 150px;" required=""></textarea>
            </div>
            <div class="form-group py-2" style="border: 1px solid #ced4da;padding: 15px;">
                <h4>Tags</h4>
                <?php foreach($tags as $key => $column) { ?>
                    <div class="col-4 form-check pull-left" style="float:left;">
                        <input class="form-check-input" type="checkbox" name="tag_id[]" value="<?= $column->term_taxonomy_id ?>" id="flexCheckDefault<?= $key ?>">
                        <label class="form-check-label" for="flexCheckDefault<?= $key ?>" style="margin-top: -21px;">
                            <?= $column->name ?> 
                        </label>
                    </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
            <div class="form-group mt-2" style="border: 1px solid #ced4da;padding: 15px;">
                <label for="thumb">
                    SVG Image<span style="color: red;">(*)</span>
                    <br>
                    <span style="font-style: italic;color: red;">Notes : (w)1920px, (h)1080px, and image must be (.svg)</span>
                </label>
                <input type="file" class="form-control" name="image[svg]" required="">
                <br>
                <label for="thumb">
                    GiF Image<span style="color: red;">(*)</span>
                    <br>
                    <span style="font-style: italic;color: red;">Notes : (w)1920px, (h)1080px, and image must be (.svg)</span>
                </label>
                <input type="file" class="form-control" name="image[gif]">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group py-2" style="border: 1px solid #ced4da;padding: 15px;">
                <h3>Our Work Detail Page</h3>
                <label for="image">
                    Hero Image
                    <br>
                    <span style="font-style: italic;color: red;">Notes : (w)2530px, (h)961px</span>
                </label>
                <input type="file" class="form-control" name="hero_image" required="">
                <br>
                <label for="second_title">Second Title</label>
                <input type="text" class="form-control" name="second_title" placeholder="Second Title" value="" required="">
                <br>
                <label for="image">
                    Second Image
                    <br>
                    <span style="font-style: italic;color: red;">Notes : (w)1248px, (h)500px</span>
                </label>
                <input type="file" class="form-control" name="second_image" required="">
                <br>
                <div style="border: 1px solid #ced4da;padding: 15px;">
                    <h4>Third Images</h4>
                    <label for="thumb">
                        First Image<span style="color: red;">(*)</span>
                        <br>
                        <span style="font-style: italic;color: red;">Notes : (w)616px, (h)800px</span>
                    </label>
                    <input type="file" class="form-control" name="third_image[first]" required="">
                    <br>
                    <label for="thumb">
                        Second Image<span style="color: red;">(*)</span>
                        <br>
                        <span style="font-style: italic;color: red;">Notes : (w)616px, (h)200px</span>
                    </label>
                    <input type="file" class="form-control" name="third_image[second]">
                    <br>
                    <label for="thumb">
                        Third Image<span style="color: red;">(*)</span>
                        <br>
                        <span style="font-style: italic;color: red;">Notes : (w)616px, (h)200px</span>
                    </label>
                    <input type="file" class="form-control" name="third_image[third]">
                </div>
                <br>
                <label for="second_description">Second Description</label>
                <textarea class="form-control" name="second_description" placeholder="Second Description" style="height: 150px;" required=""></textarea>
                <br>
                <label for="last_description">Last Description</label>
                <textarea class="form-control" name="last_description" placeholder="Last Description" style="height: 150px;" required=""></textarea>
                <br>
                <label for="image">
                    Last Image
                    <br>
                    <span style="font-style: italic;color: red;">Notes : (w)2530px, (h)961px</span>
                </label>
                <input type="file" class="form-control" name="last_image" required="">
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