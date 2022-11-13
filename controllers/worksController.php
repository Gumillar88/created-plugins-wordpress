<?php

/** 
* Dev Works Modules
* Hook: admin_menu
*/

function project_list($param)
{
    $data = array();

    if ($param == 'works') {
        $param = 'projects';
    }

    /*
    ** Create, Edit & status Modules
    */ 
    if(isset($_GET['page']) AND isset($_GET['action']) AND isset($_GET['id']))
    {
        if ($_GET['page'] == 'works' AND $_GET['action'] == 'edit') 
        {
            $result = editHandleWorks($_GET['id']);

            $data['edit'] = $result;
            return $data;
        }
        elseif ($_GET['page'] == 'works' AND $_GET['action'] == 'create') 
        {
            if(isset($_POST) AND !empty($_POST))
            {
                $result = createHandleWorks();

                echo notifications($result);
            }

            $result = createRenderWorks();

            $data['create'] = $result;

            return $data;
        }
        elseif ($_GET['page'] == 'works' AND $_GET['action'] == 'edit') 
        {

            $data['edit'] = '';

            return $data;
        }
        elseif ($_GET['page'] == 'works' AND $_GET['action'] == 'status') 
        {
            $data['status'] = statusHandleWorks($_GET['id']);;

            return $data;
        }
        else 
        {
            $data = 'Empty';

            return $data;
        }
        
    }
    else {
        $paramTable = $param;
        $result_works = array(
            'projects'          => getAllProjects($paramTable),
            'rel_client'        => _getAllClientsData(),
            'rel_categories'    => _getAllCategories(),
            'rel_content_post'  => _getAllContentPOST(),
            'rel_tags'          => _getAllTags(),
        );

        $data['lists'] = $result_works;

        return $data;
    }
}

function createRenderWorks()
{
    echo "<pre>";
    print_r("This is a render page works");
}

function createHandleWorks()
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

    $result = create_journal($data);
    
    return $result;
}

function editHandleWorks($id)
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

        $result = update_work($id, $update_data);

        echo notifications($result);
    }

    $data = getWorkByID($id);

    return $data;
}

function statusHandleWorks()
{
    echo "Status Works";
    exit();
}

?>