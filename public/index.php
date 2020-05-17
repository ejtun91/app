<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../src/main_controller.php';
require_once __DIR__ . '/../src/model_functions.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DB_HOST', 'localhost');
define('DB_NAME', 'project');
define('DB_USER', 'root');
define('DB_PASS', '');



//get action GET parameter(if it exists)
$action = filter_input(INPUT_GET, 'action');



//based on value (if any) of 'action' decide which template to output
switch ($action){
    case 'about':
        about_action();
        break;
    case 'contact':
        contact_action();
        break;
    case 'list':
        list_action();
        break;
    case 'sitemap':
        sitemap_action();
        break;
    case 'login':
        login_action();
        break;
    case 'register':
        register_action();
        break;
    case 'admin':
        admin_action();
        break;
    case 'checkout':
        checkout();
        break;
    case 'createNewProduct':
        create_product_action();
        break;
    case 'delete':
        delete_product_action();
        break;
    case 'showUpdateProductForm':
        show_update_product_form_action();
        break;
    case 'showNewProductForm':
        show_new_product_form_action();
        break;
    case 'updateProduct':
        update_product_action();
        break;
    case 'updateUser':
        update_user_action();
        break;
//for admin users if you wish
    case 'show':
        show_one_product_action();
        break;
    case 'showUserAction':
        show_one_user_action();
        break;
    case 'showUser':
        show_update_user_form_action();
        break;
    case 'addToCart':
        addToCart();
        break;
    case 'removeFromCart':
        removeFromCart();
        break;
    case 'emptyCart':
        forgetSession();
        break;
    case 'cart':
        cart();
        break;
    default:
        //default is home page ('index' action)
        index_action();

}