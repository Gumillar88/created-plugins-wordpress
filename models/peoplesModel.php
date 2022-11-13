<?php
/** 
* Dev Peoples Modules
* Hook: admin_menu
*/

function create_people($result)
{
    global $wpdb;

    $table = $wpdb->prefix.'peoples';
    
    $data = $wpdb->insert($table,$result);
    
    return $data;
}

function getAllPeoples($name_table, $andWhere="")
{
    global $wpdb;

    $table = $wpdb->prefix.$name_table;
    $query = "SELECT * FROM ".$table."";

    $result = $wpdb->get_results($query);
    
    return $result;

}

function getPeopleByID($id)
{
    global $wpdb;

    $query = "SELECT 
            `wptj_peoples`.* 
            FROM `wptj_peoples` 
            WHERE `wptj_peoples`.`id` = '".$id."';"; // AND `wptj_peoples`.`is_active` = '1'

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

function update_people($id, $result)
{
    global $wpdb;

    $whereID = [
        'id' => $id 
    ]; // NULL value in WHERE clause.
 
    $data = $wpdb->update($wpdb->prefix . 'peoples', $result, $whereID); // Also works in this case.

    return $data;
}

?>