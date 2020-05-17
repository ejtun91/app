<?php

$pageTitle = 'CART';
require_once __DIR__ . '/_header.php';
?>
<div class="container pt-5">
    <hr>
    <h2>Cart Totals</h2>

    <table class="table table table-striped">
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
        foreach ($shoppingCart as $id => $quantity):
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
                <td><a href="index.php?action=removeFromCart&id=<?= $product['id'] ?>">
                        <button type="submit" name="submit" class="btn btn-danger btn-raised">REMOVE FROM CART</button>
                    </a></td>

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
    <div class="container">
        <div class="row">
            <div class="form-group pr-1">

                <a href="index.php?action=emptyCart">
                    <button type="submit" name="submit" class="btn btn-primary btn-raised">EMPTY CART</button>
                </a>
            </div>
            <div class="form-group">
                <a href="index.php?action=list">
                    <button type="submit" name="submit" class="btn btn-primary btn-raised">BACK TO SHOP</button>
                </a>
            </div>
        </div>
    </div>
    <br>
    <?php require_once __DIR__ . './checkout.php'; ?>
</div>
