<?php

/** 
* Dev Collaborations Modules
* Hook: admin_menu
*/

function collaborations_list($param)
{
    $data = array();

    /*
    ** Edit & status Modules
    */ 
    if(isset($_GET['action']) AND isset($_GET['id']))
    {
        if ($_GET['action'] == 'edit') 
        {
            $result = editHandleCollaborations($_GET['id']);

            $data['edit'] = $result;
        }
        else 
        {
            statusHandleCollaborations($_GET['id']);
        }
        
    }
    else {
        if(isset($_POST) AND !empty($_POST))
        {
            $result = createHandleCollaborations();

            echo notifications($result);
        }
    }

    $paramTable = $param;
    $data['lists'] = getAllCollaborations($paramTable);

    return $data;
}

function createHandleCollaborations()
{
    $input = $_POST;
    
    if (isset($_FILES['image']) AND !empty($_FILES['image']['name'])) 
    {
        /*
        ** This is Upload Files with Helper
        */ 
        $upload_file = uploadFiles($_FILES['image']);
    }
    
    $data = [
        'title'     => $input['title'],
        'thumb'     => $upload_file['name'],
        'image'     => $upload_file['name'],
        'path'      => $upload_file['path'],
        'is_active' => '0',
        'created'       => date('Y-m-d h:i:s'),
        'updated'       => date('Y-m-d h:i:s'),
    ];

    $result = create_collaboration($data);
    
    return $result;
}

function editHandleCollaborations($id)
{
    if(isset($_POST) AND !empty($_POST))
    {
        $input = $_POST;

        $id = $_POST['id'];

        if (isset($_FILES['image']) AND !empty($_FILES['image']['name'])) 
        {
            /*
            ** This is Upload Files with Helper
            */ 
            $upload_file = uploadFiles($_FILES['image']);
            
            $image  = $upload_file['name'];
            $thumb  = $upload_file['name'];
            $path   = $upload_file['path'];
        }
        else 
        {
            $image  = $input['old_image'];
            $thumb  = $input['thumb'];
            $path   = $input['path'];
        }
        
        $update_data = [
            'title'     => $input['title'],
            'thumb'     => $thumb,
            'image'     => $image,
            'path'      => $path,
            'updated'   => date('Y-m-d h:i:s'),
        ];

        $result = update_collaboration($id, $update_data);

        echo notifications($result);
    }

    $data = getCollaborationByID($id);

    return $data;
}

function statusHandleCollaborations()
{
    echo "Status Collaborations";
    exit();
}

?>