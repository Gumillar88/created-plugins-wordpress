<?php
/** 
* Dev Expertise Modules
* Hook: admin_menu
*/

function create_expertise($result)
{
    global $wpdb;

    $table = $wpdb->prefix.'expertise';
    
    $data = $wpdb->insert($table,$result);
    
    return $data;
}

function getAllExpertise($name_table, $andWhere="")
{
    global $wpdb;

    $table = $wpdb->prefix.$name_table;
    $query = "SELECT * FROM ".$table."";

    $result = $wpdb->get_results($query);
    
    return $result;
}

function getExpertiseByID($id)
{
    global $wpdb;

    $query = "SELECT 
            `wptj_expertise`.* 
            FROM `wptj_expertise` 
            WHERE `wptj_expertise`.`id` = '".$id."';"; // AND `wptj_expertise`.`is_active` = '1'

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

function update_expertise($id, $result)
{
    global $wpdb;

    $whereID = [
        'id' => $id 
    ]; // NULL value in WHERE clause.
 
    $data = $wpdb->update($wpdb->prefix . 'expertise', $result, $whereID); // Also works in this case.

    return $data;
}

?>