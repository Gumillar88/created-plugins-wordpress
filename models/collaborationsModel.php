<?php
/** 
* Dev Collaborations Modules
* Hook: admin_menu
*/

function create_collaboration($result)
{
    global $wpdb;

    $table = $wpdb->prefix.'collaborations';
    
    $data = $wpdb->insert($table,$result);
    
    return $data;
}

function getAllCollaborations($name_table, $andWhere="")
{
    global $wpdb;

    $table = $wpdb->prefix.$name_table;
    $query = "SELECT * FROM ".$table."";

    $result = $wpdb->get_results($query);
    
    return $result;

}

function getCollaborationByID($id)
{
    global $wpdb;

    $query = "SELECT 
            `wptj_collaborations`.* 
            FROM `wptj_collaborations` 
            WHERE `wptj_collaborations`.`id` = '".$id."';"; // AND `wptj_collaborations`.`is_active` = '1'

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

function update_collaboration($id, $result)
{
    global $wpdb;

    $whereID = [
        'id' => $id 
    ]; // NULL value in WHERE clause.
 
    $data = $wpdb->update($wpdb->prefix . 'collaborations', $result, $whereID); // Also works in this case.

    return $data;
}

?>