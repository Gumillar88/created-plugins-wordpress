<?php

/** 
* Dev Collaborations Modules
* Hook : admin_menu
*/

function expertise_list($param)
{
    $data = array();

    /*
    ** Edit & status Modules
    */ 
    if(isset($_GET['action']) AND isset($_GET['id']))
    {
        if ($_GET['action'] == 'edit') 
        {
            $result = editHandleExpertises($_GET['id']);

            $data['edit'] = $result;
        }
        else 
        {
            statusHandleExpertises($_GET['id']);
            redirect(admin_url().'admin.php?page='.$_GET['page']);
        }
        
    }
    else {
        if(isset($_POST) AND !empty($_POST))
        {
            $result = createHandleExpertises();

            echo notifications($result);
        }
    }

    $paramTable = $param;
    $data['lists'] = getAllExpertise($paramTable);

    return $data;
}

function createHandleExpertises()
{
    $input = $_POST;
    
    if (isset($_FILES['image']) AND !empty($_FILES['image']['name'])) 
    {
        /*
        ** This is Upload Files with Helper
        */ 
        $upload_file = uploadFiles($_FILES['image']);

        $image      = $upload_file['name'];
        $path       = $upload_file['path'];
    }

    if (isset($_FILES['image_home']) AND !empty($_FILES['image_home']['name'])) 
    {
        /*
        ** This is Upload Files with Helper
        */ 
        $upload_file_home = uploadFiles($_FILES['image_home']);

        $image_home = $upload_file_home['name'];
    }
    
    $data = [
        'title'         => $input['title'],
        'image'         => $image,
        'image_home'    => $image_home,
        'path'          => $path,
        'is_active'     => '0',
        'created'       => date('Y-m-d h:i:s'),
        'updated'       => date('Y-m-d h:i:s'),
    ];

    $result = create_expertise($data);
    
    return $result;
}

function editHandleExpertises($id)
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
            
            $image      = $upload_file['name'];
            $path       = $upload_file['path'];
        }
        else 
        {
            $image  = $input['old_image'];
            $path   = $input['path'];
        }

        if (isset($_FILES['image_home']) AND !empty($_FILES['image_home']['name'])) 
        {
            /*
            ** This is Upload Files with Helper
            */ 
            $upload_file_home = uploadFiles($_FILES['image_home']);
            
            $image_home = $upload_file_home['name'];
        }
        else 
        {
            $image_home  = $input['image_home'];
        }
        
        $update_data = [
            'title'         => $input['title'],
            'image'         => $image,
            'image_home'    => $image_home,
            'path'          => $path,
            'updated'       => date('Y-m-d h:i:s'),
        ];
        
        $result = update_expertise($id, $update_data);

        echo notifications($result);
    }

    $data = getExpertiseByID($id);

    return $data;
}

function statusHandleExpertises($id)
{
    $data = [
        'is_active'     => $_GET['temp'],
        'updated'       => date('Y-m-d h:i:s')
    ];

    $result = update_expertise($id, $data);

    return $result;
}

?>