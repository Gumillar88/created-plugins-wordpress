<div class="row m-2 bg-white">
    <div class="col-12 m-auto pt-3">
        <table class="display nowrap dt-custom wp-list-table widefat fixed striped pages" style="width: 100%;">
            <thead>
                <tr>
                    <th class="text-center" width="2%">#</th>
                    <th class="text-center">Title</th>
                    <th class="text-center" width="10%">Created</th>
                    <th class="text-center" width="10%">Option</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach($journals['lists'] as $key => $column) { ?>
                <tr>
                    <td class="text-center sorting_1"><?php echo ++$key; ?></td>
                    <td class="text-center"><?php echo $column->title; ?></td>
                    <td class="text-center"><?php echo date('j F Y', strtotime($column->created)); ?></td>
                    <td class="text-center">
                        <?php
                            $page   = dynamicModules()[5]; 
                            $action = 'edit';
                            $id     = $column->id;
                        ?>
                        <?php echo edit_url($page, $action, $id); ?>

                        <?php
                            $page   = dynamicModules()[5]; 
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