<?php
ob_start();
if (!isset($_SESSION)) {
    session_start();
}


require_once __DIR__ . '/_header.php';


?>
<!-- Navigation -->
<div class="fixed-top">
    <header class="topbar">
        <div class="container">
            <div class="row">
                <!-- social icon-->
                <div class="col-sm-12">
                    <ul class="social-network">
                        <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
        <div class="container-fluid">

            <a class="navbar-brand" href="index.php?action=index" style="text-transform: uppercase;"> PCBuildGuide</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="index.php?action=index" class="<?= $indexLinkStyle ?> nav-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php?action=about" class="<?= $aboutLinkStyle ?> nav-link">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php?action=list" class="<?= $listLinkStyle ?> nav-link">Webshop</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php?action=contact" class="<?= $contactLinkStyle ?> nav-link">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?action=login" class="<?= $loginLinkStyle ?> nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?action=register" class="<?= $registerLinkStyle ?> nav-link">Register</a>
                    </li>
                    <?php if (isset($_SESSION['user_role'])) { ?>
                        <li class="nav-item">
                            <a href="index.php?action=admin" class="<? /*= $adminLinkStyle */ ?> nav-link">Admin</a>
                        </li>
                    <?php } ?>
                </ul>
                <div class="container">
                    <ul class="nav navbar-right top-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                                <?php

                                if (isset($_SESSION['username'])) {
                                    // Grab user data from the database using the user_id
                                    // Let them access the "logged in only" pages
                                    echo $_SESSION['username'];
                                }
                                ?>

                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">

                                <li>
                                    <a href="../templates/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                </li>
                                <?php if (!isset($_SESSION['user_role'])) { ?>
                                    <hr>
                                    <li>
                                        <a href="index.php?action=showUserAction&id=<?= $_SESSION['user_session'] ?>"><i
                                                    class="fa fa-fw fa-user"></i>View Profile</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 w-50">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        <a class="btn btn-success ml-1" href="index.php?action=cart">
                            <i class="fa fa-shopping-cart"></i> Cart
                            <!--                <span class="badge badge-light">3</span>-->
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>
