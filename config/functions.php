<?php 

/** 
* Dev Collaborations Modules
* Hook : admin_menu
*/

// Client Page
add_action('admin_menu', 'menuClients');

function menuClients()
{
    add_menu_page(
		'Clients list', // Page title
		'Clients list', // Menu title
		'manage_options', // capability
        'clients',
		'callbackClient', // Callback for view html
		'dashicons-networking', // menu icon
		5 // position menu
	);
}

function callbackClient()
{
    include TEMP_DIR.'clients/lists.php';
}

// Create Client Page
add_action('admin_menu', 'createClients');
// Create Client
function createClients()
{
	add_menu_page(
		'Create Clients', // Page title
		'', // Menu title
		'manage_options', // capability
        'create_clients',
		'callbackCreateClient', // Callback for view html
		'', // menu icon
		'' // position menu
	);
}

function callbackCreateClient()
{
    include TEMP_DIR.'clients/create.php';
}

// Works page
add_action('admin_menu', 'menuWorks');
function menuWorks()
{
    add_menu_page(
		'Work list', // Page title
		'Work list', // Menu title
		'manage_options', // capability
        'works',
		'callbackWorks', // Callback for view html
		'dashicons-share-alt', // menu icon
		5 // position menu
	);
}

function callbackWorks()
{
    include TEMP_DIR.'works/lists.php';
}

// Collaborations Page
add_action('admin_menu', 'menuCollaborations');
function menuCollaborations()
{
    add_menu_page(
		'Collaborations list', // Page title
		'Collaborations list', // Menu title
		'manage_options', // capability
        'collaborations',
		'callbackCollaborations', // Callback for view html
		'dashicons-share', // menu icon
		5 // position menu
	);
}

function callbackCollaborations()
{
    include TEMP_DIR.'collaborations/lists.php';
}

// People Page
add_action('admin_menu', 'menuPeople');
function menuPeople()
{
    add_menu_page(
		'People list', // Page title
		'People list', // Menu title
		'manage_options', // capability
        'peoples',
		'callbackPeople', // Callback for view html
		'dashicons-nametag', // menu icon
		5 // position menu
	);
}

function callbackPeople()
{
    include TEMP_DIR.'peoples/lists.php';
}

// Expertise Page
add_action('admin_menu', 'menuExpertise');
function menuExpertise()
{
    add_menu_page(
		'Expertise list', // Page title
		'Expertise list', // Menu title
		'manage_options', // capability
        'expertise',
		'callbackExpertise', // Callback for view html
		'dashicons-art', // menu icon
		5 // position menu
	);
}

function callbackExpertise()
{
    include TEMP_DIR.'expertise/lists.php';
}

// Journals Page
add_action('admin_menu', 'menuJournals');
function menuJournals()
{
    add_menu_page(
		'Journals list', // Page title
		'Journals list', // Menu title
		'manage_options', // capability
        'journals',
		'callbackJournals', // Callback for view html
		'dashicons-format-aside', // menu icon
		5 // position menu
	);
}

function callbackJournals()
{
    include TEMP_DIR.'journals/lists.php';
}

// Career Page
add_action('admin_menu', 'menuCareers');
function menuCareers()
{
    add_menu_page(
		'Careers list', // Page title
		'Careers list', // Menu title
		'manage_options', // capability
        'careers',
		'callbackCareers', // Callback for view html
		'dashicons-megaphone', // menu icon
		5 // position menu
	);
}

function callbackCareers()
{
    include TEMP_DIR.'careers/lists.php';
}