<?php

/** 
* Dev Peoples Modules
* Hook : admin_menu
*/

function peoples_list($param)
{
    $data = array();

    /*
    ** Edit & status Modules
    */ 
    if(isset($_GET['action']) AND isset($_GET['id']))
    {
        if ($_GET['action'] == 'edit') 
        {
            $result = editHandlePeoples($_GET['id']);

            $data['edit'] = $result;
        }
        else 
        {
            statusHandlePeoples($_GET['id']);
        }
        
    }
    else {
        if(isset($_POST) AND !empty($_POST))
        {
            $result = createHandlePeoples();

            echo notifications($result);
        }
    }

    $paramTable = $param;
    $data['lists'] = getAllPeoples($paramTable);

    return $data;
}

function createHandlePeoples()
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

    $result = create_people($data);
    
    return $result;
}

function editHandlePeoples($id)
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
            $path   = $upload_file['path'];
        }
        else 
        {
            $image  = $input['old_image'];
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
        
        $result = update_people($id, $update_data);

        echo notifications($result);
    }

    $data = getPeopleByID($id);

    return $data;
}

function statusHandlePeoples()
{
    echo "Status people";
    exit();
}

?>