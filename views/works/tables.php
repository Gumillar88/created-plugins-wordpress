<div class="row m-2 bg-white">
    <div class="col-12 m-auto pt-3">
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
            <?php foreach($project_data['projects'] as $key => $column) { ?>
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
                        <?php
                            $page   = dynamicModules()[1]; 
                            $action = 'edit';
                            $id     = $column->id;
                        ?>
                        <?php echo edit_url($page, $action, $id); ?>

                        <?php
                            $page   = dynamicModules()[1]; 
                            $action = 'status';
                            $id     = $column->id;
                            $status = $column->is_active;
                        ?>
                        <?php echo status_url($page, $action, $id, $status); ?>
                    </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</div>