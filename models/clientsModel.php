<?php
/** 
* Dev Clients Modules
* Hook: admin_menu
*/

function create_client($result)
{
    global $wpdb;

    $table = $wpdb->prefix.'clients';
    
    $data = $wpdb->insert($table,$result);
    
    return $data;
}

function getAllClients($name_table, $andWhere="")
{
    global $wpdb;

    $table = $wpdb->prefix.$name_table;
    $query = "SELECT * FROM ".$table."";

    $result = $wpdb->get_results($query);
    
    return $result;
}

function getClientByID($id)
{
    global $wpdb;

    $query = "SELECT 
            `wptj_clients`.* 
            FROM `wptj_clients` 
            WHERE `wptj_clients`.`id` = '".$id."';"; // AND `wptj_clients`.`is_active` = '1'

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

function update_client($id, $result)
{
    global $wpdb;

    $whereID = [
        'id' => $id 
    ]; // NULL value in WHERE clause.
 
    $data = $wpdb->update($wpdb->prefix . 'clients', $result, $whereID); // Also works in this case.

    return $data;
}

?>