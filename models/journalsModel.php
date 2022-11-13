<?php
/** 
* Dev journals Modules
* Hook: admin_menu
*/

function create_journal($result)
{
    global $wpdb;

    $table = $wpdb->prefix.'journals';
    
    $data = $wpdb->insert($table,$result);
    
    return $data;
}

function getAllJournals($name_table, $andWhere="")
{
    global $wpdb;

    $table = $wpdb->prefix.$name_table;
    $query = "SELECT * FROM ".$table."";

    $result = $wpdb->get_results($query);
    
    return $result;

}

function getJournalByID($id)
{
    global $wpdb;

    $query = "SELECT 
            `wptj_journals`.* 
            FROM `wptj_journals` 
            WHERE `wptj_journals`.`id` = '".$id."';"; // AND `wptj_journals`.`is_active` = '1'

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

function update_journal($id, $result)
{
    global $wpdb;

    $whereID = [
        'id' => $id 
    ]; // NULL value in WHERE clause.
 
    $data = $wpdb->update($wpdb->prefix . 'journals', $result, $whereID); // Also works in this case.

    return $data;
}

?>