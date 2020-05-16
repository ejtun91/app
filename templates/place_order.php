<?php


// set page title
$page_title="Thank You!";

// include page header HTML
require_once __DIR__ . '/_header.php';

echo "<div class='col-md-12 pt-5'>";

// tell the user order has been placed
echo "<div class='alert alert-success'>";
echo "<strong>Your order has been placed!</strong> Thank you very much!";
echo "</div>";
$_SESSION['shoppingCart'] = null;
echo "</div>";
header("Refresh:2; url= ../../app/public");

exit;


// include page footer HTML
?>