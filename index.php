<?php
include "header.php";
include "./database/database.php";
// include "./database/data_blog.php";
?>



<!-- Featured Post Area Start -->
<section class="utf_featured_post_area pt-4 no-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div id="utf_featured_slider" class="owl-carousel owl-theme utf_featured_slider">
                    <div class="item" style="background-image:url(images/news/health5.jpg)">
                        <div class="utf_featured_post">
                            <div class="utf_post_content"> <a class="utf_post_cat" href="">Health</a>
                                <h2 class="utf_post_title title-extra-large"> <a class="para"
                                        href="detailsview.php">Zhang
                                        social media pop
                                        also known when smart innocent...</a> </h2>
                                <span class="utf_post_author"><i class="fa fa-user"></i> <a href="#">John
                                        Wick</a></span>
                                <span class="utf_post_date"><i class="fa fa-clock-o"></i> 20 Jan, 2022</span>
                            </div>
                        </div>
                    </div>

                    <div class="item" style="background-image:url(images/news/3.jpg)">
                        <div class="utf_featured_post">
                            <div class="utf_post_content"> <a class="utf_post_cat" href="#">Gadget</a>
                                <h2 class="utf_post_title title-extra-large"> <a href="detailsview.php">Samsung Gear S3
                                        review: A whimper, when smartwatches need a bang</a> </h2>
                                <span class="utf_post_author"><i class="fa fa-user"></i> <a href="#">John
                                        Wick</a></span>
                                <span class="utf_post_date"><i class="fa fa-clock-o"></i> 20 Jan, 2022</span>
                            </div>
                        </div>
                    </div>

                    <div class="item" style="background-image:url(images/news/1.jpg)">
                        <div class="utf_featured_post">
                            <div class="utf_post_content"> <a class="utf_post_cat" href="#">Travel</a>
                                <h2 class="utf_post_title title-extra-large"> <a href="detailsview.php">Zhang social
                                        media pop
                                        also known when smart innocent...</a> </h2>
                                <span class="utf_post_author"><i class="fa fa-user"></i> <a href="#">John
                                        Wick</a></span>
                                <span class="utf_post_date"><i class="fa fa-clock-o"></i> 20 Jan, 2022</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 pad-l">
                <div class="row">
                    <div class="col-md-6 pad-r-small mb-1">
                        <div class="utf_post_overaly_style contentTop utf_hot_post_bottom clearfix">
                            <div class="utf_post_thumb"> <a href="#"><img class="img-fluid"
                                        src="images/news/health5.jpg" alt="" /></a> </div>
                            <div class="utf_post_content"> <a class="utf_post_cat" href="#">Travel</a>
                                <h2 class="utf_post_title title-medium"> <a href="detailsview.php">Early tourists
                                        choices
                                        to
                                        the sea of Maldiv…</a> </h2>
                                <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a
                                            href="#">Prem Jadhav</a></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pad-l-small mb-1">
                        <div class="utf_post_overaly_style contentTop utf_hot_post_bottom clearfix">
                            <div class="utf_post_thumb"> <a href="#"><img class="img-fluid" src="images/news/1.jpg"
                                        alt="" /></a> </div>
                            <div class="utf_post_content"> <a class="utf_post_cat" href="#">Health</a>
                                <h2 class="utf_post_title title-medium"> <a href="detailsview.php">That wearable on your
                                        wrist
                                        could soon...</a> </h2>
                                <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a
                                            href="#">Prem Jadhav</a></span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pad-r-small mb-1">
                        <div class="utf_post_overaly_style contentTop utf_hot_post_bottom clearfix">
                            <div class="utf_post_thumb"> <a href="#"><img class="img-fluid" src="images/news/2.jpg"
                                        alt="" /></a> </div>
                            <div class="utf_post_content"> <a class="utf_post_cat" href="#">Travel</a>
                                <h2 class="utf_post_title title-medium"> <a href="detailsview.php">Early tourists
                                        choices
                                        to
                                        the sea of Maldiv…</a> </h2>
                                <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a
                                            href="#">Prem Jadhav</a></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pad-l-small">
                        <div class="utf_post_overaly_style contentTop utf_hot_post_bottom clearfix">
                            <div class="utf_post_thumb"> <a href="#"><img class="img-fluid" src="images/news/3.jpg"
                                        alt="" /></a> </div>
                            <div class="utf_post_content"> <a class="utf_post_cat" href="#">Health</a>
                                <h2 class="utf_post_title title-medium"> <a href="detailsview.php">That wearable on your
                                        wrist
                                        could soon...</a> </h2>
                                <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a
                                            href="#">Prem Jadhav</a></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="utf_latest_new_area pb-bottom-20">
    <div class="container-fluid">
        <div class="utf_latest_news block color-red">
            <h3 class="utf_block_title"><span>Blogs</span></h3>
            <div id="utf_latest_news_slide" class="owl-carousel owl-theme utf_latest_news_slide">

                <?php
                if (!$conn) {
                 
                    die("Connection failed: " . mysqli_connect_error());
                     }
                       $sql = "SELECT `id`, `headline`, `description`, `uploadFile`, `category`, `status`, `added_on` FROM `blog` where `status` ='1'";//(innerjoin)
                       $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo "
                          <div class='item'>
                    <ul class='utf_list_post'>
                        <li class='clearfix'>
                            <div class='utf_post_block_style clearfix'>
                                <div class='utf_post_thumb'> <img class='img-fluid' src='images/news/video2.jpg' alt=''>
                                    <a href='video_view.php'>
                                        <div class='video-icon'> <i class='fa fa-play'></i> </div>
                                    </a>
                                </div>
                                <a class='utf_post_cat' href='#'>" . $row['category'] ."</a>
                                <div class='utf_post_content'>
                                    <h2 class='utf_post_title title-medium'> <a href='blog_view.php?id=" . $row['id'] . "'?id=" . $row['id'] . "'> " . $row['headline'] ." </a> </h2>
                                    <div class='utf_post_meta'> <span class='utf_post_author'><i class='fa fa-user'></i>
                                            <a href='#'>Prem Jadhav</a></span> <span class='utf_post_date'><i
                                                class='fa fa-clock-o'></i> ". date('d M, Y',strtotime($row['added_on']))."</span> </div>
                                                
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>"; } ?>


                <!-- <div class="item">
                    <ul class="utf_list_post">
                        <li class="clearfix">
                            <div class="utf_post_block_style clearfix">
                                <div class="utf_post_thumb"> <img class="img-fluid" src="images/news/video2.jpg" alt="">
                                    <a href="video_view.php">
                                        <div class="video-icon"> <i class="fa fa-play"></i> </div>
                                    </a>
                                </div>
                                <a class="utf_post_cat" href="#">Health</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title title-medium"> <a href="video_view.php">Zhang social media
                                            pop
                                            also known when smart innocent...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="item">
                    <ul class="utf_list_post">
                        <li class="clearfix">
                            <div class="utf_post_block_style clearfix">
                                <div class="utf_post_thumb"> <a href="#"><img class="img-fluid" src="images/news/2.jpg"
                                            alt="" /></a> </div>
                                <a class="utf_post_cat" href="#">Health</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title title-medium"> <a href="video_view.php">Zhang social media
                                            pop
                                            also known when smart innocent...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="item">
                    <ul class="utf_list_post">
                        <li class="clearfix">
                            <div class="utf_post_block_style clearfix">
                                <div class="utf_post_thumb"> <a href="#"><img class="img-fluid" src="images/news/3.jpg"
                                            alt="" /></a> </div>
                                <a class="utf_post_cat" href="#">Health</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title title-medium"> <a href="video_view.php">Zhang social media
                                            pop
                                            also known when smart innocent...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="item">
                    <ul class="utf_list_post">
                        <li class="clearfix">
                            <div class="utf_post_block_style clearfix">
                                <div class="utf_post_thumb"> <a href="#"><img class="img-fluid"
                                            src="images/news/health5.jpg" alt="" /></a> </div>
                                <a class="utf_post_cat" href="#">Health</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title title-medium"> <a href="video_view.php">Zhang social media
                                            pop
                                            also known when smart innocent...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="item">
                    <ul class="utf_list_post">
                        <li class="clearfix">
                            <div class="utf_post_block_style clearfix">
                                <div class="utf_post_thumb"> <a href="#"><img class="img-fluid" src="images/news/1.jpg"
                                            alt="" /></a> </div>
                                <a class="utf_post_cat" href="#">Health</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title title-medium"> <a href="video_view.php">Zhang social media
                                            pop
                                            also known when smart innocent...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="item">
                    <ul class="utf_list_post">
                        <li class="clearfix">
                            <div class="utf_post_block_style clearfix">
                                <div class="utf_post_thumb"> <a href="#"><img class="img-fluid" src="images/news/2.jpg"
                                            alt="" /></a> </div>
                                <a class="utf_post_cat" href="#">Health</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title title-medium"> <a href="video_view.php">Zhang social media
                                            pop
                                            also known when smart innocent...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="item">
                    <ul class="utf_list_post">
                        <li class="clearfix">
                            <div class="utf_post_block_style clearfix">
                                <div class="utf_post_thumb"> <a href="#"><img class="img-fluid" src="images/news/3.jpg"
                                            alt="" /></a> </div>
                                <a class="utf_post_cat" href="#">Health</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title title-medium"> <a href="video_view.php">Zhang social media
                                            pop
                                            also known when smart innocent...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="item">
                    <ul class="utf_list_post">
                        <li class="clearfix">
                            <div class="utf_post_block_style clearfix">
                                <div class="utf_post_thumb"> <a href="#">
                                        <img class="img-fluid" src="images/news/health5.jpg" alt="" />
                                    </a> </div>
                                <a class="utf_post_cat" href="#">Health</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title title-medium"> <a href="video_view.php">Zhang social media
                                            pop
                                            also known when smart innocent...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div> -->

            </div>
        </div>
    </div>
</section>
<!-- Latest News Area End -->

<!-- 1rd Block Wrapper Start -->
<section class="utf_block_wrapper p-bottom-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="utf_featured_tab">
                    <!-- <h3 class="utf_block_title"><span>Startup</span></h3> -->
                    <h3 class="utf_block_title"><span class="bg-title-green">Startup</span> <span><a href="startup.php"
                                class="float-right">See More</a></span></h3>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="utf_post_block_style clearfix">
                                <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid" src="images/news/1.jpg"
                                            alt="" /> </a> </div>
                                <a class="utf_post_cat" href="#">Lifestyle</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title"> <a href="#">Zhang social media pop also
                                            known when smart innocent...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span>
                                        <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25
                                            Jan, 2022</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been the industry's standard dummy
                                        text since has five...</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="utf_post_block_style clearfix">
                                <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                            src="images/news/health5.jpg" alt="" /> </a> </div>
                                <a class="utf_post_cat" href="#">Lifestyle</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title"> <a href="#">Zhang social media pop also
                                            known when smart innocent...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span>
                                        <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25
                                            Jan, 2022</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been the industry's standard dummy
                                        text since has five...</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="utf_list_post_block">
                                <ul class="utf_list_post">
                                    <li class="clearfix">
                                        <div class="utf_post_block_style post-float clearfix">
                                            <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                        src="images/news/health5.jpg" alt="" />
                                                </a> </div>
                                            <div class="utf_post_content">
                                                <h2 class="utf_post_title title-small"> <a href="#">Zhang social
                                                        media pop also known when
                                                        smart innocent...</a> </h2>
                                                <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                            class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                                    <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                        2022</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <div class="utf_post_block_style post-float clearfix">
                                            <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                        src="images/news/1.jpg" alt="" />
                                                </a> </div>
                                            <div class="utf_post_content">
                                                <h2 class="utf_post_title title-small"> <a href="#">Zhang social
                                                        media pop also known when
                                                        smart innocent...</a> </h2>
                                                <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                            class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                                    <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                        2022</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <div class="utf_post_block_style post-float clearfix">
                                            <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                        src="images/news/2.jpg" alt="" />
                                                </a> </div>
                                            <div class="utf_post_content">
                                                <h2 class="utf_post_title title-small"> <a href="#">Zhang social
                                                        media pop also known when
                                                        smart innocent...</a> </h2>
                                                <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                            class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                                    <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                        2022</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <div class="utf_post_block_style post-float clearfix">
                                            <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                        src="images/news/3.jpg" alt="" />
                                                </a> </div>
                                            <div class="utf_post_content">
                                                <h2 class="utf_post_title title-small"> <a href="#">Zhang social
                                                        media pop also known when
                                                        smart innocent...</a> </h2>
                                                <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                            class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                                    <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                        2022</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gap-30"></div>
                <div class="block color-orange">

                    <!-- <ul class="nav nav-tabs">
                        <li class="nav-item"> <a class="nav-link animated fadeIn" href="#"> <span class="tab-head">
                                    See More </span></a> </li>
                    </ul> -->
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <h3 class="utf_block_title"><span class="bg-title-orange">Power Of Action</span> <span><a
                                        href="" class="float-right">See More</a></span></h3>
                            <div class="utf_post_overaly_style clearfix">
                                <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid" src="images/news/2.jpg"
                                            alt="" /> </a> </div>
                                <div class="utf_post_content"> <a class="utf_post_cat" href="#">Travel</a>
                                    <h2 class="utf_post_title"> <a href="#">Zhang social media pop also known
                                            when smart innocent...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                </div>
                            </div>

                            <div class="utf_list_post_block">
                                <ul class="utf_list_post">
                                    <li class="clearfix">
                                        <div class="utf_post_block_style post-float clearfix">
                                            <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                        src="images/news/3.jpg" alt="" /> </a> <a class="utf_post_cat"
                                                    href="#">Food</a> </div>
                                            <div class="utf_post_content">
                                                <h2 class="utf_post_title title-small"> <a href="#">Zhang social
                                                        media pop also known when smart innocent... </a> </h2>
                                                <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                            class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                                    <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                        2022</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <div class="utf_post_block_style post-float clearfix">
                                            <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                        src="images/news/health5.jpg" alt="" /> </a>
                                                <a class="utf_post_cat" href="#">Health</a>
                                            </div>
                                            <div class="utf_post_content">
                                                <h2 class="utf_post_title title-small"> <a href="#">Zhang social
                                                        media pop also known when smart innocent...</a> </h2>
                                                <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                            class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                                    <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                        2022</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <div class="utf_post_block_style post-float clearfix">
                                            <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                        src="images/news/1.jpg" alt="" /> </a>
                                                <a class="utf_post_cat" href="#">Travel</a>
                                            </div>
                                            <div class="utf_post_content">
                                                <h2 class="utf_post_title title-small"> <a href="#">Zhang social
                                                        media pop also known when smart innocent...</a> </h2>
                                                <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                            class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                                    <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                        2022</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <div class="utf_post_block_style post-float clearfix">
                                            <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                        src="images/news/2.jpg" alt="" />
                                                </a> <a class="utf_post_cat" href="#">Architecture</a> </div>
                                            <div class="utf_post_content">
                                                <h2 class="utf_post_title title-small"> <a href="#">Zhang social
                                                        media pop also known when smart innocent...</a> </h2>
                                                <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                            class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                                    <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                        2022</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <h3 class="utf_block_title"><span class="bg-title-green">Interviews</span> <span><a href=""
                                        class="float-right">See More</a></span></h3>



                            <?php
                if (!$conn) {
                 
                    die("Connection failed: " . mysqli_connect_error());
                     }
                       $sql = "SELECT `id`, `video_link`, `details`, `description`, `category`, `uploadThumbnail`, `status`, `upload_date` FROM `interview`where `status` ='1'";//(innerjoin)
                       $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         $row = mysqli_fetch_assoc($result) 
                            ?>
                            <div class='utf_post_overaly_style last clearfix'>
                                <div class='utf_post_thumb'> <img class='img-fluid' src='images/news/video2.jpg' alt=''>
                                    <a href=<?php echo "interviews_view.php?id=" . $row['id'] . ""?>>
                                        <div class='video-icon'> <i class='fa fa-play'></i> </div>
                                    </a>
                                </div>
                                <div class='utf_post_content'> <a class='utf_post_cat'
                                        href='#'><?php echo"" . $row['category'] ."" ?></a>
                                    <h2 class='utf_post_title'> <a
                                            href='<?php echo "interviews_view.php?id=" . $row['id'] . "'?id=" . $row['id'] . ""?>'><?php echo" " . $row['details'] ." " ?></a>
                                    </h2>
                                    <div class='utf_post_meta'> <span class='utf_post_author'><i class='fa fa-user'></i>
                                            <a href='#'>Prem Jadhav</a></span> <span class='utf_post_date'><i
                                                class='fa fa-clock-o'></i>
                                            <?php echo"". date('d M, Y',strtotime($row['upload_date']))."" ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="utf_list_post_block">
                                <ul class="utf_list_post">
                                    <?php
                            if (!$conn) {                 
                             die("Connection failed: " . mysqli_connect_error());
                                  }
                                $sql = "SELECT * FROM `interview`where `status` ='1' LIMIT 4";//(innerjoin)
                                $result = mysqli_query($conn, $sql);
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1;
                                        echo "
                                    <li class='clearfix'>
                                                     <div class='utf_post_block_style post-float clearfix'>
                                             <div class='utf_post_thumb'> <a href='#'> <img class='img-fluid'
                                            src='images/news/3.jpg' alt='' /> </a>
                                            <div class='video-icon video-icon-small'> <i class='fa fa-play'></i> </div>
                                   
                                                     </div>
                                                 <div class='utf_post_content'>
                                                 <h2 class='utf_post_title title-small'> <a href='interviews_view.php?id=" . $row['id'] . "'>
                                             " . $row['details'] ."</a> </h2>
                                                     <div class='utf_post_meta'> <span class='utf_post_author'><i
                                                class='fa fa-user'></i> <a href='#'>Prem Jadhav</a></span>
                                                  <span class='utf_post_date'><i class='fa fa-clock-o'></i>". date('d M, Y',strtotime($row['upload_date']))."</span>
                                                    <span class='utf_post_categ'>" . $row['category'] ."</span>
                                                  </div>
                                            </div>
                                       </div>
                                      </li>"; } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="sidebar utf_sidebar_right">
                    <div class="widget">
                        <h3 class="utf_block_title"><span class="bg-title-green">Follow Us</span></h3>
                        <ul class="social-icon">
                            <li><a href="#" target="_blank"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>

                    <div class="widget color-default">
                        <h3 class="utf_block_title"><span class="bg-title-orange">Events</span></h3>


                        <?php
                            if (!$conn) {                 
                             die("Connection failed: " . mysqli_connect_error());
                                  }
                                $sql = "SELECT * FROM `event` where `status` ='1' LIMIT 3";
                                $result = mysqli_query($conn, $sql);
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1;
                                        echo "
                                        <div class='border mb-3'>
                                        <div class='row'>
                                            <div class='col-lg-3 text-center event_date'>
                                                <p class=''>".date('d',strtotime($row['date']))." </p>
                                                <small>".date('M',strtotime($row['date'])).", ".date('Y',strtotime($row['date']))."</small>
                                            </div>
                                            <div class='col-lg-9 event-name'>
                                                <h3>" . $row['title'] ."</h3>
                                                <ul class='dat-time'>
                                                    <li><i class='fa fa-clock-o'></i>" . date('h:i A', strtotime($row['time'])) ."</li>
                                                    <li><i class='fa fa-calendar'></i>". date('d M, Y',strtotime($row['date']))."</li>
                                                    <li><i class='fa fa-map-marker'></i> " . $row['city'] ."</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> "; } ?>
                        <div>
                            <div class="event_comimg_soon mb-3">
                                <h3>
                                    Comming Soom..
                                </h3>
                            </div>
                        </div>
                        <div class="utf_list_post_block">
                            <ul class="utf_list_post">
                                <li class="clearfix">
                                    <div class="utf_post_block_style post-float clearfix">
                                        <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                    src="images/news/1.jpg" alt="" /> </a> <a class="utf_post_cat"
                                                href="#">Lifestyle</a> </div>
                                        <div class="utf_post_content">
                                            <h2 class="utf_post_title title-small"> <a href="#">Zhang social
                                                    media pop also known when smart innocent...</a> </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i>
                                                    <a href="#">Prem Jadhav</a></span>
                                                <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25
                                                    Jan, 2022</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="clearfix">
                                    <div class="utf_post_block_style post-float clearfix">
                                        <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                    src="images/news/2.jpg" alt="" /> </a> <a class="utf_post_cat"
                                                href="#">Travel</a> </div>
                                        <div class="utf_post_content">
                                            <h2 class="utf_post_title title-small"> <a href="#">Zhang social
                                                    media pop also known when smart innocent...</a> </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i>
                                                    <a href="#">Prem Jadhav</a></span>
                                                <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25
                                                    Jan, 2022</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="clearfix">
                                    <div class="utf_post_block_style post-float clearfix">
                                        <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                    src="images/news/3.jpg" alt="" /> </a> <a class="utf_post_cat"
                                                href="#">Traveling</a> </div>
                                        <div class="utf_post_content">
                                            <h2 class="utf_post_title title-small"> <a href="#">Zhang social
                                                    media pop also known when smart innocent...</a> </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i>
                                                    <a href="#">Prem Jadhav</a></span>
                                                <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25
                                                    Jan, 2022</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="clearfix">
                                    <div class="utf_post_block_style post-float clearfix">
                                        <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                    src="images/news/health5.jpg" alt="" /> </a> <a class="utf_post_cat"
                                                href="#">Food</a> </div>
                                        <div class="utf_post_content">
                                            <h2 class="utf_post_title title-small"> <a href="#">Zhang social
                                                    media pop also known when smart innocent...</a> </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i>
                                                    <a href="#">Prem Jadhav</a></span>
                                                <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25
                                                    Jan, 2022</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget color-default m-bottom-0">
                        <h3 class="utf_block_title"><span class="bg-title-green">Gallery</span></h3>
                        <div id="utf_post_slide" class="owl-carousel owl-theme utf_post_slide">
                            <div class="item">
                                <div class="utf_post_overaly_style text-center clearfix">
                                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                src="images/news/1.jpg" alt="" /> </a> </div>
                                    <div class="utf_post_content"> <a class="utf_post_cat" href="#">Lifestyle</a>
                                        <h2 class="utf_post_title"> <a href="#">The best MacBook Pro
                                                alternatives in 2022 for Appl…</a> </h2>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="utf_post_overaly_style text-center clearfix">
                                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                src="images/news/4.jpg" alt="" /> </a> </div>
                                    <div class="utf_post_content"> <a class="utf_post_cat" href="#">Health</a>
                                        <h2 class="utf_post_title"> <a href="#">Netcix cuts out the chill with
                                                an integrated perso…</a> </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 1rd Block Wrapper End -->

<!-- 2rd Block Wrapper Start -->
<section class="utf_block_wrapper p-bottom-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="block ">
                    <h3 class="utf_block_title"><span class="bg-title-green">Power Of Words</span> <span><a href=""
                                class="float-right">See More</a></span></h3>
                    <div class="utf_post_overaly_style clearfix">
                        <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid" src="images/news/health5.jpg"
                                    alt="" /> </a> </div>
                        <div class="utf_post_content">
                            <h2 class="utf_post_title"> <a href="#">Zhang social media pop also known when smart
                                    innocent...</a> </h2>
                            <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                    <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                        class="fa fa-clock-o"></i> 25 Jan, 2022</span> </div>
                        </div>
                    </div>

                    <div class="utf_list_post_block">
                        <ul class="utf_list_post">
                            <li class="clearfix">
                                <div class="utf_post_block_style post-float clearfix">
                                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                src="images/news/health5.jpg" alt="" /> </a> </div>
                                    <div class="utf_post_content">
                                        <h2 class="utf_post_title title-small"> <a href="#">Zhang social media
                                                pop also known when smart innocent...</a> </h2>
                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                    class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                            <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                2022</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="utf_post_block_style post-float clearfix">
                                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                src="images/news/health5.jpg" alt="" /> </a> </div>
                                    <div class="utf_post_content">
                                        <h2 class="utf_post_title title-small"> <a href="#">Zhang social media
                                                pop also known when smart innocent...</a> </h2>
                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                    class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                            <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                2022</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="utf_post_block_style post-float clearfix">
                                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                src="images/news/health5.jpg" alt="" /> </a> </div>
                                    <div class="utf_post_content">
                                        <h2 class="utf_post_title title-small"> <a href="#">Zhang social media
                                                pop also known when smart innocent...</a> </h2>
                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                    class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                            <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                2022</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="block">
                    <h3 class="utf_block_title"><span class="bg-title-orange">Power Of Charity</span> <span><a href=""
                                class="float-right">See More</a></span></h3>
                    <div class="utf_post_overaly_style clearfix">
                        <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid" src="images/news/health5.jpg"
                                    alt="" /> </a> </div>
                        <div class="utf_post_content">
                            <h2 class="utf_post_title"> <a href="#">Zhang social media pop also known when smart
                                    innocent...</a> </h2>
                            <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                    <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                        class="fa fa-clock-o"></i> 25 Jan, 2022</span> </div>
                        </div>
                    </div>

                    <div class="utf_list_post_block">
                        <ul class="utf_list_post">
                            <li class="clearfix">
                                <div class="utf_post_block_style post-float clearfix">
                                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                src="images/news/health5.jpg" alt="" /> </a> </div>
                                    <div class="utf_post_content">
                                        <h2 class="utf_post_title title-small"> <a href="#">Zhang social media
                                                pop also known when smart innocent...</a> </h2>
                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                    class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                            <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                2022</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="utf_post_block_style post-float clearfix">
                                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                src="images/news/health5.jpg" alt="" /> </a> </div>
                                    <div class="utf_post_content">
                                        <h2 class="utf_post_title title-small"> <a href="#">Zhang social media
                                                pop also known when smart innocent...</a> </h2>
                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                    class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                            <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                2022</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="utf_post_block_style post-float clearfix">
                                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                src="images/news/health5.jpg" alt="" /> </a> </div>
                                    <div class="utf_post_content">
                                        <h2 class="utf_post_title title-small"> <a href="#">Zhang social media
                                                pop also known when smart innocent...</a> </h2>
                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                    class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                            <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                2022</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="block">
                    <h3 class="utf_block_title"><span class="bg-title-green">Power Of Health</span> <span><a href=""
                                class="float-right">See More</a></span></h3>
                    <div class="utf_post_overaly_style clearfix">
                        <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid" src="images/news/health5.jpg"
                                    alt="" /> </a> </div>
                        <div class="utf_post_content">
                            <h2 class="utf_post_title"> <a href="#">That wearable on your wrist could soon track
                                    your health as …</a> </h2>
                            <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                    <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                        class="fa fa-clock-o"></i> 25 Jan, 2022</span> </div>
                        </div>
                    </div>

                    <div class="utf_list_post_block">
                        <ul class="utf_list_post">
                            <li class="clearfix">
                                <div class="utf_post_block_style post-float clearfix">
                                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                src="images/news/health5.jpg" alt="" /> </a> </div>
                                    <div class="utf_post_content">
                                        <h2 class="utf_post_title title-small"> <a href="#">Zhang social media
                                                pop also known when smart innocent...</a> </h2>
                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                    class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                            <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                2022</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="utf_post_block_style post-float clearfix">
                                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                src="images/news/health5.jpg" alt="" /> </a> </div>
                                    <div class="utf_post_content">
                                        <h2 class="utf_post_title title-small"> <a href="#">Zhang social media
                                                pop also known when smart innocent...</a> </h2>
                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                    class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                            <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                2022</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="utf_post_block_style post-float clearfix">
                                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                src="images/news/health5.jpg" alt="" /> </a> </div>
                                    <div class="utf_post_content">
                                        <h2 class="utf_post_title title-small"> <a href="#">Zhang social media
                                                pop also known when smart innocent...</a> </h2>
                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                    class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                            <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                2022</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="block">
                    <h3 class="utf_block_title"><span class="bg-title-orange">Power Of Life's Work</span> <span><a
                                href="" class="float-right">See More</a></span></h3>
                    <div class="utf_post_overaly_style clearfix">
                        <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid" src="images/news/health5.jpg"
                                    alt="" /> </a> </div>
                        <div class="utf_post_content">
                            <h2 class="utf_post_title"> <a href="#">That wearable on your wrist could soon track
                                    your health as …</a> </h2>
                            <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                    <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                        class="fa fa-clock-o"></i> 25 Jan, 2022</span> </div>
                        </div>
                    </div>

                    <div class="utf_list_post_block">
                        <ul class="utf_list_post">
                            <li class="clearfix">
                                <div class="utf_post_block_style post-float clearfix">
                                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                src="images/news/health5.jpg" alt="" /> </a> </div>
                                    <div class="utf_post_content">
                                        <h2 class="utf_post_title title-small"> <a href="#">Zhang social media
                                                pop also known when smart innocent...</a> </h2>
                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                    class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                            <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                2022</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="utf_post_block_style post-float clearfix">
                                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                src="images/news/health5.jpg" alt="" /> </a> </div>
                                    <div class="utf_post_content">
                                        <h2 class="utf_post_title title-small"> <a href="#">Zhang social media
                                                pop also known when smart innocent...</a> </h2>
                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                    class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                            <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                2022</span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="utf_post_block_style post-float clearfix">
                                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                src="images/news/health5.jpg" alt="" /> </a> </div>
                                    <div class="utf_post_content">
                                        <h2 class="utf_post_title title-small"> <a href="#">Zhang social media
                                                pop also known when smart innocent...</a> </h2>
                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                    class="fa fa-user"></i> <a href="#">Prem Jadhav</a></span>
                                            <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                2022</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 2rd Block Wrapper End -->

<!-- 3rd Block Wrapper Start -->
<!-- <section class="utf_block_wrapper p-bottom-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="utf_more_news block color-default">
                    <h3 class="utf_block_title"><span class="bg-title-green">Author</span></h3>
                    <div id="utf_more_news_slide" class="owl-carousel owl-theme utf_more_news_slide">
                        <div class="item">
                            <div class="utf_post_block_style utf_post_float_half clearfix">
                                <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                            src="images/news/health5.jpg" alt="" /> </a> </div>
                                <a class="utf_post_cat" href="#">Video</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title"> <a href="#">Ratcliffe to be Director of
                                            intelligence Trump ignored smart innocent...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been the industry's standard dummy text since
                                        has five...</p>
                                </div>
                            </div>

                            <div class="utf_post_block_style utf_post_float_half clearfix">
                                <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                            src="images/news/health5.jpg" alt="" /> </a> </div>
                                <a class="utf_post_cat" href="#">Health</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title"> <a href="#">Ratcliffe to be Director of
                                            intelligence Trump ignored smart innocent...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been the industry's standard dummy text since
                                        has five...</p>
                                </div>
                            </div>

                            <div class="utf_post_block_style utf_post_float_half clearfix">
                                <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                            src="images/news/health5.jpg" alt="" /> </a> </div>
                                <a class="utf_post_cat" href="#">Health</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title"> <a href="#">Zhang social media pop also known
                                            when smart innocent...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been the industry's standard dummy text since
                                        has five...</p>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="utf_post_block_style utf_post_float_half clearfix">
                                <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                            src="images/news/health5.jpg" alt="" /> </a> </div>
                                <a class="utf_post_cat" href="#">Video</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title"> <a href="#">Breeze through 17 locations in
                                            Europe in this breathtaking v…</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been the industry's standard dummy text since
                                        has five...</p>
                                </div>
                            </div>

                            <div class="utf_post_block_style utf_post_float_half clearfix">
                                <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                            src="images/news/health5.jpg" alt="" /> </a> </div>
                                <a class="utf_post_cat" href="#">Architecture</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title"> <a href="#">Science meets architecture in
                                            robotically woven, solar...</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been the industry's standard dummy text since
                                        has five...</p>
                                </div>
                            </div>

                            <div class="utf_post_block_style utf_post_float_half clearfix">
                                <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                            src="images/news/health5.jpg" alt="" /> </a> </div>
                                <a class="utf_post_cat" href="#">Traveling</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title"> <a href="#">Historical heroes and robot
                                            dinosaurs: New games on our…</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="#">Prem Jadhav</a></span> <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i> 25 Jan,
                                            2022</span> </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been the industry's standard dummy text since
                                        has five...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="sidebar utf_sidebar_right">
                    <div class="widget color-default">
                        <h3 class="utf_block_title"><span class="bg-title-orange">Blog</span> <span><a href="blog.php"
                                    class="float-right">See More</a></span></h3>
                        <div class="utf_list_post_block">
                            <ul class="utf_list_post review-post-list">
                                <li class="clearfix">
                                    <div class="utf_post_block_style post-float clearfix">
                                        <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                    src="images/blog/Two_Young_Doctors.webp" alt="" /> </a> </div>
                                        <div class="utf_post_content">
                                            <h2 class="utf_post_title"> <a href="detailsview.php">A Success Story of Two
                                                    Young
                                                    Doctors</a> </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i>
                                                    <a href="#">Eriyouth</a></span> <span class="utf_post_date"><i
                                                        class="fa fa-clock-o"></i> xx xx xx</span> </div>
                                        </div>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- 3rd Block Wrapper End -->



<?php
include "footer.php";
?>