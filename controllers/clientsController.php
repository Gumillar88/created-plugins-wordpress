<?php

/** 
* Dev Collaborations Modules
* Hook : admin_menu
*/

function clients_list($param)
{
    $data = array();

    /*
    ** Edit & status Modules
    */ 
    if(isset($_GET['action']) AND isset($_GET['id']))
    {
        if ($_GET['action'] == 'edit') 
        {
            $result = editHandleClients($_GET['id']);

            $data['edit'] = $result;
        }
        else 
        {
            statusHandleClients($_GET['id']);
        }
        
    }
    else {
        if(isset($_POST) AND !empty($_POST))
        {
            $result = createHandleClients();

            echo notifications($result);
        }
    }

    $paramTable = $param;
    $data['lists'] = getAllClients($paramTable);

    return $data;
}

function createHandleClients()
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

    $result = create_client($data);
    
    return $result;
}

function editHandleClients($id)
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

        $result = update_client($id, $update_data);

        echo notifications($result);
    }

    $data = getClientByID($id);

    return $data;
}

function statusHandleClients()
{
    echo "Status Client";
    exit();
}


?>