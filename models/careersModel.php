<?php
/** 
* Dev Careers Modules
* Hook: admin_menu
*/

function create_career($result)
{
    global $wpdb;

    $table = $wpdb->prefix.'careers';
    
    $data = $wpdb->insert($table,$result);
    
    return $data;
}

function getAllCareer($name_table, $andWhere="")
{
    global $wpdb;

    $table = $wpdb->prefix.$name_table;
    $query = "SELECT * FROM ".$table."";

    $result = $wpdb->get_results($query);
    
    return $result;

}

function getCareerByID($id)
{
    global $wpdb;

    $query = "SELECT 
            `wptj_careers`.* 
            FROM `wptj_careers` 
            WHERE `wptj_careers`.`id` = '".$id."';"; // AND `wptj_careers`.`is_active` = '1'

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

function update_career($id, $result)
{
    global $wpdb;

    $whereID = [
        'id' => $id 
    ]; // NULL value in WHERE clause.
 
    $data = $wpdb->update($wpdb->prefix . 'careers', $result, $whereID); // Also works in this case.

    return $data;
}

?>