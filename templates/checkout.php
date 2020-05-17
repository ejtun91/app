<?php
require_once __DIR__ . '/../model/product.php';

$connection = connect_to_db();
$shoppingCart = getShoppingCart();
$_SESSION['shoppingCart'] = $shoppingCart;
$product = new Product($connection);

if(count($_SESSION['shoppingCart'])>0){ //-----------------------------if there is data more than 0 in session variable do the following -------//

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
    if(isset($_SESSION['user_session'])) { //-----------------------------if user is logged in he can complete the order -------//
        echo "<div class=\"col-xs-4 pull-right \">";
        echo "<div class='cart-row'>";
        if ($item_count > 1) { //-----------------------------if there is more items than 1 display items in plural -------//
            echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
        } else {
            echo "<h4 class='m-b-10px'>Total ({$item_count} item)</h4>";
        }
        echo "<h4>€" . number_format($total, 2, '.', ',') . "</h4>";

        echo "<a href='../templates/place_order.php' class='btn btn-lg btn-success m-b-10px'>";
        echo "<button class=\"btn btn-primary btn-raised\" type=\"submit\">Place Order</button>";
        echo "</a>";
        echo "</div>";
        echo "</div>";
    }else {  //-----------------------------if user is NOT logged in he cannot complete the order -------//
        echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
        echo "PLEASE LOGIN FIRST TO COMPLETE ORDER!";
        echo "</div>";
        echo "</div>";
    }

}
else{ //-----------------------------message displayed if there is no products in cart page -------//
    echo "<div class='col-md-12'>";
    echo "<div class='alert alert-danger'>";
    echo "No products found in your cart!";
    echo "</div>";
    echo "</div>";
}



?>