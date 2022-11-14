<?php
/** 
* Dev Collaborations Modules
* Hook : admin_menu
*/

function _getAllClientsData()
{
    global $wpdb;

    $name_table = 'clients';
    $table = $wpdb->prefix.$name_table;
    $query = "SELECT * FROM ".$table."";

    $result = $wpdb->get_results($query);
    
    $data = array();

    foreach ($result as $item)
    {
        $data[$item->id] = $item->title;
    }

    return $data;
}

function _getAllCategories()
{
    global $wpdb;

    $query = "SELECT 
            `wptj_term_taxonomy`.*,
            `wptj_terms`.`name`
            FROM `wptj_term_taxonomy`
            INNER JOIN `wptj_terms` ON `wptj_terms`.`term_id` = `wptj_term_taxonomy`.`term_id`
            WHERE `wptj_term_taxonomy`.`taxonomy` = 'category';";

    $result = $wpdb->get_results($query);
    
    $data = array();

    foreach ($result as $item)
    {
        if ($item->name != 'Uncategorized') {
            $data[$item->term_id] = $item->name;
        }
    }

    return $data;
}

function _getAllTags()
{
    global $wpdb;

    $query = "SELECT 
            `wptj_term_taxonomy`.*,
            `wptj_terms`.`name`
            FROM `wptj_term_taxonomy`
            INNER JOIN `wptj_terms` ON `wptj_terms`.`term_id` = `wptj_term_taxonomy`.`term_id`
            WHERE `wptj_term_taxonomy`.`taxonomy` = 'post_tag';";

    $result = $wpdb->get_results($query);

    return $result;
}

function _getAllContentPOST()
{
    global $wpdb;

    $query = "SELECT 
            `wptj_posts`.* 
            FROM `wptj_posts` 
            WHERE `wptj_posts`.`post_type` = 'post' 
            AND `wptj_posts`.`post_status` = 'publish';";

    $result = $wpdb->get_results($query);

    $data = array();

    foreach ($result as $item)
    {
        if ($item->ID != '1') {
            $data[$item->ID] = $item->post_title;
        }
    }

    return $data;
}

function uploadFiles($files)
{
    
    $path = wp_upload_dir();
    $target_dir = $path['path'];

    $target_file = $target_dir .'/'. basename($files['name']);

    $image_name = $files['name'];

    if(move_uploaded_file($files['tmp_name'],$target_file))
    {
        // echo 'A File was uploaded to the uploads directory.';
    }
    else
    {
        echo 'No file was uploaded.';
    }

    $data = [
        'name'  => $files['name'],
        'path'  => $path['url'],
    ];

    return $data;
}

function uploadFilesArray($files)
{
    $path = wp_upload_dir();
    $target_dir = $path['path'];

    $target_file = $target_dir .'/'. basename($files[0]);

    $image = $files[0];

    move_uploaded_file($files[2],$target_file);

    $data = [
        'name'  => $image,
        'path'  => $path['url'],
    ];

    return $data;
}

function pathEditAction()
{
    if (isset($_GET['action']) AND isset($_GET['id'])) 
    {
        $result = "&action=".$_GET['action']."&id=".$_GET['id']."";
    }
    else {
        $result = "&action=".$_GET['action']."";
    }

    return $result;
}

function pathCreatetAction()
{
    if (isset($_GET['page'])) 
    {
        $result = "?page=".$_GET['page']."";
    }
    else {
        $result = "";
    }

    return $result;
}

        
function notifications($result)
{
    if ($result > 0) 
    {
        $results = '<div class="alert alert-primary" role="alert">Input data has been created and A File was uploaded to the uploads directory.</div>';
    }
    else 
    {
        $results = '<div class="alert alert-danger" role="alert">Input data and File uploaded cannot be save!.</div>';
    }

    return $results;
}

function edit_url($page, $action, $id)
{
    $template = "<a href='".admin_url()."admin.php?page=".$page."&action=".$action."&id=".$id."' class='button button-primary'>
                    <span class='dashicons dashicons-edit'></span>
                </a>";

    return $template;
}

function status_url($page, $action, $id, $status)
{
    if ($status > 0) 
    {
        $template = '<a href="'.admin_url().'admin.php?page='.$page.'&action='.$action.'&id='.$id.'" class="btn btn-success" style="padding: 0 10px 3px;">
                        <span class="dashicons dashicons-yes"></span>
                    </a>';
    }
    else 
    {
        $template = '<a href="'.admin_url().'admin.php?page='.$page.'&action='.$action.'&id='.$id.'" class="btn btn-danger" style="padding: 0 10px 3px;">
                        <span class="dashicons dashicons-no"></span>
                    </a>';
    }
    
    return $template;
}

?>