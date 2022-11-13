<?php
$param = dynamicModules()[0];

$clients = clients_list($param);

$editAction = pathEditAction();
$createAction = pathCreatetAction();
?>
<div class="wrap">
    <div class="row">
        <div class="col-12 mt-2">
            <h5 class="wp-heading-inline"><?= ucfirst(dynamicModules()[0]) ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php include TEMP_DIR.dynamicModules()[0].'/create.php'; ?>
        </div>
        <div class="col-md-8">
            <?php include TEMP_DIR.dynamicModules()[0].'/tables.php'; ?>
        </div>
    </div>
</div>
<script>
    
</script>