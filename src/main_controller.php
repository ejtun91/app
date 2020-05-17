<?php


function index_action()
{
    $pageTitle = 'home page';
    require_once __DIR__ . '/../templates/index.php';
}

function about_action()
{
    require_once __DIR__ . '/../templates/about.php';
}


function list_action()
{

    // 1. get connection
    $connection = connect_to_db();

    // 2. get all products
    $products = get_all_products($connection);

    require_once __DIR__ . '/../templates/list.php';
}

function contact_action()
{
    require_once __DIR__ . '/../templates/contact.php';
}



function sitemap_action()
{
    require_once __DIR__ . '/../templates/sitemap.php';
}

function login_action()
{
    // 1. get connection
    $connection = connect_to_db();
    $users = get_all_users($connection);

    require_once __DIR__ . '/../templates/login.php';
}

function register_action()
{
    require_once __DIR__ . '/../templates/register.php';
}

function admin_action()
{

    // 1. get connection
    $connection = connect_to_db();

    // 2. get all products
    $products = get_all_products($connection);

    require_once __DIR__ . '/../templates/admin_site.php';
}



/***************/


require_once __DIR__ . '/../model/dbconfig.php';


//this class will hold all the following functions
//we will create a new instance each time the main page is opened
class USER
{

    private $conn;

//***********create a construtor for the connection
    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

//*********this function when called wiLL RUN a query on the database
    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }


//******************************This function will verify the user that is attempting to log in

    public function checkLogin($uname, $umail, $upass)
    {

        $_SESSION['username'] = $uname;


        try {
            $stmt = $this->conn->prepare("SELECT id, username, email, password FROM users WHERE username=:uname OR email=:umail ");
            $stmt->execute(array(':uname' => $uname, ':umail' => $umail));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() == 1) {
                if (password_verify($upass, $userRow['password'])) {
                    $_SESSION['user_session'] = $userRow['id'];
                  //  $_SESSION['username'] = $userRow['username'];
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function checkAdminLogin($uname, $umail, $upass)
    {
        $_SESSION['username'] = $uname;
        try {
            $stmt = $this->conn->prepare("SELECT id, admin_username, admin_email, admin_password, user_role FROM admin_users WHERE admin_username=:uname OR admin_email=:umail ");
            $stmt->execute(array(':uname' => $uname, ':umail' => $umail));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() == 1) {
                if ($upass == $userRow['admin_password']) {
                    $_SESSION['user_session'] = $userRow['id'];
                    $_SESSION['user_role'] = $userRow['user_role'];
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

//**********************************************when this is called it will redirect the user to the chosen directort in the method call
    public function redirect($url)
    {
        header("Location: $url");
    }

    //**************************************************Register a new user************************************************
    public function register($uname, $umail, $upass)
    {
        try {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);

            $stmt = $this->conn->prepare("INSERT INTO users(username,email,password) 
		                                               VALUES(:uname, :umail, :upass)");

            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":umail", $umail);
            $stmt->bindparam(":upass", $new_password);

            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}


/**************************************************ADMIN SITE**********************************/

function delete_product_action() // delete product function
{
    $connection = connect_to_db();

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $success = delete_product($connection, $id); //calling delete_product function

    if($success){
        $message = 'SUCCESS - product with id = ' . $id . ' was deleted';
    } else {
        $message = 'sorry, product with id = ' . $id . ' could not be deleted';
    }

    require_once __DIR__ . '/../templates/message.php'; // page is getting displayed after function is called


}

function show_update_product_form_action()
{
    $connection = connect_to_db();

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $product = get_one_product($id);

    require_once __DIR__ . '/../templates/update_product_form.php';
}

function show_update_user_form_action()
{
    $connection = connect_to_db();

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $user = get_one_user($id);

    require_once __DIR__ . '/../templates/view_profile.php';
}


function update_product_action()
{
    $connection = connect_to_db();

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT);

    $success = update_product($connection, $id, $description, $price);

    if($success){
        $message = "SUCCESS -  product with ID = $id updated";
    } else {
        $message = 'sorry, there was a problem updated the product';
    }

    require_once __DIR__ . '/../templates/message.php';
}

function update_user_action()
{
    $connection = connect_to_db();

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $new_password = password_hash($password, PASSWORD_DEFAULT);

    $success = change_password($connection, $id, $username, $new_password, $email);

    if($success){
        $message = "SUCCESS -  product with ID = $id updated";
    } else {
        $message = 'sorry, there was a problem updated the product';
    }

    require_once __DIR__ . '/../templates/message.php';
}


function show_one_product_action()
{
    $connection = connect_to_db();

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $product = get_one_product($id);

    if(null == $product){
        $message = 'sorry, no product with id = ' . $id . ' could be retrieved from the database';

        // output the detail of product in HTML table
        require_once __DIR__ . '/../templates/message.php';
    } else {
        // output the detail of product in HTML table
        require_once __DIR__ . '/../templates/detail.php';
    }
}

function show_one_user_action()
{
    $connection = connect_to_db();
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $user = get_one_user($id);

    if(null == $user){
        $message = 'sorry, no product with id = ' . $id . ' could be retrieved from the database';

        // output the detail of product in HTML table
        require_once __DIR__ . '/../templates/message.php';
    } else {
        // output the detail of product in HTML table
        require_once __DIR__ . '/../templates/view_profile.php';
    }
}

function create_product_action()
{

    $product_image = $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $_FILES["image"]["name"]);

    $connection = connect_to_db();

    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $product_category_id = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_NUMBER_FLOAT);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT);
    $stock = filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_NUMBER_INT);
    $restock = filter_input(INPUT_POST, 'restock', FILTER_SANITIZE_NUMBER_INT);

    $success = create_product($connection,$title, $product_category_id, $description, $price, $product_image, $stock, $restock);

    if($success){
        $id = $connection->lastInsertId();
        $message = "SUCCESS - new product with ID = $id created";
    } else {
        $message = 'sorry, there was a problem creating new product';
    }

    require_once __DIR__ . '/../templates/message.php';
}

function show_new_product_form_action()
{
    require_once __DIR__ . '/../templates/new_product_form.php';
}

/**************************************************CART - CHECKOUT**********************************/

function indexAction()
{
    $connection = connect_to_db();

    $shoppingCart = getShoppingCart();
    $products = get_all_products($connection);

    require_once __DIR__ . '/../templates/list.php';
}
function addToCart()
{
    // get the ID of product to add to cart
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // get the cart array
    $shoppingCart = getShoppingCart();

    // default is old total is zero
    $oldTotal = 0;

    // if quantity found in cart array, then use this
    if(isset($shoppingCart[$id])){
        $oldTotal = $shoppingCart[$id];
    }

    // store old total + 1 as new quantity into cart array
    $shoppingCart[$id] = $oldTotal + 1;

    // store new  array into SESSION
    $_SESSION['shoppingCart'] = $shoppingCart;

    require_once __DIR__ . '/../templates/_cart.php';
    // redirect display page

}
//*******************************************REMOVE FROM SESSION?/CART*****************************************//
function removeFromCart()
{
    // get the ID of product to add to cart
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $name = isset($_GET['product_title']) ? $_GET['product_title'] : "";
    // get the cart array
    $shoppingCart = getShoppingCart();

    // remove entry for this ID
    unset($shoppingCart[$id]);

    // store new  array into SESSION
    $_SESSION['shoppingCart'] = $shoppingCart;

    // redirect display page
    indexAction();
}

function getShoppingCart()
{
    if (isset($_SESSION['shoppingCart'])){
        return $_SESSION['shoppingCart'];
    } else {
        return [];
    }
}
//************************************************************************************//

function forgetSession()
{
    $_SESSION['shoppingCart'] = null;

    // redirect to display text
    indexAction();
}

/**
 * advice on how to kill session from PHP.net
 * URL: http://php.net/manual/en/function.session-destroy.php
 */
function killSession()
{
    // (1) Unset all of the session variables.
    $_SESSION = [];

    // (2) If it is desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get('session.use_cookies')){
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }

    // (3) destroy the session.
    session_destroy();
}

function checkout(){

    $connection = connect_to_db();
    $shoppingCart = getShoppingCart();
    $product = get_all_products($connection);

    require_once __DIR__. '/../templates/checkout.php';
}

function cart(){

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $shoppingCart = getShoppingCart();
    if(isset($shoppingCart[$id])){
        $oldTotal = $shoppingCart[$id];
    }

    $_SESSION['shoppingCart'] = $shoppingCart;

    require_once __DIR__ . '/../templates/_cart.php';
}

