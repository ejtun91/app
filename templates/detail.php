<?php

//-------- page header -------------------
$pageTitle = 'show details of one product';
require_once __DIR__ . '/_header.php';
//----------------------------------------
?>

<!-- Page Content -->
<div class="container pt-5">

    <div class="row">

        <div class="col-lg-3">
            <h1 class="my-4">PCBuildGuide</h1>
            <div class="list-group">
                <a href="index.php?action=addToCart&id=<?= $product['id'] ?>"><button type="submit" name="cart" class="btn btn-primary btn-raised btn-block"><i class="fa fa-shopping-cart"></i> ADD TO CART
                    </button></a>
            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div class="card mt-4">
                <img src="../images/<?= $product['image'] ?>"/>
                <div class="card-body">
                    <h3 class="card-title"><?= $product['product_title'] ?></h3>
                    <h4><?= $product['price'] . "$" ?></h4>
                    <p class="card-text"><?= $product['description'] ?></p>
                    <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                    4.0 stars
                </div>
            </div>
            <!-- /.card -->

            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Product Reviews
                </div>
                <div class="card-body">
                    <p></p>
                    <small class="text-muted"></small>
                    <hr>
                    <a href="#" class="btn btn-success">Leave a Review</a>
                </div>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

    </div>

</div>

<?php require_once '_footer.php' ?>