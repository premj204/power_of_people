<?php
include "header.php";
include "./database/database.php";
?>
<section class="utf_featured_post_area pt-4 no-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div id="utf_featured_slider" class="owl-carousel owl-theme utf_featured_slider">
                    <div class="item" style="background-image:url(images/banner/banner_1.jpg)"></div>
                    <div class="item" style="background-image:url(images/banner/banner_2.jpg)"></div>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 pad-l">
                <div class="row">

                    <?php
                if (!$conn) {
                 
                    die("Connection failed: " . mysqli_connect_error());
                     }
                       $sql = "SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on` FROM `story` where `status` ='1' ORDER BY id DESC LIMIT 4";//(innerjoin)
                       $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo " 
                            <div class='col-md-6 pad-r-small mb-1'>
                            <a href='power_of_story_view.php?id=" . $row['id'] . "'?id=" . $row['id'] . "'>
                        <div class='utf_post_overaly_style contentTop utf_hot_post_bottom clearfix'>
                            <div class='utf_post_thumb'><img class='img-fluid'
                                         src='./admin/story_docs/".$row['id']."/photo/".$row['uploadFile']."' alt='" . $row['title'] ."' /></div>
                            <div class='utf_post_content'> <div class='utf_post_cat'>" . $row['category'] ."</div>
                                <h2 class='utf_post_title title-medium dottss text-white'title='". $row['title'] ."'> " . $row['title'] ."</h2>
                                <div class='utf_post_meta'><span class='utf_post_date'><i
                                class='fa fa-calendar'></i> ". date('l d M, Y',strtotime($row['added_on']))."</span> </div>
                            </div>
                        </div></a>
                    </div>"; } ?>
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
                       $sql = "SELECT `id`, `headline`, `description`, `uploadFile`, `category`, `status`, `added_on` FROM `blog` where `status` ='1'ORDER BY id DESC";//(innerjoin)
                       $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         
                         while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo "
                          <div class='item'>
                    <ul class='utf_list_post'>
                        
                    <a href='blog_view.php?id=" . $row['id'] . "'?id=" . $row['id'] . "'> 
                    <li class='clearfix'>
                            <div class='utf_post_block_style clearfix'>
                                <div class='utf_post_thumb thn-1'> <img class='img-fluid' src='./admin/blog_docs/".$row['id']."/photo/".$row['uploadFile']."'></div>
                                <div class='utf_post_cat>" . $row['category'] ."</div>
                                <div class='utf_post_content'>
                                    <h2 class='utf_post_title dottss title-medium' title='" . $row['headline'] ."'> " . $row['headline'] ." </h2>
                                    <div class='utf_post_meta'> </span> <span class='utf_post_date'><i
                                                class='fa fa-calendar'></i> ". date('l d M, Y',strtotime($row['added_on']))."</span></div>
                                                
                                </div>
                            </div>
                        </li></a> 


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
                                            <a href="#"> </a></span> <span class="utf_post_date"><i
                                                class="fa fa-calendar"></i> 25 Jan,
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
                                            <a href="#"> </a></span> <span class="utf_post_date"><i
                                                class="fa fa-calendar"></i> 25 Jan,
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
                                            <a href="#"> </a></span> <span class="utf_post_date"><i
                                                class="fa fa-calendar"></i> 25 Jan,
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
                                            <a href="#"> </a></span> <span class="utf_post_date"><i
                                                class="fa fa-calendar"></i> 25 Jan,
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
                                            <a href="#"> </a></span> <span class="utf_post_date"><i
                                                class="fa fa-calendar"></i> 25 Jan,
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
                                            <a href="#"> </a></span> <span class="utf_post_date"><i
                                                class="fa fa-calendar"></i> 25 Jan,
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
                                            <a href="#"> </a></span> <span class="utf_post_date"><i
                                                class="fa fa-calendar"></i> 25 Jan,
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
                                            <a href="#"> </a></span> <span class="utf_post_date"><i
                                                class="fa fa-calendar"></i> 25 Jan,
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

<section class="utf_block_wrapper p-bottom-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="utf_featured_tab">
                    <!-- <h3 class="utf_block_title"><span>Startup</span></h3> -->
                    <h3 class="utf_block_title"><span class="bg-title-green">Power Of Stories</span> <span><a
                                href="power_of_story.php" class="float-right">See More</a></span></h3>
                    <div class="row">
                        <?php
                if (!$conn) {
                 
                    die("Connection failed: " . mysqli_connect_error());
                     }
                       $sql = "SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on` FROM `story` where `status` ='1' ORDER BY id DESC LIMIT 2";
                       $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo "
                        <div class='col-lg-3 col-md-6'>
                            <div class='utf_post_block_style clearfix'>
                            <a href='power_of_story_view.php?id=" . $row['id'] . "'?id=" . $row['id'] . "'> <div class='utf_post_thumb'><img src='./admin/story_docs/".$row['id']."/photo/".$row['uploadFile']."'/> </div>
                                <div class='utf_post_cat'>".$row['category']."</div>
                                <div class='utf_post_content'>
                                    <h2 class='utf_post_title dottss title-medium' title='".$row['title']."'> ".$row['title']." </h2>
                                    <div class='utf_post_meta'> <span class='utf_post_date'><i
                                                class='fa fa-calendar'></i>". date('l d M, Y',strtotime($row['added_on']))."</span>
                                    </div>
                                </div>
                            </div>
                        </div>"; } ?>
                        <div class="col-lg-6 col-md-6">
                            <div class="utf_list_post_block">
                                <ul class="utf_list_post">
                                    <?php
                        if (!$conn) {                 
                    die("Connection failed: " . mysqli_connect_error());
                     }
                       $sql = "SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on` FROM `story` where `status` ='1' ORDER BY RAND() LIMIT 3";
                       $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo "
                            <a href='power_of_story_view.php?id=" . $row['id'] . "'?id=" . $row['id'] . "'>
                            <li class='clearfix'>
                            <div class='utf_post_block_style post-float clearfix'>
                                <div class='utf_post_thumb'> <img class='img-fluid'
                                            src='./admin/story_docs/".$row['id']."/photo/".$row['uploadFile']."' /> </div>
                                <div class='utf_post_content'>
                                    <h2 class='utf_post_title dottss  title-small'> ".$row['title']."</h2>
                                    <div class='utf_post_meta'> 
                                    <span class='utf_post_date'><i class='fa fa-calendar'></i> ". date('l d M, Y',strtotime($row['added_on']))."</span>
                                    <span class='span_utf_post_cat'>".$row['category']."</span>
                                    </div>
                                </div>
                            </div>
                             </li></a> "; } ?>
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

                            <?php
                        if (!$conn) {                 
                                      die("Connection failed: " . mysqli_connect_error());
                            }
                        $sql = "SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on`
                         FROM `story`where `status` ='1'ORDER BY id DESC";
                        $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         $row = mysqli_fetch_assoc($result) 
                            ?>
                            <a href="<?php echo"power_of_story_view.php?id=" . $row['id'] . "" ?>">
                                <div class="utf_post_overaly_style clearfix">

                                    <div class="utf_post_thumb"> <img class="img-fluid th-img"
                                            src="<?php echo"./admin/story_docs/".$row['id']."/photo/".$row['uploadFile']."" ?>"
                                            alt="" />
                                    </div>
                                    <div class="utf_post_content">
                                        <div class="utf_post_cat"><?php echo "" . $row['category'] ."" ?></div>
                                        <h2 class="utf_post_title text-white"> <?php echo "" . $row['title'] ."" ?></h2>
                                        <div class="utf_post_meta"> <span class="utf_post_date"><i
                                                    class="fa fa-calendar"></i>
                                                <?php echo "". date('l d M, Y',strtotime($row['added_on']))."" ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="utf_list_post_block">
                                <ul class="utf_list_post">

                                    <?php
                            if (!$conn) {                 
                             die("Connection failed: " . mysqli_connect_error());
                                  }
                                  $sql = "SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on`  FROM `story`where `status` ='1' ORDER BY id DESC LIMIT 3";//(innerjoin)
                                 $result = mysqli_query($conn, $sql);
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1;
                                        echo "
                                               <a href='power_of_story_view.php?id=" . $row['id'] . "'> <li class='clearfix'>
                                                    <div class='utf_post_block_style post-float clearfix'>
                                                        <div class='utf_post_thumb'> <img class='img-fluid'
                                                                        src='./admin/story_docs/".$row['id']."/photo/".$row['uploadFile']."' />
                                                                                                                        </div>
                                                        <div class='utf_post_content'>
                                                                <h2 class='utf_post_title dottss title-small'>" . $row['title'] ."</h2>
                                                            <div class='utf_post_meta'> 
                                                                <span class='utf_post_date'><i class='fa fa-calendar'></i> ". date('l d M, Y',strtotime($row['added_on']))."</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li></a>
                                                    "; } ?> </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h3 class="utf_block_title"><span class="bg-title-green">Interviews</span> <span><a
                                        href="interview.php" class="float-right">See More</a></span></h3>
                            <?php
                        if (!$conn) {                 
                                      die("Connection failed: " . mysqli_connect_error());
                            }
                        $sql = "SELECT `id`, `video_link`, `details`, `description`, `category`, `uploadFile`, `status`, `upload_date` FROM `interview`where `status` ='1' ORDER BY id DESC";//(innerjoin)
                        $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         $row = mysqli_fetch_assoc($result) 
                            ?>
                            <a href='<?php echo "interviews_view.php?id=" . $row['id'] . "'?id=" . $row['id'] . ""?>'>
                                <div class='utf_post_overaly_style last clearfix'>
                                    <div class='utf_post_thumb'> <img class='img-fluid th-img'
                                            src='<?php echo"./admin/interview_docs/".$row['id']."/photo/".$row['uploadFile']."" ?>'>
                                        <div class='video-icon'> <i class='fa fa-play'></i> </div>
                                    </div>
                                    <div class='utf_post_content'>
                                        <div class='utf_post_cat'><?php echo"" . $row['category'] ."" ?></div>
                                        <h2 class='utf_post_title text-white'> <?php echo" " . $row['details'] ." " ?>
                                        </h2>
                                        <div class='utf_post_meta'> <span class='utf_post_date'><i
                                                    class='fa fa-calendar'></i>
                                                <?php echo"". date('d M, Y',strtotime($row['upload_date']))."" ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <div class="utf_list_post_block">
                                <ul class="utf_list_post">
                                    <?php
                            if (!$conn) {                 
                             die("Connection failed: " . mysqli_connect_error());
                                  }
                                $sql = "SELECT * FROM `interview`where `status` ='1' ORDER BY id DESC LIMIT 3";
                                 $result = mysqli_query($conn, $sql);
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1;
                                        echo "
                                        <a href='interviews_view.php?id=" . $row['id'] . "'>
                                    <li class='clearfix'>
                                             <div class='utf_post_block_style post-float clearfix'>
                                             <div class='utf_post_thumb'><img class='img-fluid'
                                             src='./admin/interview_docs/".$row['id']."/photo/".$row['uploadFile']."'>
                                            <div class='video-icon video-icon-small'> <i class='fa fa-play'></i> </div></div>
                                                 <div class='utf_post_content'>
                                                     <h2 class='utf_post_title dottss title-small'> " . $row['details'] ."</h2>
                                                     <div class='utf_post_meta'>
                                                     <span class='utf_post_date'><i class='fa fa-calendar'></i>". date('l d M, Y',strtotime($row['upload_date']))."</span>
                                                    </div>
                                                 </div>
                                             </div>
                                      </li></a>"; } ?>
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
                            <li><a href="https://www.facebook.com/profile.php?id=100089729767945" target="_blank"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.youtube.com/@powerofpeople2014/featured" target="_blank"><i
                                        class="fa fa-youtube"></i></a></li>
                            <li><a href="https://twitter.com/Powerofpeople03" target="_blank"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/powerofpeople2014/" target="_blank"><i
                                        class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/power-of-people-a6146a286/" target="_blank"><i
                                        class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://in.pinterest.com/powerofpeople2014/" target="_blank"><i
                                        class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>

                    <div class="widget color-default">
                        <h3 class="utf_block_title"><span class="bg-title-orange">Events</span><span><a href="event.php"
                                    class="float-right">See More</a></span></h3>
                        <?php
                            if (!$conn) {                 
                             die("Connection failed: " . mysqli_connect_error());
                                  }
                                $sql = "SELECT * FROM `event` where `status` ='1' ORDER BY id DESC LIMIT 2";
                                $result = mysqli_query($conn, $sql);
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1;
                                        echo "<div class='border mb-3'>
                            <div class='row'>
                                <div class='col-lg-4'>
                                    <div class='event-im2'>
                                        <img class='img-fluid' src='images/news/1.jpg' alt=''>
                                    </div>
                                </div>
                                <div class='col-lg-8'>
                                <div class='eventbox'>
                                <div class='dateoc'>
                                <h3 class='ev-date'>".date('d',strtotime($row['date']))."</h3>
                                <h5 class='ev-month'>".date('M',strtotime($row['date']))."</h5>
                                <p class='ev-year'>".date('Y',strtotime($row['date']))."</p>
                                </div>
                                <div class='eventhead'>
                                <h3 class='eventHead'>" . $row['title'] ."</h3>
                                <div class='eventdes'>". $row['description'] ."</div>
                                </div>
                                </div>                                   
                                </div>
                            </div>
                        </div>"; } ?>


                        <div class="cooming_soon border mb-3">
                            <h3>Coming Soon...</h3>
                        </div>
                    </div>

                    <div class="widget color-default m-bottom-0">
                        <h3 class="utf_block_title"><span class="bg-title-green">Gallery</span></h3>
                        <div id="utf_post_slide" class="owl-carousel owl-theme utf_post_slide">
                            <?php
                if (!$conn) {
                 
                    die("Connection failed: " . mysqli_connect_error());
                     }
                       $sql = "SELECT `id`, `gallery_id`, `files`, `status`, `added_on`, `updated_on` FROM `gallery_child` where `status` ='1' ORDER BY id DESC";//(innerjoin)
                       $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo " 
                            <div class='item'><img src='./admin/gallery_docs/".$row['files']."'></div>
                            "; } ?>
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
                    <?php
                        if (!$conn) {                 
                                      die("Connection failed: " . mysqli_connect_error());
                            }
                        $sql = "SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `status`, `added_on` FROM `story` where `status` ='1'ORDER BY id DESC";//(innerjoin)
                        $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         $row = mysqli_fetch_assoc($result) 
                            ?>
                    <a href="<?php echo"power_of_story_view.php?id=" . $row['id'] . "" ?>">
                        <div class="utf_post_overaly_style clearfix">
                            <div class="utf_post_thumb"> <img class="img-fluid th-img2"
                                    src='<?php echo"./admin/story_docs/".$row['id']."/photo/".$row['uploadFile']."" ?>'
                                    alt="" />
                            </div>
                            <div class="utf_post_content">
                                <h2 class="utf_post_title hdr text-white"><?php echo"" . $row['title'] .""?></h2>
                                <div class="utf_post_meta"><span class="utf_post_date"><i
                                            class="fa fa-calendar"></i><?php echo"". date('l d M, Y',strtotime($row['added_on']))."" ?></span>
                                    <span class="span_utf_post_cat"><?php echo"" . $row['category'] ."" ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="utf_list_post_block">
                        <ul class="utf_list_post">
                            <?php
                            if (!$conn) {                 
                             die("Connection failed: " . mysqli_connect_error());
                                  }
                                  $sql = "SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on` FROM `story`where `status` ='1'ORDER BY id DESC LIMIT 3";//(innerjoin)
                                 $result = mysqli_query($conn, $sql);
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1;
                                        echo "                                        
                                        <a href='power_of_story_view.php?id=" . $row['id'] . "'?id=" . $row['id'] . "'>
                                        <li class='clearfix'>
                                            <div class='utf_post_block_style post-float clearfix'>
                                                <div class='utf_post_thumb'> <img class='img-fluid'
                                                            src='./admin/story_docs/".$row['id']."/photo/".$row['uploadFile']."' /></div>
                                                <div class='utf_post_content'>
                                                    <h2 class='utf_post_title hdr1 title-small'> " . $row['title'] ."</h2>
                                                    <div class='utf_post_meta'>
                                                        <span class='utf_post_date'><i class='fa fa-calendar'></i> ". date('l d M, Y',strtotime($row['added_on']))."</span>
                                                         </div>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        </a>
                                                        "; } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="block">
                    <h3 class="utf_block_title"><span class="bg-title-orange">Power Of Charity</span> <span><a href=""
                                class="float-right">See More</a></span></h3>
                    <?php
                        if (!$conn) {                 
                                      die("Connection failed: " . mysqli_connect_error());
                            }
                        $sql = "SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on` FROM `story`where `status` ='1'ORDER BY id DESC";//(innerjoin)
                        $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         $row = mysqli_fetch_assoc($result) 
                            ?>
                    <a href="<?php echo"power_of_story_view.php?id=" . $row['id'] . "" ?>">
                        <div class="utf_post_overaly_style clearfix">
                            <div class="utf_post_thumb"> <img class="img-fluid th-img2"
                                    src='<?php echo"./admin/story_docs/".$row['id']."/photo/".$row['uploadFile']."" ?>'
                                    alt="" />
                            </div>
                            <div class="utf_post_content">
                                <h2 class="utf_post_title hdr text-white"><?php echo"" . $row['title'] .""?></h2>
                                <div class="utf_post_meta"><span class="utf_post_date"><i
                                            class="fa fa-calendar"></i><?php echo"". date('l d M, Y',strtotime($row['added_on']))."" ?></span>
                                    <span class="span_utf_post_cat"><?php echo"" . $row['category'] ."" ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="utf_list_post_block">
                        <ul class="utf_list_post">
                            <?php
                            if (!$conn) {                 
                             die("Connection failed: " . mysqli_connect_error());
                                  }
                                  $sql = "SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on` FROM `story`where `status` ='1'ORDER BY id DESC LIMIT 3";//(innerjoin)
                                 $result = mysqli_query($conn, $sql);
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1;
                                        echo "                                        
                                        <a href='power_of_story_view.php?id=" . $row['id'] . "'>
                                        <li class='clearfix'>
                                            <div class='utf_post_block_style post-float clearfix'>
                                                <div class='utf_post_thumb'> <img class='img-fluid'
                                                            src='./admin/story_docs/".$row['id']."/photo/".$row['uploadFile']."' /></div>
                                                <div class='utf_post_content'>
                                                    <h2 class='utf_post_title hdr1 title-small'> " . $row['title'] ."</h2>
                                                    <div class='utf_post_meta'>
                                                        <span class='utf_post_date'><i class='fa fa-calendar'></i> ". date('l d M, Y',strtotime($row['added_on']))."</span>
                                                         </div>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        </a>
                                                        "; } ?>
                        </ul>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="block">
                    <h3 class="utf_block_title"><span class="bg-title-green">Power Of Health</span> <span><a href=""
                                class="float-right">See More</a></span></h3>
                    <?php
                        if (!$conn) {                 
                                      die("Connection failed: " . mysqli_connect_error());
                            }
                        $sql = "SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on` FROM `story`where `status` ='1'ORDER BY id DESC";//(innerjoin)
                        $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         $row = mysqli_fetch_assoc($result) 
                            ?>
                    <a href="<?php echo"power_of_story_view.php?id=" . $row['id'] . "" ?>">
                        <div class="utf_post_overaly_style clearfix">
                            <div class="utf_post_thumb"> <img class="img-fluid th-img2"
                                    src='<?php echo"./admin/story_docs/".$row['id']."/photo/".$row['uploadFile']."" ?>'
                                    alt="" />
                            </div>
                            <div class="utf_post_content">
                                <h2 class="utf_post_title hdr text-white"><?php echo"" . $row['title'] .""?></h2>
                                <div class="utf_post_meta"><span class="utf_post_date"><i
                                            class="fa fa-calendar"></i><?php echo"". date('l d M, Y',strtotime($row['added_on']))."" ?></span>
                                    <span class="span_utf_post_cat"><?php echo"" . $row['category'] ."" ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="utf_list_post_block">
                        <ul class="utf_list_post">
                            <?php
                            if (!$conn) {                 
                             die("Connection failed: " . mysqli_connect_error());
                                  }
                                  $sql = "SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on` FROM `story`where `status` ='1'ORDER BY id DESC LIMIT 3";//(innerjoin)
                                 $result = mysqli_query($conn, $sql);
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1;
                                        echo "                                        
                                        <a href='power_of_story_view.php?id=" . $row['id'] . "'>
                                        <li class='clearfix'>
                                      <div class='utf_post_block_style post-float clearfix'>
                                      <div class='utf_post_thumb'> <img class='img-fluid'
                                        src='./admin/story_docs/".$row['id']."/photo/".$row['uploadFile']."' /></div>
                                    <div class='utf_post_content'>
                                   <h2 class='utf_post_title hdr1 title-small'> " . $row['title'] ."</h2>
                                <div class='utf_post_meta'>
                                <span class='utf_post_date'><i class='fa fa-calendar'></i> ". date('l d M, Y',strtotime($row['added_on']))."</span>
                                </div>
                                    </div>
                                  </div>
                                 </li>
                               </a>
                                "; } ?>
                        </ul>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="block">
                    <h3 class="utf_block_title"><span class="bg-title-orange">POWER OF LIFE'S WORK</span> <span><a
                                href="" class="float-right">See More</a></span></h3>
                    <?php
                        if (!$conn) {                 
                                      die("Connection failed: " . mysqli_connect_error());
                            }
                        $sql = "SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on` FROM `story`where `status` ='1' ORDER BY id DESC";//(innerjoin)
                        $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         $row = mysqli_fetch_assoc($result) 
                            ?>
                    <a href="<?php echo"power_of_story_view.php?id=" . $row['id'] . "" ?>">
                        <div class="utf_post_overaly_style clearfix">
                            <div class="utf_post_thumb"> <img class="img-fluid th-img2"
                                    src='<?php echo"./admin/story_docs/".$row['id']."/photo/".$row['uploadFile']."" ?>'
                                    alt="" />
                            </div>
                            <div class="utf_post_content">
                                <h2 class="utf_post_title hdr text-white"><?php echo"" . $row['title'] .""?></h2>
                                <div class="utf_post_meta"><span class="utf_post_date"><i
                                            class="fa fa-calendar"></i><?php echo"". date('l d M, Y',strtotime($row['added_on']))."" ?></span>
                                    <span class="span_utf_post_cat"><?php echo"" . $row['category'] ."" ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="utf_list_post_block">
                        <ul class="utf_list_post">
                            <?php
                            if (!$conn) {                 
                             die("Connection failed: " . mysqli_connect_error());
                                  }
                                  $sql = "SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on` FROM `story`where `status` ='1'ORDER BY id DESC LIMIT 3";//(innerjoin)
                                 $result = mysqli_query($conn, $sql);
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1;
                                        echo "                                        
                                        <a href='power_of_story_view.php?id=" . $row['id'] . "'>
                                        <li class='clearfix'>
                                            <div class='utf_post_block_style post-float clearfix'>
                                                <div class='utf_post_thumb'> <img class='img-fluid'
                                                            src='./admin/story_docs/".$row['id']."/photo/".$row['uploadFile']."' /></div>
                                                <div class='utf_post_content'>
                                                    <h2 class='utf_post_title hdr1 title-small'> " . $row['title'] ."</h2>
                                                    <div class='utf_post_meta'>
                                                        <span class='utf_post_date hdr1'><i class='fa fa-calendar '></i> ". date('l d M, Y',strtotime($row['added_on']))."</span>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        </a>
                                                        "; } ?>
                        </ul>
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
                                            <a href="#"> </a></span> <span class="utf_post_date"><i
                                                class="fa fa-calendar"></i> 25 Jan,
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
                                            <a href="#"> </a></span> <span class="utf_post_date"><i
                                                class="fa fa-calendar"></i> 25 Jan,
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
                                            <a href="#"> </a></span> <span class="utf_post_date"><i
                                                class="fa fa-calendar"></i> 25 Jan,
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
                                            <a href="#"> </a></span> <span class="utf_post_date"><i
                                                class="fa fa-calendar"></i> 25 Jan,
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
                                            <a href="#"> </a></span> <span class="utf_post_date"><i
                                                class="fa fa-calendar"></i> 25 Jan,
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
                                            <a href="#"> </a></span> <span class="utf_post_date"><i
                                                class="fa fa-calendar"></i> 25 Jan,
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
                                                        class="fa fa-calendar"></i> xx xx xx</span> </div>
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