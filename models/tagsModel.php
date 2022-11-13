<?php
/** 
* Dev Collaborations Modules
* Hook : admin_menu
*/
function getAllTags()
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

function getByIdTags($tagsID)
{
    global $wpdb;

    $ids = str_replace(array("[","]"), "", $tagsID);
    $query = "SELECT 
            `wptj_term_taxonomy`.*,
            `wptj_terms`.`name`
            FROM `wptj_term_taxonomy`
            INNER JOIN `wptj_terms` ON `wptj_terms`.`term_id` = `wptj_term_taxonomy`.`term_id`
            WHERE `wptj_term_taxonomy`.`taxonomy` = 'post_tag' AND `wptj_term_taxonomy`.`term_id` IN (".$ids.");";
            
    $result = $wpdb->get_results($query);


    foreach ($result as $item)
    {
        $data[] = $item->description;
    }

    return $data;
}

?>