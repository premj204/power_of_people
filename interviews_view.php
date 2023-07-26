<?php
include "header.php";
include "./database/database.php";
?>


<section>
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li>Category Name</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="utf_block_wrapper">
    <div class="container">
 
    <?php
                if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $id=$_GET['id']; 
                $sql = "SELECT * FROM `interview` WHERE `id` = $id"; 
             $result = mysqli_query($conn, $sql);
             $row = mysqli_fetch_assoc($result);
             $sno = 0;
             ?>


        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="single-post">
                    <div class="utf_post_title-area"> <a class="utf_post_cat" href="#">Food</a>
                        <h2 class="utf_post_title"><?php echo" " . $row['details'] ." " ?></h2>
                        <div class="utf_post_meta"> <span class="utf_post_author"> By <a href="#"> </a> </span>
                            <span class="utf_post_date"><i class="fa fa-clock-o"></i><?php echo" " . $row['upload_date'] ." " ?></span>
                             <span class="post-hits"><i class="fa fa-eye"></i> 21</span> <span class="post-comment">
                             <i class="fa fa-comments-o"></i> <a href="#" class="comments-link"><span>01</span></a></span>
                        </div>
                    </div>

                    <div class="utf_post_content-area">
                        <div class="entry-content">
                            <div class="post-media post-video">
                                <div class="embed-responsive">
                                    <iframe src="<?php echo" " . $row['video_link'] ." " ?>" width="500"
                                        height="281" allowfullscreen=""></iframe> <!-- ?autoplay=1  video auto play-->
                                </div>
                            </div>
                            <p><?php echo" " . $row['description'] ." " ?></p>
                        </div>

                        <div class="tags-area clearfix">
                            <div class="post-tags">
                                <span>Tags:</span>
                                <a href="#"># Business</a>
                                <a href="#"># Corporate</a>
                                <a href="#"># Services</a>
                                <a href="#"># Customer</a>
                            </div>
                        </div>

                        <div class="share-items clearfix">
                            <ul class="post-social-icons unstyled">
                                <li class="facebook"> <a href="#"> <i class="fa fa-facebook"></i> <span
                                            class="ts-social-title">Facebook</span></a> </li>
                                <li class="twitter"> <a href="#"> <i class="fa fa-twitter"></i> <span
                                            class="ts-social-title">Twitter</span></a> </li>
                                <li class="gplus"> <a href="#"> <i class="fa fa-google-plus"></i> <span
                                            class="ts-social-title">Google +</span></a> </li>
                                <li class="pinterest"> <a href="#"> <i class="fa fa-pinterest"></i> <span
                                            class="ts-social-title">Pinterest</span></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="author-box">
                    <div class="author-img pull-left"> <img src="images/news/author.png" alt=""> </div>
                    <div class="author-info">
                        <h3>Miss Lisa Doe</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since It has survived not only five centuries,
                            but also the leap into electronic type setting, remaining essentially unchanged.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="sidebar utf_sidebar_right">
                    <div class="widget">
                        <h3 class="utf_block_title"><span class="bg-title-orange">Follow Us</span></h3>
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
                        <h3 class="utf_block_title"><span class="bg-title-green">Popular News</span></h3>
                        <div class="utf_list_post_block">
                            <ul class="utf_list_post">
                                <li class="clearfix">
                                    <div class="utf_post_block_style post-float clearfix">
                                        <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                    src="images/news/1.jpg" alt=""> </a> <a class="utf_post_cat"
                                                href="#">Gadgets</a> </div>
                                        <div class="utf_post_content">
                                            <h2 class="utf_post_title title-small"> <a href="#">Zhang social media pop
                                                    also known when smart innocent...</a> </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i> <a href="#"> </a></span> <span
                                                    class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                    2022</span> </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="clearfix">
                                    <div class="utf_post_block_style post-float clearfix">
                                        <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                    src="images/news/2.jpg" alt=""> </a> <a class="utf_post_cat"
                                                href="#">Travel</a> </div>
                                        <div class="utf_post_content">
                                            <h2 class="utf_post_title title-small"> <a href="#">Zhang social media pop
                                                    also known when smart innocent...</a> </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i> <a href="#"> </a></span> <span
                                                    class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                    2022</span> </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="clearfix">
                                    <div class="utf_post_block_style post-float clearfix">
                                        <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                    src="images/news/3.jpg" alt=""> </a> <a class="utf_post_cat"
                                                href="#">Traveling</a> </div>
                                        <div class="utf_post_content">
                                            <h2 class="utf_post_title title-small"> <a href="#">Zhang social media pop
                                                    also known when smart innocent...</a> </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i> <a href="#"> </a></span> <span
                                                    class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                    2022</span> </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="clearfix">
                                    <div class="utf_post_block_style post-float clearfix">
                                        <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid"
                                                    src="images/news/4.jpg" alt=""> </a> <a class="utf_post_cat"
                                                href="#">Food</a> </div>
                                        <div class="utf_post_content">
                                            <h2 class="utf_post_title title-small"> <a href="#">Zhang social media pop
                                                    also known when smart innocent...</a> </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i> <a href="#"> </a></span> <span
                                                    class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan,
                                                    2022</span> </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget text-center"> <img class="banner img-fluid"
                            src="images/banner-ads/ad-sidebar.png" alt=""> </div>
                    <div class="widget widget-tags">
                        <h3 class="utf_block_title"><span class="bg-title-orange">Popular Tags</span></h3>
                        <ul class="unstyled clearfix">
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Corporate</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Customer</a></li>
                            <li><a href="#">Money</a></li>
                            <li><a href="#">Health</a></li>
                            <li><a href="#">Lifestyles</a></li>
                            <li><a href="#">Traveling</a></li>
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">Wordpress</a></li>
                            <li><a href="#">Customer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>