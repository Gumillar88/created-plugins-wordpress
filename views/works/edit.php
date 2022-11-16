<?php

$contentPost    = $projects['edit']['contentPost'];
$categories     = $projects['edit']['categories'];
$tags           = $projects['edit']['tags'];
$clients        = $projects['edit']['clients'];
$works          = $projects['edit']['works'];

$content_post   = $projects['edit']['category_'];
$sub_category   = $projects['edit']['subcategory_'];
$client_data    = $projects['edit']['client_'];

/*
** Images
*/ 
$image_ = json_decode($works->image);

$third_image_ = json_decode($works->third_image);

?>
<form role="form" method="POST" action="<?= admin_url().'admin.php'.$createAction.$editAction ?>" multiple enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $works->id ?>">
    <input type="hidden" class="form-control" name="image_old[svg]" value="<?= $image_->svg ?>">
    <input type="hidden" class="form-control" name="image_old[gif]" value="<?= $image_->gif ?>">
    <input type="hidden" class="form-control" name="hero_image_old" value="<?= $works->hero_image ?>">
    <input type="hidden" class="form-control" name="second_image_old" value="<?= $works->second_image ?>">
    <input type="hidden" class="form-control" name="third_image_old[first]" value="<?= $third_image_->first ?>">
    <input type="hidden" class="form-control" name="third_image_old[second]" value="<?= $third_image_->second ?>">
    <input type="hidden" class="form-control" name="third_image_old[third]" value="<?= $third_image_->third ?>">
    <input type="hidden" class="form-control" name="last_image_old" value="<?= $works->last_image ?>">
    <div class="row">
        <div class="col-6">
            <div class="form-group py-2">
                <label>Type Content</label>
                <select class="select form-control" name="project_category_id">
                    <option selected="" value="<?= $content_post->ID ?>"><?= $content_post->post_title ? $content_post->post_title:"Please Choose Category" ?></option>
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
                    <option selected="" value="<?= $sub_category->term_id ?>"><?= $sub_category->name ? $sub_category->name:"Please Choose Sub Category" ?></option>
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
                    <option selected="" value="<?= $client_data->id ?>"><?= $client_data->title ? $client_data->title:"Please Choose Clients" ?></option>
                    <?php foreach($clients as $column) { ?>
                        <option value="<?= $column->id ?>"><?= $column->title ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group py-2">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="<?= $works->title ?>" required="">
            </div>
            <div class="form-group py-2">
                <label for="short_description">Short Description</label>
                <textarea class="form-control" name="short_description" placeholder="Short Description" style="height: 150px;" required="">
                        <?= $works->short_description ?>
                </textarea>
            </div>
            <div class="form-group py-2">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" placeholder="Description" style="height: 150px;" required="">
                        <?= $works->description ?>
                </textarea>
            </div>
            <div class="form-group py-2" style="border: 1px solid #ced4da;padding: 15px;">
                <h4>Tags</h4>
                <?php
                    $tag_ids = json_decode($works->tag_id);
                    
                    foreach ($tag_ids as $value) 
                    {
                        $tagids[] = $value;
                    }
                    
                ?>
                <?php foreach($tags as $key => $column) { ?>
                    <?php  
                        if (in_array($column->term_id, $tagids)) 
                        {
                            $checked = 'checked';
                        }
                        else
                        {
                            $checked = '';
                        }
                    ?>
                    <div class="col-4 form-check pull-left" style="float:left;">
                        <input class="form-check-input" type="checkbox" name="tag_id[]" value="<?= $column->term_taxonomy_id ?>" id="flexCheckDefault<?= $key ?>" <?= $checked ?>>
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
                    <br>
                    <img src="<?= $image_->svg ?>" class="img-fluid" style="height: 200px;">
                </label>
                <input type="file" class="form-control" name="image[svg]">
                <br>
                <label for="thumb">
                    GiF Image<span style="color: red;">(*)</span>
                    <br>
                    <span style="font-style: italic;color: red;">Notes : (w)1920px, (h)1080px, and image must be (.svg)</span>
                    <br>
                    <img src="<?= $image_->gif ?>" class="img-fluid" style="height: 200px;">
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
                    <br>
                    <img src="<?= $works->path.'/'.$works->hero_image ?>" class="img-fluid" style="height: 200px;">
                </label>
                <input type="file" class="form-control" name="hero_image">
                <br>
                <label for="second_title">Second Title</label>
                <input type="text" class="form-control" name="second_title" placeholder="Second Title" value="<?= $works->second_title ?>" required="">
                <br>
                <label for="image">
                    Second Image
                    <br>
                    <span style="font-style: italic;color: red;">Notes : (w)1248px, (h)500px</span>
                    <br>
                    <img src="<?= $works->path.'/'.$works->second_image ?>" class="img-fluid" style="height: 200px;">
                </label>
                <input type="file" class="form-control" name="second_image">
                <br>
                <div style="border: 1px solid #ced4da;padding: 15px;">
                    <h4>Third Images</h4>
                    <label for="thumb">
                        First Image<span style="color: red;">(*)</span>
                        <br>
                        <span style="font-style: italic;color: red;">Notes : (w)616px, (h)800px</span>
                        <br>
                        <img src="<?= $third_image_->first ?>" class="img-fluid" style="height: 200px;">
                    </label>
                    <input type="file" class="form-control" name="third_image[first]">
                    <br>
                    <label for="thumb">
                        Second Image<span style="color: red;">(*)</span>
                        <br>
                        <span style="font-style: italic;color: red;">Notes : (w)616px, (h)200px</span>
                        <br>
                        <img src="<?= $third_image_->second ?>" class="img-fluid" style="height: 200px;">
                    </label>
                    <input type="file" class="form-control" name="third_image[second]">
                    <br>
                    <label for="thumb">
                        Third Image<span style="color: red;">(*)</span>
                        <br>
                        <span style="font-style: italic;color: red;">Notes : (w)616px, (h)200px</span>
                        <br>
                        <img src="<?= $third_image_->third ?>" class="img-fluid" style="height: 200px;">
                    </label>
                    <input type="file" class="form-control" name="third_image[third]">
                </div>
                <br>
                <label for="second_description">Second Description</label>
                <textarea class="form-control" name="second_description" placeholder="Second Description" style="height: 150px;" required="">
                    <?= $works->second_description ?>
                </textarea>
                <br>
                <label for="last_description">Last Description</label>
                <textarea class="form-control" name="last_description" placeholder="Last Description" style="height: 150px;" required="">
                    <?= $works->last_description ?> 
                </textarea>
                <br>
                <label for="image">
                    Last Image
                    <br>
                    <span style="font-style: italic;color: red;">Notes : (w)2530px, (h)961px</span>
                    <br>
                    <img src="<?= $works->path.'/'.$works->last_image ?>" class="img-fluid" style="height: 200px;">
                </label>
                <input type="file" class="form-control" name="last_image">
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