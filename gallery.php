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
                        <li>Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="utf_block_wrapper">

    <div class="container">
        <div class="gallery g-img">

            <div class="row">
            <?php
                if (!$conn) {
                 
                    die("Connection failed: " . mysqli_connect_error());
                     }
                       $sql = "SELECT `id`, `gallery_id`, `files`, `status`, `added_on`, `updated_on` FROM `gallery_child` where `status` ='1'ORDER BY id DESC";//(innerjoin)
                       $result = mysqli_query($conn, $sql);
                         $sno = 0;
                         while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo " 
                            <div class='content col-lg-3 col-sm-12'><a data-fancybox='img' href='./admin/gallery_docs/".$row['files']."'
                            class='glightbox gallery_product  mb-3 filter a'>
                            <img src='./admin/gallery_docs/".$row['files']."'>
                        </a>
                    </div>
                            "; } ?>
            </div>

            <a href="#" id="loadMore">Load More</a>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $(".content").slice(0, 12).show();
    $("#loadMore").on("click", function(e) {
        e.preventDefault();
        $(".content:hidden").slice(0, 12).slideDown();
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