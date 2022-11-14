<?php
/** 
* Dev Works Modules
* Hook: admin_menu
*/

function create_work($result)
{
    global $wpdb;

    $table = $wpdb->prefix.'projects';
    
    $data = $wpdb->insert($table,$result);
    
    return $data;
}

function getAllProjects($name_table, $andWhere="")
{
    global $wpdb;

    $table = $wpdb->prefix.$name_table;
    $query = "SELECT * FROM ".$table."";

    $result = $wpdb->get_results($query);
    
    return $result;

}

function getAllContentPost()
{
    global $wpdb;

    $query = "SELECT 
            `wptj_posts`.* 
            FROM `wptj_posts` 
            WHERE `wptj_posts`.`post_type` = 'post' 
            AND `wptj_posts`.`post_status` = 'publish';";

    $data = $wpdb->get_results($query);

    return $data;
}

function getAllClientData()
{
    global $wpdb;

    $table = $wpdb->prefix.'clients';
    $query = "SELECT * FROM ".$table."";

    $result = $wpdb->get_results($query);
    
    return $result;
}

function getAllCategories()
{
    global $wpdb;

    $query = "SELECT 
            `wptj_term_taxonomy`.*,
            `wptj_terms`.`name`
            FROM `wptj_term_taxonomy`
            INNER JOIN `wptj_terms` ON `wptj_terms`.`term_id` = `wptj_term_taxonomy`.`term_id`
            WHERE `wptj_term_taxonomy`.`taxonomy` = 'category';";

    $data = $wpdb->get_results($query);

    return $data;
}

function getAllTagged()
{
    global $wpdb;

    $query = "SELECT 
            `wptj_term_taxonomy`.*,
            `wptj_terms`.`name`
            FROM `wptj_term_taxonomy`
            INNER JOIN `wptj_terms` ON `wptj_terms`.`term_id` = `wptj_term_taxonomy`.`term_id`
            WHERE `wptj_term_taxonomy`.`taxonomy` = 'post_tag';";

    $data = $wpdb->get_results($query);

    return $data;
}

function getWorkByID($id)
{
    global $wpdb;

    $query = "SELECT 
            `wptj_projects`.* 
            FROM `wptj_projects` 
            WHERE `wptj_projects`.`id` = '".$id."';"; // AND `wptj_projects`.`is_active` = '1'

    if (count($wpdb->get_results($query)) > 0) 
    {
        $result = $wpdb->get_results($query)[0];
    }
    else 
    {
        $result = '';
    }
    
    return $result;
}

function getOneContentPost($project_category_id)
{
    global $wpdb;

    $query = "SELECT 
            `wptj_posts`.* 
            FROM `wptj_posts` 
            WHERE `wptj_posts`.`post_type` = 'post' 
            AND `wptj_posts`.`post_status` = 'publish'
            AND `wptj_posts`.`ID` = '".$project_category_id."';";

    $data = $wpdb->get_results($query)[0];
    
    return $data;
}

function getOneCategory($project_subcategory_id)
{
    global $wpdb;

    $query = "SELECT 
            `wptj_term_taxonomy`.*,
            `wptj_terms`.`name`
            FROM `wptj_term_taxonomy`
            INNER JOIN `wptj_terms` ON `wptj_terms`.`term_id` = `wptj_term_taxonomy`.`term_id`
            WHERE `wptj_term_taxonomy`.`taxonomy` = 'category'
            AND `wptj_term_taxonomy`.`term_id` = '".$project_subcategory_id."';";

    $data = $wpdb->get_results($query)[0];
    
    return $data;
}

function getOneClient($client_id)
{
    global $wpdb;

    $query = "SELECT `wptj_clients`.*
            FROM `wptj_clients`
            WHERE `wptj_clients`.`id` = '".$client_id."';";

    $data = $wpdb->get_results($query)[0];
    
    return $data;
}

function update_work($id, $result)
{
    global $wpdb;

    $whereID = [
        'id' => $id 
    ]; // NULL value in WHERE clause.
 
    $data = $wpdb->update($wpdb->prefix . 'projects', $result, $whereID); // Also works in this case.

    return $data;
}

?>