<?php
//we will be using sessions

$pageTitle = 'list page';

$indexLinkStyle = '';
$aboutLinkStyle = '';
$listLinkStyle = '';
$contactLinkStyle = '';
$sitemapLinkStyle = '';
$adminLinkStyle = 'current_page';

require_once __DIR__ . '/_header.php';


?>

    <div id="wrapper">


        <div id="page-wrapper">

            <div class="container-fluid pt-5">
                <div class="row">
                <div class="form-group p-3">
                    <a href="index.php?action=showNewProductForm"><button type="submit" name="submit" class="btn btn-primary btn-raised">Create Product</button></a>
                </div>
                <div class="form-group p-3">
                    <a href="../templates/logout.php"><button type="submit" name="submit" class="btn btn-outline-danger">Log Out</button></a>
                </div>
                </div>
                <h1 class="page-header">
                    All Products

                </h1>
                <table class="table table-hover table-striped">


                    <thead class="thead-dark">

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Show Details</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">UPDATE</th>
                        <th scope="col">DELETE</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td><a href="index.php?action=show&id=<?= $product['id'] ?>">
                                    (show product)</a></td>
                            <td><?= $product['product_title'] ?></td>
                            <td>
                                <img src="../images/<?= $product['image'] ?>"/>
                            </td>
                            <td><?= $product['description'] ?></td>
                            <td><?= $product['price'] . "$" ?></td>
                            <td>
                                <a href="index.php?action=showUpdateProductForm&id=<?= $product['id'] ?>">
                                    (UPDATE)</a>
                            </td>
                            <td>
                                <a href="index.php?action=delete&id=<?= $product['id'] ?>">
                                    (DELETE)</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>


                    </tbody>
                </table>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


    </div>
    <!-- /#wrapper -->

<?php
require_once __DIR__ . '/_footer.php';
