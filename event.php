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
                        <li>Events</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="utf_block_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="block category-listing">
                    <div class="row">
                    <?php
                            if (!$conn) {                 
                             die("Connection failed: " . mysqli_connect_error());
                                  }
                                $sql = "SELECT * FROM `event` where `status` ='1'";
                                $result = mysqli_query($conn, $sql);
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1;
                                        echo "
                                <div class='col-md-6 item mb-3'>
                                    <div class='row'>
                                        <div class='col-lg-4'>
                                            <div class='event-im'>
                                                <img class='img-fluid' src='images/news/1.jpg' alt=''>
                                            </div>
                                        </div>
                                        <div class='col-lg-8'>
                                            <div class='row'>
                                                <div class='col-lg-4'>
                                                <h3 class='ev-date'>".date('d',strtotime($row['date']))."</h3>
                                                <h5 class='ev-month'>".date('M',strtotime($row['date']))."</h5>
                                                <p class='ev-year'>".date('Y',strtotime($row['date']))."</p>
                                                </div>
                                                <div class='col-lg-8'>
                                                    <h3 class='eventHead'>". $row['title'] ."</h3>
                                                    <div class='eventSubtitle'>". $row['description'] ."</div>
                                                </div>
                                                <div class='col-lg-12 d-flex'>
                                                    <p class='EventLocation mx-2'><i class='fa fa-map-marker'></i> ". $row['city'] ."</p>
                                                    <a href='evnt-detail.php?id=" . $row['id'] . "'?id=" . $row['id'] . "' target='-'> <p class='EventLocation mx-2'><i class='fa fa-hand-o-right'></i> Read More
                                                    </p></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        "; } ?> <div>
                    </div>
                </div>
                <div class="py-5" id="pagination"></div>
                <!-- <div class="paging">
                    <ul class="pagination">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div> -->
            </div>

        </div>
    </div>
</section>
<style>
.category-listing .utf_post_block_style .utf_post_content .utf_post_meta {
    margin: -10px 0 8px 0;
}
</style>
<script>
var itemsPerPage = 6; // Number of items to show per page
var currentPage = 1; // Current page

var items = document.querySelectorAll('.item');
var numPages = Math.ceil(items.length / itemsPerPage);

function showPage(page) {
    var startIndex = (page - 1) * itemsPerPage;
    var endIndex = startIndex + itemsPerPage;

    items.forEach(function(item, index) {
        if (index >= startIndex && index < endIndex) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

function createPagination() {
    var pagination = document.getElementById('pagination');

    for (var i = 1; i <= numPages; i++) {
        var link = document.createElement('a');
        link.href = '#';
        link.innerText = i;
        link.className = 'pagi-btn';

        if (i === currentPage) {
            link.className = 'pagi-btn active';
        }

        link.addEventListener('click', function(e) {
            e.preventDefault();
            currentPage = parseInt(this.innerText);
            showPage(currentPage);

            // Update active link
            var activeLink = document.querySelector('#pagination .active');
            activeLink.classList.remove('active');
            this.classList.add('active');
        });

        pagination.appendChild(link);
    }
}

showPage(currentPage);
createPagination();
</script>
<?php
include "footer.php";
?>