<?php
$pageTitle = 'sitemap page';

$indexLinkStyle = '';
$aboutLinkStype = '';
$listLinkStyle = '';
$contactLinkStyle = '';
$sitemapLinkStyle = 'current_page';

require_once __DIR__ . '/_header.php';
?>

<h1>
    Site Map
</h1>

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="list.php">DVD Ratings</a></li>
    <li><a href="contact.php">Contact us</a></li>
    <li><a href="sitemap.php">Site Map</a></li>
</ul>


<?php
require_once __DIR__ . '/_footer.php';
?>