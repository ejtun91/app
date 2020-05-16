<?php

$pageTitle = 'home page';

$indexLinkStyle = 'current_page';
$aboutLinkStyle = '';
$listLinkStyle = '';
$contactLinkStyle = '';
$sitemapLinkStyle = '';



require_once __DIR__ . '/_header.php';
?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../images/third.jpg" alt="Los Angeles">
            </div>

            <div class="carousel-item">
                <img src="../images/second.jpg" alt="Chicago">
            </div>

            <div class="carousel-item">
                <img src="../images/first.jpg" alt="New York">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="jumbotron card card-image" style="background-image: url(https://images.hdqwalls.com/download/abstract-green-gradient-bs-1920x1080.jpg);">
        <div class="text-white text-center py-5 px-4">
            <div>
                <h1 class="card-title h1-responsive pt-3 mb-5 font-bold"><strong>Hello, Welcome to PCBuildGuide!</strong></h1>
                <p class="mx-5 mb-5">Based on the latest graphics and chipsets, custom build your gaming PC here! Start broadcasting and recording your remarkable gameplay, memorable gaming moments and more with PCSpecialist Streaming PCs. Configure your ultimate custom streaming setup today!
                </p>
                <a href="index.php?action=list" class="btn btn-outline-white btn-md"><i class="fas fa-clone left"></i> View Products</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <div class="container-fluid home">
        <div class="row">
            <div class="col-sm column">
                <h2>Explore</h2>
                <p>At PCSpecialist we are focused on manufacturing computers and notebooks designed to our customers requirements. If you're from a company, the public sector or education, you'll already know that finding the right solution that fits your needs can sometimes be harder than you think, especially when you have to try and adapt an off-the-shelf solution to your requirements.</p>
            </div>
            <div class="col-sm column">
                <h2>Search</h2>
                <p>Please browse our website and configure your ideal desktop or notebook solution. During this process if you need any assistance, please do not hesitate to contact us on 0333 0110.

                    If you wish to place an order for education, the NHS or a public sector body, please configure your ideal IT solution and save your configuration as a quote, then email your official purchase order (stating the quote reference) to purchaseorders@pcbuild.com.

                    If you wish to apply for credit on behalf of a business, please complete our credit account application form here.

                    If you wish to take advantage of tax efficient business finance, please configure your ideal IT solution and then click the "Business Finance" button to proceed and complete the online application.</p>
            </div>
            <div class="col-sm">
                <h2>Find</h2>
                <p>PCSpecialist is an NVIDIA Elite Solution Provider and an NVIDIA Elite Educational Services Partner. We recommend NVIDIA Quadro graphics cards in our professional workstations. NVIDIA Quadro offers outstanding performance and reliability for businesses who create content using professional applications.</p>
            </div>
        </div>
    </div>

    </div>


<?php

require_once __DIR__ . '/_footer.php';
