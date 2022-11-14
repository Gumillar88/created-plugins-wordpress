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
    if ($_GET['page'] == 'works' AND $_GET['action'] == 'create') 
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
        if(isset($_POST) AND !empty($_POST))
        {
            $result = editHandleWorks();

            echo notifications($result);
        }

        $result = editRenderWorks($_GET['id']);

        $data['edit'] = $result;
        
        return $data;
    }
    elseif ($_GET['page'] == 'works' AND $_GET['action'] == 'status') 
    {
        $data['status'] = statusHandleWorks($_GET['id']);;

        return $data;
    }
    else 
    {
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
    $data = [
        'contentPost'   => getAllContentPost(),
        'categories'    => getAllCategories(),
        'tags'          => getAllTags(),
        'clients'       => getAllClientData(),
    ];

    return $data;
}

function editRenderWorks($id)
{
    $works = getWorkByID($id);

    $projectcategory = getOneContentPost($works->project_category_id);
    
    $projectsubcategory = getOneCategory($works->project_subcategory_id);

    $projectclient = getOneClient($works->client_id);
    
    $data = [
        'contentPost'   => getAllContentPost(),
        'categories'    => getAllCategories(),
        'tags'          => getAllTags(),
        'clients'       => getAllClientData(),
        'works'         => $works,
        'category_'     => $projectcategory,
        'subcategory_'  => $projectsubcategory,
        'client_'       => $projectclient,
    ];
    
    return $data;
}

function createHandleWorks()
{
    $input = $_POST;
    
    $upload_file = array();

    /*
    ** Upload Image Array Name Image
    */ 
    if (isset($_FILES['image']) AND !empty($_FILES['image']['name'])) 
    {
        
        foreach($_FILES['image'] as $file)
        {
            $svg[] = $file['svg'];
            $gif[] = $file['gif'];
        }

        if ($svg) {
            $svgimage = uploadFilesArray($svg);
        }
        else {
            $svgimage = array();
        }

        if($gif) {
            $gifimage = uploadFilesArray($gif);
        }
        else {
            $gifimage = array();
        }    
    }
    
    /*
    ** Upload hero_image
    */ 
    if (isset($_FILES['hero_image']) AND !empty($_FILES['hero_image']['name'])) 
    {
        /*
        ** This is Upload Files with Helper
        */ 
        $imagehero = uploadFiles($_FILES['hero_image']);
    }

    /*
    ** Upload Image second_image
    */ 
    if (isset($_FILES['second_image']) AND !empty($_FILES['second_image']['name'])) 
    {
        /*
        ** This is Upload Files with Helper
        */ 
        $secondimagename = uploadFiles($_FILES['second_image']);
    }
    
    /*
    ** Upload Third Image Array
    */ 
    if (isset($_FILES['third_image']) AND !empty($_FILES['third_image']['name'])) 
    {
        foreach($_FILES['third_image'] as $file)
        {
            $first[]    = $file['first'];
            $second[]   = $file['second'];
            $third[]    = $file['third'];
        }

        if ($first) {
            $firstimage = uploadFilesArray($first);
        }
        else {
            $firstimage = array();
        }

        if ($second) {
            $secondimage = uploadFilesArray($second);
        }
        else {
            $secondimage = array();
        }

        if ($third) {
            $thirdimage = uploadFilesArray($third);
        }
        else {
            $thirdimage = array();
        }
    }

    /*
    ** Upload Last Image
    */ 
    if (isset($_FILES['last_image']) AND !empty($_FILES['last_image']['name'])) 
    {
        /*
        ** This is Upload Files with Helper
        */ 
        $imagelast = uploadFiles($_FILES['last_image']);
    }

    $json_image = [
        "svg"   => $svgimage['path']."/".$svgimage['name'],
        "gif"   => $gifimage['path']."/".$gifimage['name'],
    ];

    $hero_name = $imagehero['name'];
    $second_name = $secondimagename['name'];
    $json_third_image = [
        "first"   => $firstimage['path']."/".$firstimage['name'],
        "second"  => $secondimage['path']."/".$secondimage['name'],
        "third"   => $thirdimage['path']."/".$thirdimage['name'],
    ];
    $last_name = $imagelast['name'];

    $tag_id = json_encode($input['tag_id']);

    $image_input = json_encode($json_image);
    $hero_image_name = $hero_name;
    $second_image_name = $second_name;
    $last_image_name = $last_name;
    $third_image_input = json_encode($json_third_image);

    $path = wp_upload_dir();

    $data = [
        'project_category_id' => $input['project_category_id'],
        'project_subcategory_id' => $input['project_subcategory_id'],
        'client_id' => $input['client_id'],
        'tag_id' => $tag_id,
        'title' => $input['title'],
        'short_description' => $input['short_description'],
        'description' => $input['description'],
        'slug' => str_replace(" ", "-", $input['title']),
        'image' => $image_input,
        'hero_image'                => $hero_image_name,
        'second_title'              => $input['second_title'],
        'second_image'              => $second_image_name,
        'second_description'        => $input['second_description'],
        'last_description'          => $input['last_description'],
        'last_image'                => $last_image_name,
        'third_image'               => $third_image_input,
        'path'                      => $path['url'],
        'created'       => date('Y-m-d h:i:s'),
        'updated'       => date('Y-m-d h:i:s'),
    ];

    $result = create_work($data);
    
    return $result;
}

function editHandleWorks()
{
    $input = $_POST;

    $id = $input['id'];
    /*
    ** Upload Image Array Name Image
    */ 
    if (isset($_FILES['image']) AND !empty($_FILES['image']['name'])) 
    {
        
        foreach($_FILES['image'] as $file)
        {
            $svg[] = $file['svg'];
            $gif[] = $file['gif'];
        }

        if ($svg) {
            $svgimage = uploadFilesArray($svg);
        }
        else {
            $svgimage = array();
        }

        if($gif) {
            $gifimage = uploadFilesArray($gif);
        }
        else {
            $gifimage = array();
        }    

        $json_image = [
            "svg"   => $svgimage['path']."/".$svgimage['name'],
            "gif"   => $gifimage['path']."/".$gifimage['name'],
        ];
    }
    else 
    {
        $svgimage = $input['image_old']['svg'];
        $gifimage = $input['image_old']['gif'];

        $json_image = [
            "svg"   => $input['image_old']['svg'],
            "gif"   => $input['image_old']['gif'],
        ];
    }

    /*
    ** Upload hero_image
    */ 
    if (isset($_FILES['hero_image']) AND !empty($_FILES['hero_image']['name'])) 
    {
        /*
        ** This is Upload Files with Helper
        */ 
        $imagehero = uploadFiles($_FILES['hero_image']);

        $hero_name = $imagehero['name'];
    }
    else 
    {
        $imagehero = $input['hero_image_old'];

        $hero_name = $imagehero;
    }

    /*
    ** Upload Image second_image
    */ 
    if (isset($_FILES['second_image']) AND !empty($_FILES['second_image']['name'])) 
    {
        /*
        ** This is Upload Files with Helper
        */ 
        $secondimagename = uploadFiles($_FILES['second_image']);

        $second_name = $secondimagename['name'];
    }
    else 
    {
        $secondimage = $input['second_image_old'];

        $second_name = $secondimage;
    }

    /*
    ** Upload Third Image Array
    */ 
    if (isset($_FILES['third_image']) AND !empty($_FILES['third_image']['name'])) 
    {
        foreach($_FILES['third_image'] as $file)
        {
            $first[]    = $file['first'];
            $second[]   = $file['second'];
            $third[]    = $file['third'];
        }

        if ($first) {
            $firstimage = uploadFilesArray($first);
        }
        else {
            $firstimage = array();
        }

        if ($second) {
            $secondimage = uploadFilesArray($second);
        }
        else {
            $secondimage = array();
        }

        if ($third) {
            $thirdimage = uploadFilesArray($third);
        }
        else {
            $thirdimage = array();
        }

        $json_third_image = [
            "first"   => $firstimage['path']."/".$firstimage['name'],
            "second"  => $secondimage['path']."/".$secondimage['name'],
            "third"   => $thirdimage['path']."/".$thirdimage['name'],
        ];
    }
    else 
    {
        $firstimage = $input['third_image_old']['first'];
        $secondimage = $input['third_image_old']['second'];
        $thirdimage = $input['third_image_old']['third'];

        $json_third_image = [
            "first"   => $firstimage,
            "second"  => $secondimage,
            "third"   => $thirdimage,
        ];
    }

    /*
    ** Upload Last Image
    */ 
    if (isset($_FILES['last_image']) AND !empty($_FILES['last_image']['name'])) 
    {
        /*
        ** This is Upload Files with Helper
        */ 
        $imagelast = uploadFiles($_FILES['last_image']);

        $last_name = $imagelast['name'];
    }
    else 
    {
        $imagelast = $input['last_image_old'];   

        $last_name = $imagelast;
    }

    $tag_id = json_encode($input['tag_id']);

    $image_input = json_encode($json_image);
    $hero_image_name = $hero_name;
    $second_image_name = $second_name;
    $last_image_name = $last_name;
    $third_image_input = json_encode($json_third_image);

    $path = wp_upload_dir();

    $data = [
        'project_category_id'       => $input['project_category_id'],
        'project_subcategory_id'    => $input['project_subcategory_id'],
        'client_id'                 => $input['client_id'],
        'tag_id'                    => $tag_id,
        'title'                     => $input['title'],
        'short_description'         => $input['short_description'],
        'description'               => $input['description'],
        'image'                     => $image_input,
        'hero_image'                => $hero_image_name,
        'second_title'              => $input['second_title'],
        'second_image'              => $second_image_name,
        'second_description'        => $input['second_description'],
        'last_description'          => $input['last_description'],
        'last_image'                => $last_image_name,
        'third_image'               => $third_image_input,
        'path'                      => $path['url'],
        'created'                   => date('Y-m-d h:i:s'),
        'updated'                   => date('Y-m-d h:i:s'),
    ];

    $result = update_work($id, $data);
    
    return $result;
}

function statusHandleWorks()
{
    echo "Status Works";
    exit();
}

?>