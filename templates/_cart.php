<?php
ob_start();
// start session
if(!isset($_SESSION)){
    session_start();
}
$pageTitle = 'cart';
require_once __DIR__ . '/_header.php';
?>
<div class="container pt-5">
<hr>
    <h2>Cart Totals</h2>

    <table class="table class="table table-striped>
        <thead class="thead-dark">
        <tr>
        <th>Product</th>
            <th>Image</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>sub-total</th>
        <th>(remove)</th>
    </tr>
        </thead>
    <?php
    //-----------------------------LOOP Throough the items in the cart and display -------//

    $total = 0;


    $shoppingCart = getShoppingCart();
    foreach($shoppingCart as $id=>$quantity):

        $product = get_one_product($id);
        $price = $product['price'];
        $subTotal = $price * $quantity;
        $total += $subTotal;
//-----------------------------
        ?>
        <tr>
            <td><?= $product['product_title'] ?></td>
            <td>
                <img src="../images/<?= $product['image'] ?>"/>
            </td>
            <td>&euro; <?= $price ?></td>
            <td><?= $quantity ?></td>
            <td><?= $subTotal ?></td>
            <td><a href="index.php?action=removeFromCart&id=<?= $product['id'] ?>">(remove from cart)</a></td>

        </tr>

    <?php
//-----------------------------
    endforeach;
    //-----------------------------
    ?>

    <tr>
        <td colspan="3">Total</td>
        <td>&euro; <?= $total ?></td>
    </tr>

</table>

<a href="index.php?action=emptyCart">EMPTY CART</a>
<br>
<a href="index.php?action=list">Back to shop</a>
<br>
<?php require_once __DIR__ . './checkout.php'; ?>
</div>
