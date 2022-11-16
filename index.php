<?php
/*
Plugin Name: Modules Flourish
Description: This is a Modules From FLOURISH Plugin! This is to create a CMS!
Author: Gumilar L Wijayadi
Version: 1.2.1
*/

define('TEMP_DIR', plugin_dir_path(__FILE__).'/views/');

// echo "<pre>";
// print_r($_GET['page']);
// exit();

include 'config/functions.php';
include 'helpers/appHelper.php';

function dynamicModules()
{
    $result = ['clients', 'works', 'expertise', 'careers', 'collaborations', 'journals', 'peoples']; 

    return $result;
}

if ($_GET['page'] == dynamicModules()[0]) {

    include 'models/'.dynamicModules()[0].'Model.php';
    include 'controllers/'.dynamicModules()[0].'Controller.php';

} elseif ($_GET['page'] == dynamicModules()[1]) {

    include 'models/'.dynamicModules()[1].'Model.php';
    include 'controllers/'.dynamicModules()[1].'Controller.php';
    include 'models/tagsModel.php';

} elseif ($_GET['page'] == dynamicModules()[2]) {

    include 'models/'.dynamicModules()[2].'Model.php';
    include 'controllers/'.dynamicModules()[2].'Controller.php';

} elseif ($_GET['page'] == dynamicModules()[3]) {

    include 'models/'.dynamicModules()[3].'Model.php';
    include 'controllers/'.dynamicModules()[3].'Controller.php';

} elseif ($_GET['page'] == dynamicModules()[4]) {

    include 'models/'.dynamicModules()[4].'Model.php';
    include 'controllers/'.dynamicModules()[4].'Controller.php';

} elseif ($_GET['page'] == dynamicModules()[5]) {

    include 'models/'.dynamicModules()[5].'Model.php';
    include 'controllers/'.dynamicModules()[5].'Controller.php';

} elseif ($_GET['page'] == dynamicModules()[6]) {

    include 'models/'.dynamicModules()[6].'Model.php';
    include 'controllers/'.dynamicModules()[6].'Controller.php';

}

// custom css and js
/*
** Connect JS & CSS in the WORDPRESS
** Hook for Dashboard Admin (admin_enqueue_scripts)
** Hook for Frontend Page (wp_enqueue_scripts)
*/ 
add_action('admin_enqueue_scripts', 'include_script');

function include_script() {
    /*
    ** Bootstrap CSS
    */
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
    echo '<style>body {
            background-color: #F1F1F1 !important;
        }</style>';
    /*
    ** Datatable CSS
    */
    wp_enqueue_style('dt-css', 'https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css');
    wp_enqueue_style('dt-button-css', 'https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css');

    wp_enqueue_script('custom-css', plugins_url('/assets/css/main.css', __FILE__), array(), rand(), TRUE);
    
    /*
    ** Bootstrap JS
    */
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');
   
    /*
    ** Datatable JS
    */    
    wp_enqueue_script('dt-js', 'https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js');
    wp_enqueue_script('dt-button', 'https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js');
    wp_enqueue_script('dt-jszip', 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js');
    wp_enqueue_script('dt-buttons-html', 'https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js');

    wp_enqueue_script('custom-script', plugins_url('/assets/js/script.js', __FILE__), array(), rand(), TRUE);
    
}

?>
