<?php

$pageTitle = 'list page';

$indexLinkStyle = '';
$aboutLinkStyle = '';
$listLinkStyle = 'current_page';
$contactLinkStyle = '';
$sitemapLinkStyle = '';

require_once __DIR__ . '/_header.php';



?>




     <!--   <?php /*foreach ($products as $product): */?>
            <tr>
                <td>
                    <a href="index.php?action=show&id=<?/*= $product['id'] */?>">
                        (detail page)</a>
                </td>
                <td>
                    <?/*= $product['id'] */?>
                </td>
                <td>
                    <?/*= $product['description'] */?>
                </td>
                <td>
                    <?/*= $product['price'] */?>
                </td>
                <td>
                <td><img src ="<?/*=  $product['image'] */?>"</td>
                <td>
                    <a href="index.php?action=showUpdateProductForm&id=<?/*= $product['id'] */?>">
                        (UPDATE)</a>
                </td>
                <td>
                    <a href="index.php?action=deleteProduct&id=<?/*= $product['id'] */?>">
                        (DELETE)</a>
                </td>
            </tr>
        --><?php /*endforeach; */?>
    </table>


    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">PC Part Picker</h1>
            <p class="lead text-muted mb-0">Building your own PC might sound intimidating — but if you're a gamer, we know the thought has crossed your mind at least once. After all, a custom-built gaming rig is the only surefire way to get exactly what you want, exactly the way you want it. When you control everything that goes into your PC from the power supply up, you know that you'll be able to play the games you want, at the framerates you want, without sacrificing performance. Building your own PC is easier than you think (not to mention fun and rewarding). It's also the perfect next step if you're already a gamer, because a home-built PC lets you keep the door open for upgrades — as technology changes, as your gaming tastes and needs change, or as your budget allows.</p>
        </div>
    </section>

    <div class="container pb-5">
        <div class="row">
            <?php $shoppingCart = getShoppingCart();

            ?>

            <div class="col">
                <div class="row">
                    <?php foreach ($products as $product): ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <a href="index.php?action=show&id=<?= $product['id'] ?>">
                            <img class="card-img-top" src="../images/<?= $product['image'] ?>"
                                 alt="Card image cap"></a>
                            <div class="card-body">
                                <h4 class="card-title"><a href="index.php?action=show&id=<?= $product['id'] ?>" title="View Product"><?= $product['product_title'] ?></a>
                                </h4>
                                <p class="card-text desc"><?= $product['description'] ?></p>
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-outline-info btn-block"><?= $product['price'] . "$"?></button>
                                    </div>



                                            <a href="index.php?action=addToCart&id=<?= $product['id'] ?>">
                                                <button class="btn btn-primary btn-raised" type="submit" name="add">ADD TO CART</button>
                                            </a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>


                </div>
            </div>

        </div>
    </div>

<div class="container-fluid px-0">
<?php

require_once __DIR__ . '/_footer.php'; ?>
</div>