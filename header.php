<?php
include "./database/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="">
    <meta name="theme-color" content="#f79431">
    <meta name="description" content="News Magazine HTML Template">
    <meta name="keywords"
        content="Article, Blog, Business, Fashion, Magazine, Music, News, News Magazine, Newspaper, Politics, Travel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Power of People</title>

    <!--Favicon-->
    <link rel="icon" href="images/power_of_people.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/glightbox.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/font.css">

    <!-- Google Fonts -->
    <link href="https://db.onlinewebfonts.com/c/1db72198459b1d419ae5940598a2bad5?family=Paralucent+W00+Bold"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,600,700,800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="body-inner">
        <!-- Header start -->
        <header id="header" class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <!-- <div class="">
                            <div id="all">
                                <div id="date"></div>
                                <div id="time"></div>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="logo"> <a href="index.php"> <img src="images/power_of_people.png"
                                    class="mx-auto d-block" alt=""> </a> </div>
                    </div>
                    <div class="col-md-4 top-social text-lg-right text-md-center">
                        <ul class="unstyled">
                            <li> <a title="Facebook" href="https://www.facebook.com/profile.php?id=100089729767945"
                                    target="_"> <span class="social-icon"><i class="fa fa-facebook"></i></span> </a>
                                <a title="Twitter" href="https://twitter.com/Powerofpeople03" target="_"> <span
                                        class="social-icon"><i class="fa fa-twitter"></i></span> </a>
                                <a title="Instagram" href="https://www.instagram.com/powerofpeople2014/" target="_">
                                    <span class="social-icon"><i class="fa fa-instagram"></i></span> </a>
                                <a title="Linkdin" href="https://www.linkedin.com/in/power-of-people-a6146a286/"
                                    target="_"> <span class="social-icon"><i class="fa fa-linkedin"></i></span> </a>
                                <a title="YouTube" href="https://www.youtube.com/@powerofpeople2014/featured"
                                    target="_"> <span class="social-icon"><i class="fa fa-youtube"></i></span> </a>
                                <a title="Pinterest" href=""> <span class="social-icon"><i class="fa fa-pinterest"
                                            target="_"></i></span> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->

        <!-- Main Nav Start -->
        <div class="utf_main_nav_area clearfix utf_sticky">
            <div class="container-fluid">
                <div class="row">
                    <nav class="navbar navbar-expand-lg col">
                        <div class="utf_site_nav_inner float-left">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="true" aria-label="Toggle navigation"> <span
                                    class="navbar-toggler-icon"><i class="bi bi-list"></i></span> </button>
                            <div id="navbarSupportedContent"
                                class="collapse navbar-collapse navbar-responsive-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown"> <a href="" class="dropdown-toggle"
                                            data-toggle="dropdown">Power Of Stories <i class="fa fa-angle-down"></i></a>
                                        <ul class="utf_dropdown_menu list-box" role="menu">
                                            <div class="row">
                                            <?php 
                                             $select_category = "SELECT `id`, `story_name`, `status`, `added_on` FROM `story_type`";
                                                $res = mysqli_query($conn, $select_category);
                                                $i = 0;
                                                while($result = mysqli_fetch_assoc($res)){
                                                  $i++; ?>
                                                <div class="col-lg-6">
                                                    <li><a href="power_of_story.php?id=<?php echo base64_encode($result['id']); ?>"><i class="fa fa-angle-double-right"></i>
                                                        <?php echo $result['story_name']; ?></a>
                                                    </li>
                                                </div>
                                              
                                                <?php 
                                                    }                                                 
                                                ?> 
                                            </div>                                          
                                        </ul>
                                    </li>
                                    <li> <a href="video.php">Videos</a> </li>

                                    <li class="dropdown"> <a href="#" class="dropdown-toggle"
                                            data-toggle="dropdown">Media & Gallery<i class="fa fa-angle-down"></i></a>
                                        <ul class="utf_dropdown_menu" role="menu">
                                            <li><a href="media.php"><i class="fa fa-angle-double-right"></i>
                                                    Media</a>
                                            </li>
                                            <li><a href="gallery.php"><i class="fa fa-angle-double-right"></i>
                                                    Gallery</a>
                                            </li>
                                        </ul>
                                    </li>


                                    <li class="dropdown"> <a href="#" class="dropdown-toggle"
                                            data-toggle="dropdown">Donation<i class="fa fa-angle-down"></i></a>
                                        <ul class="utf_dropdown_menu" role="menu">
                                            <li><a href="donation.php"><i class="fa fa-angle-double-right"></i>
                                                    Donate</a>
                                            </li>
                                            <li><a href="certificate.php"><i class="fa fa-angle-double-right"></i>
                                                    Certificates</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#" class="dropdown-toggle"
                                            data-toggle="dropdown">Learn<i class="fa fa-angle-down"></i></a>
                                        <ul class="utf_dropdown_menu" role="menu">
                                            <li><a href="pop_university.php"><i class="fa fa-angle-double-right"></i>
                                                    POP University</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li> <a href="#">Power of people हिंदी </a></li>

                                    <li class="dropdown"> <a href="#" class="dropdown-toggle"
                                            data-toggle="dropdown">Power of people
                                            Community<i class="fa fa-angle-down"></i></a>
                                        <ul class="utf_dropdown_menu list-box" role="menu">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <li><a href=""><i class="fa fa-angle-double-right"></i>
                                                            Association With The Best</a>
                                                    </li>
                                                    <li><a href=""><i class="fa fa-angle-double-right"></i>
                                                            Events</a>
                                                    </li>
                                                    <li><a href=""><i class="fa fa-angle-double-right"></i>
                                                            Community Circles</a>
                                                    </li>

                                                </div>
                                                <div class="col-lg-6">
                                                    <li><a href=""><i class="fa fa-angle-double-right"></i>
                                                            Focus Group</a>
                                                    </li>
                                                    <li><a href=""><i class="fa fa-angle-double-right"></i>
                                                            Mentorship</a>
                                                    </li>
                                                    <li><a href=""><i class="fa fa-angle-double-right"></i>
                                                            Partner Offers</a>
                                                    </li>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>

                                    <li> <a href="" class=" btn btn-outline-success orange-color fw-semibold">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- <div class="utf_nav_search"> <span id="search"><i class="fa fa-search"></i></span> </div>
                    <div class="utf_search_block" style="display: none;">
                        <input type="text" class="form-control" placeholder="Enter your keywords...">
                        <span class="utf_search_close">&times;</span>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- Main Nav End -->