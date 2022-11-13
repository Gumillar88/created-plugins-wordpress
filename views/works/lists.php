<div class="wrap">
    <h1 class="wp-heading-inline">Work List</h1>
    <a href="<?php echo admin_url().'/admin.php?page=works&action=create';?>" class="page-title-action">Add New</a>
    <table class="display nowrap dt-custom wp-list-table widefat striped pages" style="width: 100%;">
        <thead>
            <tr>
                <th width="2%">#</th>
                <th class="text-center">Title</th>
                <th class="text-center">Slug</th>
                <th class="text-center">Clients</th>
                <th class="text-center">Content POST</th>
                <th class="text-center">Category</th>
                <th class="text-center">Tags</th>
                <th class="text-center">Created</th>
                <th class="text-center">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $param = dynamicModules()[1];

            $data = project_list($param);
            $projects               = $data['projects'];
            $_getAllClientData      = $data['rel_client'];
            $_getAllCategoriesData  = $data['rel_categories'];
            $_getAllContentPost     = $data['rel_content_post'];

            ?>
            <?php foreach($projects as $key => $column) { ?>
            <tr>
                <td class="text-center"><?php echo ++$key; ?></td>
                <td class="text-center"><?php echo $column->title; ?></td>
                <td class="text-center"><?php echo $column->slug; ?></td>
                <td class="text-center"><?php echo $_getAllClientData[$column->client_id] ? $_getAllClientData[$column->client_id] : " - "; ?></td>
                <td class="text-center"><?php echo $_getAllContentPost[$column->project_category_id] ? $_getAllContentPost[$column->project_category_id] : " - "; ?></td>
                <td class="text-center"><?php echo $_getAllCategoriesData[$column->project_subcategory_id] ? $_getAllCategoriesData[$column->project_subcategory_id] : " - "; ?></td>
                <td class="text-center">
                    <?php
                        $getTagData = getByIdTags($column->tag_id);
                        
                    ?>
                    <?php echo '<div>'.implode(", ", $getTagData).'</div>'; ?>                     
                </td> 
                <td class="text-center"><?php echo date('j F Y', strtotime($column->created)); ?></td>
                <td class="text-center">
                     <a href="https://www.flourish.co.id/quantum/realm/our-works/edit?id=MTA=" class="button button-primary">
                        <span class="dashicons dashicons-edit"></span>
                    </a>
                    <a href="https://www.flourish.co.id/quantum/realm/our-works/status_active?id=MTA=&amp;status= MA== " class="button button-success">
                        <span class="dashicons dashicons-yes"></span>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>