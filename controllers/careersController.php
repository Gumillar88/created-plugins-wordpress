<?php

/** 
* Dev Collaborations Modules
* Hook : admin_menu
*/

function career_list($param)
{
    $data = array();

    /*
    ** Edit & status Modules
    */ 
    if(isset($_GET['action']) AND isset($_GET['id']))
    {
        if ($_GET['action'] == 'edit') 
        {
            $result = editHandleCareers($_GET['id']);

            $data['edit'] = $result;
        }
        else 
        {
            statusHandleCareers($_GET['id']);
            redirect(admin_url().'admin.php?page='.$_GET['page']);
        }
        
    }
    else {
        if(isset($_POST) AND !empty($_POST))
        {
            $result = createHandleCareers();

            echo notifications($result);
        }
    }

    $paramTable = $param;
    $data['lists'] = getAllCareer($paramTable);

    return $data;
}

function createHandleCareers()
{
    $input = $_POST;
    
    if (isset($_FILES['image'])) 
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

    $result = create_career($data);
    
    return $result;
}

function editHandleCareers($id)
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
            $path   = $_POST['path'];
        }
        
        $update_data = [
            'title'     => $input['title'],
            'position'  => $input['position'],
            'content'   => $input['content'],
            'image'     => $image,
            'path'      => $path,
            'updated'   => date('Y-m-d h:i:s'),
        ];
        
        $result = update_career($id, $update_data);

        echo notifications($result);
    }

    $data = getCareerByID($id);
    
    return $data;
}

function statusHandleCareers($id)
{
    $data = [
        'is_active'     => $_GET['temp'],
        'updated'       => date('Y-m-d h:i:s')
    ];

    $result = update_career($id, $data);

    return $result;
}
?>