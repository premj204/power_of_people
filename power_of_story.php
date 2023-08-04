<?php
include "header.php";
include "./database/database.php";

 $id = base64_decode($_GET['id']); 
 $select = "SELECT story_name FROM story_type where id = $id"; 
 $res = mysqli_query($conn,$select);
 $data = mysqli_fetch_assoc($res); 

?>
<section>
    <div class='page-title'>
        <div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    <ul class='breadcrumb'>
                        <li><a href='#'>Home</a></li>
                        <li><?php echo $data['story_name']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class='utf_block_wrapper'>

    <div class='container'>
        <div class='row'>

            <?php
                if (!$conn) {                 
                    die("Connection failed: " . mysqli_connect_error());}
                       $sql = "SELECT `id`, `story_type_id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on` FROM `story`where `status` ='1' AND `story_type_id` = $id  ORDER BY id DESC";//(innerjoin)
                       $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo "
                            <div class='content col-md-3 item'>
                            <div class='utf_post_block_style post-grid clearfix'>
                            <a href='power_of_story_view.php?id=" . $row['id'] . "'?id=" . $row['id'] . "'>
                                <div class='utf_post_thumb utf_post_img'> <img class='img-fluid'
                                            src='./admin/story_docs/".$row['id']."/photo/".$row['uploadFile']."'></div>
                                <div class='utf_post_cat' href='#'>" . $row['category'] ."</div>
                                <div class='utf_post_content'>
                                    <h2 class='utf_post_title title-large'> " . $row['title'] ."</h2>
                                    <div class='utf_post_meta'>  <span class='utf_post_date'><i class='fa fa-calendar'></i>". date('l d M, Y',strtotime($row['added_on']))."</span> </div></div>
                                    ​</a>  </div>
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