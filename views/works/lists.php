<?php
$param = dynamicModules()[1];

$projects = project_list($param);

$editAction = pathEditAction();
$createAction = pathCreatetAction();

$project_data           = $projects['lists'];
$_getAllClientData      = $projects['rel_client'];
$_getAllCategoriesData  = $projects['rel_categories'];
$_getAllContentPost     = $projects['rel_content_post'];
?>
<div class="wrap">
    <div class="row">
        <div class="col-12 mt-2">
            <h5 class="wp-heading-inline"><?= ucfirst(dynamicModules()[1]) ?></h5>
            <?php if ($_GET['action'] != 'create' AND $_GET['action'] != 'edit' AND $_GET['action'] != 'status') { ?>
            <a href="<?php echo admin_url().'admin.php?page=works&action=create';?>" class="page-title-action">Add New</a>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 bg-white">
            <?php if ($_GET['page'] == 'works' AND $_GET['action'] == 'create') { ?>
                <?php include TEMP_DIR.dynamicModules()[1].'/create.php'; ?>
            <?php } elseif ($_GET['page'] == 'works' AND $_GET['action'] == 'edit') { ?>
                <?php include TEMP_DIR.dynamicModules()[1].'/edit.php'; ?>
            <?php } else { ?>
                <?php include TEMP_DIR.dynamicModules()[1].'/tables.php'; ?>
            <?php } ?>
        </div>
    </div>
</div>

<div class="wrap">
    
    
</div>