<?php
//-------- page header -------------------
$pageTitle = 'NEW PRODUCT';
require_once __DIR__ . '/_header.php';
//----------------------------------------
?>


<div class="container contact-form" style="margin-top: 10%">
<h1>Create a new product</h1>

<form action="index.php?action=createNewProduct" method="POST" enctype="multipart/form-data">

         <div class="form-group">
            <label for="title_create" class="bmd-label-floating">Title</label>
            <input type="text" id="title_create" name="title" class="form-control">
         </div>
            <br>
        <div class="form-group">
            <label for="desc_reg" class="bmd-label-floating">Description</label>
            <textarea rows="5" id="desc_reg" name="description" class="form-control"></textarea>
        </div>
         <br>
        <div class="form-group">
            <label for="fileToUpload" class="bmd-label-floating">Image</label>
            <input type="file" id="product_image" name="image" class="form-control-file">
        </div>
    <br>
        <div class="form-group">
            <label for="price_reg" class="bmd-label-floating">Price</label>
            <input type="text" name="price" class="form-control" id="price_reg">
        </div>


    <button type="submit" class="btn btn-primary btn-raised">Create new product</button>

</form>



</div>