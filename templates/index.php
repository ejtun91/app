<?php

$pageTitle = 'HOME';
$indexLinkStyle = 'current_page';

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
                <p>Building your own Windows desktop has many advantages over buying one pre-built. You can get parts suited exactly to your needs, which can also potentially lead to cost savings. You can get a customized look that’s unique to your PC. You don’t have to deal with things like bloatware or annoying pre-installs. It’s also a learning experience: by building your own computer, you’ll have a better grasp on how it all works.</p>
            </div>
            <div class="col-sm column">
                <h2>PRECAUTIONS
                </h2>
                <p>It’s smart to wear an anti-static bracelet (or ground yourself by touching a metal object / items bound to the floor) so that you don’t give your PC parts ESD (electrostatic discharge) and damage them in the process.

                   --- DON’T GIVE YOUR PRICEY PARTS A STATIC CHARGE ---
                    For your work surface, use a plastic or wooden table for the build process, or any other surface with a working mat that has anti-static properties. Additionally, have plenty of patience and two different sizes of Phillips screwdriver.</p>
            </div>
            <div class="col-sm">
                <h2>THE BUYING PROCESS
                </h2>
                <p>So what parts do you need for your build? Well, there are the essentials: RAM, a case, graphics, processor, cooler, thermal paste, operating system, motherboard, and finally, the power supply. Which manufacturer you use for each part is entirely up to you. However, there are some things you should keep in mind.

                    First, determine what your computer will be for. If it’s a gaming desktop, pay close attention to your RAM, CPU, and GPU trio — they’ll need to be the highest-end parts in the system. If you’re a video editor, drop costs on the graphics and spend more on storage and RAM, for example.</p>
            </div>
        </div>
    </div>

    </div>


<?php

require_once __DIR__ . '/_footer.php';
