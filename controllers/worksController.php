<?php

/** 
* Dev Collaborations Modules
* Hook : admin_menu
*/

function project_list($param)
{
    if ($param == 'works') {
        $param = 'projects';
    }
    
    $paramTable = $param;
    
    $data = array(
        'projects'          => getAllProjects($paramTable),
        'rel_client'        => _getAllClientsData(),
        'rel_categories'    => _getAllCategories(),
        'rel_content_post'  => _getAllContentPOST(),
        'rel_tags'          => _getAllTags(),
    );


    return $data;
}
?>