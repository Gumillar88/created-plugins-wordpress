<?php
$param = dynamicModules()[5];

$journals = journals_list($param);

$editAction = pathEditAction();
$createAction = pathCreatetAction();
?>
<div class="wrap">
    <div class="row">
        <div class="col-12 mt-2">
            <h5 class="wp-heading-inline"><?= ucfirst(dynamicModules()[5]) ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php include TEMP_DIR.dynamicModules()[5].'/create.php'; ?>
        </div>
        <div class="col-md-8">
            <?php include TEMP_DIR.dynamicModules()[5].'/tables.php'; ?>
        </div>
    </div>
</div>