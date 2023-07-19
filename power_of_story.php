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
                        <li>Power Of Story</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="utf_block_wrapper">

    <div class="container-fluid">
        <div class="row">

            <?php
                if (!$conn) {                 
                    die("Connection failed: " . mysqli_connect_error());}
                       $sql = "SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on` FROM `story`";//(innerjoin)
                       $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo "
                            <div class='content col-md-3 item'>
                            <div class='utf_post_block_style post-grid clearfix'>
                                <div class='utf_post_thumb utf_post_img'> <a href='#'> <img class='img-fluid'
                                            src='images/blog/1.webp' alt=''> </a> </div>
                                <a class='utf_post_cat' href='#'>" . $row['category'] ."</a>
                                <div class='utf_post_content'>
                                    <h2 class='utf_post_title title-large'> <a href='power_of_story_view.php?id=" . $row['id'] . "'?id=" . $row['id'] . "'>" . $row['title'] ."​</a> </h2>
                                    <div class='utf_post_meta'> <span class='utf_post_author'><i class='fa fa-user'></i>
                                            <a href='#'>Prem Jadhav</a></span> 
                                            <span class='utf_post_date'><i class='fa fa-clock-o'></i>". $row['added_on'] ."</span>
                                             </div>                                </div>
                            </div>
                        </div>
                            "; } ?>
        </div>

        <a href="#" id="loadMore">Load More</a>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $(".content").slice(0, 9).show();
    $("#loadMore").on("click", function(e) {
        e.preventDefault();
        $(".content:hidden").slice(0, 9).slideDown();
        if ($(".content:hidden").length == 0) {
            $("#loadMore").text("No Content").addClass("noContent");
        }
    });

})
</script>
<style>
.flex {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

.content {
    display: none;
}

#loadMore {
    width: 200px;
    color: #fff;
    display: block;
    text-align: center;
    margin: 20px auto;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid transparent;
    background-color: #fd8618;
    transition: .3s;
}

#loadMore:hover {
    color: blue;
    background-color: #fff;
    background-color: #118407;
    text-decoration: none;
}

.noContent {
    color: #000 !important;
    background-color: transparent !important;
    pointer-events: none;
}
</style>
<?php
include "footer.php";
?>