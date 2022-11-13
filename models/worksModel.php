<?php
/** 
* Dev Collaborations Modules
* Hook : admin_menu
*/
function getAllProjects($name_table, $andWhere="")
{
    global $wpdb;

    $table = $wpdb->prefix.$name_table;
    $query = "SELECT * FROM ".$table."";

    $result = $wpdb->get_results($query);
    
    return $result;

}

?>