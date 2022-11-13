<?php
/** 
* Dev Works Modules
* Hook: admin_menu
*/

function create_work($result)
{
    global $wpdb;

    $table = $wpdb->prefix.'works';
    
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