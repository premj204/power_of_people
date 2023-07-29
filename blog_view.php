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
                        <li><a href="index.php">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="utf_block_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
             <?php
                if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $id=$_GET['id']; 
            $sql = "SELECT * FROM `blog` WHERE `id` = $id"; 
             $result = mysqli_query($conn, $sql);
             $row = mysqli_fetch_assoc($result);
             $sno = 0;
             ?>
                <div class="single-post">
                    <div class="utf_post_title-area"> <a class="utf_post_cat" href="#"><?php echo "".$row['category'].""; ?></a>
                        <h2 class="utf_post_title"> <?php echo "".$row['headline'].""; ?></h2>
                        <div class="utf_post_meta">   <!--<span class="utf_post_author"> By <a href="#">Eriyouth</a> -->
                            </span>
                            <span class="utf_post_date"><i class="fa fa-clock-o"></i> <?php echo "". date('d M, Y',strtotime($row['added_on'])).""; ?></span>
                             <!-- <span class="post-hits"><i class="fa fa-eye"></i> 21</span>  -->
                        </div>
                    </div>
            
                    <div class="utf_post_content-area">
                        <div class='post-media post-featured-image'><img src='./admin/blog_docs/<?php echo $row['id']; ?>/photo/<?php echo $row['uploadFile'] ?>'
                                    class='img-fluid' alt=''>
                        </div>
                        <div class='entry-content'>
                        <?php echo "".$row['description'].""; ?>
                        </div>
                        <!-- <div class="share-items clearfix">
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
                        </div> -->
                    </div>
                </div>

                <!-- <div class="author-box">
                    <div class="author-info">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="author-img pull-left"> <img src="images/news/author.png" alt=""> </div>
                            </div>
                            <div class="col-lg-10">
                                <h3> </h3>
                                <p class="mb-3"><b>Author</b></p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has
                                    been the industry's standard dummy text ever since It has survived not only five
                                    centuries,
                                    but also the leap into electronic type setting, remaining essentially unchanged.</p>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div id="comments" class="comments-area block">
                    <h3 class="utf_block_title"><span class="bg-title-orange">13 Comments</span></h3>
                    <ul class="comments-list">
                        <li>
                            <div class="comment"> <img class="comment-avatar pull-left" alt=""
                                    src="images/news/author.png">
                                <div class="comment-body">
                                    <div class="meta-data"> <span class="comment-author">Miss Lisa Doe</span> <span
                                            class="comment-date pull-right">15 Jan, 2022</span> </div>
                                    <div class="comment-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since It has
                                            survived not only five centuries, but also the leap into electronic type
                                            setting, remaining essentially unchanged.</p>
                                    </div>
                                    <div class="text-left"> <a class="comment-reply" href="#"><i
                                                class="fa fa-share"></i> Reply</a> </div>

                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="comment"> <img class="comment-avatar pull-left" alt=""
                                    src="images/news/author.png">
                                <div class="comment-body">
                                    <div class="meta-data"> <span class="comment-author">Miss Lisa Doe</span> <span
                                            class="comment-date pull-right">15 Jan, 2022</span> </div>
                                    <div class="comment-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since It has
                                            survived not only five centuries, but also the leap into electronic type
                                            setting, remaining essentially unchanged.</p>
                                    </div>
                                    <div class="text-left"> <a class="comment-reply" href="#"><i
                                                class="fa fa-share"></i> Reply</a> </div>

                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="comment"> <img class="comment-avatar pull-left" alt=""
                                    src="images/news/author.png">
                                <div class="comment-body">
                                    <div class="meta-data"> <span class="comment-author">Miss Lisa Doe</span> <span
                                            class="comment-date pull-right">15 Jan, 2022</span> </div>
                                    <div class="comment-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since It has
                                            survived not only five centuries, but also the leap into electronic type
                                            setting, remaining essentially unchanged.</p>
                                    </div>
                                    <div class="text-left"> <a class="comment-reply" href="#"><i
                                                class="fa fa-share"></i> Reply</a> </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div> -->

                <!-- comment form start  -->
                <!-- <div class="comments-form">
                    <h3 class="title-normal">Leave a comment</h3>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" placeholder="Name" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" placeholder="Email"
                                        type="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control required-field" id="message" placeholder="Comment"
                                        rows="20"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <button class="comments-btn btn btn-primary" type="submit">Post Comment</button>
                        </div>
                    </form>
                </div> -->
                <!-- comment form end  -->
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
                        <h3 class="utf_block_title"><span class="bg-title-orange">Popular</span></h3>
                        <div class="utf_list_post_block">
                            <ul class="utf_list_post">

                            <?php
                if (!$conn) {
                 
                    die("Connection failed: " . mysqli_connect_error());
                     }
                       $sql = "SELECT `id`, `headline`, `description`, `uploadFile`, `category`, `status`, `added_on` FROM `blog` where `status` ='1' ORDER BY RAND() LIMIT 7";//(innerjoin)
                       $result = mysqli_query($conn, $sql);

                         $sno = 0;
                         while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo "
                            <li class='clearfix'>
                            <div class='utf_post_block_style post-float clearfix'>
                                <div class='utf_post_thumb'> <a href='#'> <img class='img-fluid'
                                            src='./admin/blog_docs/".$row['id']."/photo/".$row['uploadFile']."' alt=''> </a> <a class='utf_post_cat'
                                        href='#'>".$row['category']."</a> </div>
                                <div class='utf_post_content'>
                                    <h2 class='utf_post_title title-small'> <a href='#'>".$row['headline']."</a> </h2>
                                    <div class='utf_post_meta'>  <span
                                            class='utf_post_date'><i class='fa fa-clock-o'></i>". date('d M, Y',strtotime($row['added_on']))."</span><span class='utf_post_author'><i
                                            class='fa fa-user'></i> <a href='#'> </a></span> </div>
                                </div>
                            </div>
                        </li>
                            "; } ?>

                                

                                
                            </ul>
                        </div>
                    </div>

                    <!-- <div class="widget m-bottom-0">
                        <h3 class="utf_block_title"><span class="bg-title-green">Newsletter</span></h3>
                        <div class="utf_newsletter_block">
                            <div class="utf_newsletter_introtext">
                                <h4>Subscribe Newsletter!</h4>
                                <p>Lorem ipsum dolor sit consectetur adipiscing elit Maecenas in pulvinar neque Nulla
                                    finibus lobortis pulvinar.</p>
                            </div>
                            <div class="utf_newsletter_form">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <input type="email" name="email" id="utf_newsletter_form-email"
                                            class="form-control form-control-lg" placeholder="E-Mail Address"
                                            autocomplete="off">
                                        <button class="btn btn-primary">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>