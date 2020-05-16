<?php

$pageTitle = 'about page';

$indexLinkStyle = '';
$aboutLinkStyle = 'current_page';
$listLinkStyle = '';
$contactLinkStyle = '';
$sitemapLinkStyle = '';

require_once __DIR__ . '/_header.php';
?>

    <div class="header_gallery">
        <h2>ABOUT US</h2>
    </div>
    <hr id="hr-line">
<div class="container-fluid about">
    <div class="row">
   <div class="card w-55 text-center">
       <div class="card-header">
           Pick Parts. Build Your PC. Compare And Share.
       </div>
       <div class="card-body">
           <p class="card-text">PCPartPicker provides computer part selection, compatibility, and pricing guidance for do-it-yourself computer builders. Assemble your virtual part lists with PCPartPicker and we'll provide compatibility guidance with up-to-date pricing from dozens of the most popular online retailers. We make it easy to share your part list with others, and our community forums provide a great place to discuss ideas and solicit feedback.</p>
       </div>
   </div>
    <div class="card w-55 text-center">
        <div class="card-header">
            Simplified Building
        </div>
        <div class="card-body">
            <p class="card-text">
                Part lists broken out by filterable categories to ensure you include all the necessary components.
                Automatic compatibility guidance limits choices to parts known to be compatible, and warns you if you pick incompatible parts.
                Easy sharing through Twitter, Facebook, part list permalinks, as well as auto-generated markup text for Reddit and many forums.
            </p>
        </div>
    </div>
        <div class="card text-center">
            <div class="card-header">
                Price Tracking
            </div>
            <div class="card-body">
                <p class="card-text">
                    Continuously updated prices from dozens of the most popular online retailers.
                    Configurable mail-in rebates and sales tax rates - easily enable/disable mail-in rebates and per-retailer tax rates in price calculations.
                    Price history charts for both parts and part lists.
                    Price trending on a part category basis lets you see what is happening to prices on a macro level.
                    Part price alerts let you set price thresholds on specific parts - get notified by email when a retailer offers a price lower than your set amount.
                    Parametric price alerts let you set price alerts on an entire product category with customizable filters.

                </p>
            </div>
        </div>
    </div>
</div>
<?php
require_once __DIR__ . '/_footer.php';
