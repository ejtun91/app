<?php
ob_start();
// start session
if(!isset($_SESSION)){
    session_start();

}




require_once __DIR__ . '/../model/product.php';

$connection = connect_to_db();
$shoppingCart = getShoppingCart();
$_SESSION['shoppingCart'] = $shoppingCart;
$product = new Product($connection);

if(count($_SESSION['shoppingCart'])>0){

    // get the product ids
    $userID = array();
    foreach($_SESSION['shoppingCart'] as $id=>$value){
        array_push($userID, $id);
    }

    $stmt=$product->readByIds($userID);

    $total=0;
    $item_count=0;


    //-----------------------------LOOP Throough the items in the cart and display -------//

    $shoppingCart = getShoppingCart();
    foreach($shoppingCart as $id=>$quantity):

        $product = get_one_product($id);
        $price = $product['price'];
        $subTotal = $price * $quantity;
        $item_count += $quantity;
        $total += $subTotal;
//-----------------------------



        ?>

    <?php
//-----------------------------
    endforeach;
    //-----------------------------
    ?>
<?php
    if(isset($_SESSION['user_session'])) {
        echo "<div class=\"col-xs-4 pull-right \">";
        echo "<div class='cart-row'>";
        if ($item_count > 1) {
            echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
        } else {
            echo "<h4 class='m-b-10px'>Total ({$item_count} item)</h4>";
        }
        echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>";

        echo "<a href='../templates/place_order.php' class='btn btn-lg btn-success m-b-10px'>";
        echo "<button class=\"btn btn-primary btn-raised\" type=\"submit\">Place Order</button>";
        echo "</a>";
        echo "</div>";
        echo "</div>";
    }else {
        echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
        echo "PLEASE LOGIN FIRST TO COMPLETE ORDER!";
        echo "</div>";
        echo "</div>";
    }

}
else{
    echo "<div class='col-md-12'>";
    echo "<div class='alert alert-danger'>";
    echo "No products found in your cart!";
    echo "</div>";
    echo "</div>";
}



?>