<?php
//-------- page header -------------------
$pageTitle = 'new product form';
require_once __DIR__ . '/_header.php';
//----------------------------------------
?>


<div class="container pt-5">
<h1>Update product</h1>

<form action="index.php?action=updateProduct" method="POST">
    <!-- ****** send ID, but don't let user see this ***** -->
    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <div class="form-group">
        <label for="description" class="bmd-label-floating">Description</label>
        <textarea type="text" class="form-control" name="description"><?= $product['description'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="price" class="bmd-label-floating">Price</label>
        <input type="text" name="price" class="form-control" value="<?= $product['price'] ?>">
    </div>

    <button type="submit" class="btn btn-primary btn-raised">Update Product</button>

</form>


</div>