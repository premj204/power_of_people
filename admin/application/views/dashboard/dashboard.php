<link href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
<?php
         $role = $this->session->userdata('role');
        ?>
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Total</a></li>
                                <li><a class="dropdown-item" href="#">Power Of Words</a></li>
                                <li><a class="dropdown-item" href="#">Power Of Action</a></li>
                                <li><a class="dropdown-item" href="#">Power Of Charity</a></li>
                                <li><a class="dropdown-item" href="#">Power Of Health</a></li>
                                <li><a class="dropdown-item" href="#">Power Of Life's Work</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Stories <span>| Total</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-newspaper"></i>
                                </div>
                                <div class="ps-3">
                                    <h1 class="fw-bold"><?php echo $story['total_story']; ?></h1>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> <!-- blog  -->
                <div class="col-lg-4 col-md-6">
                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <h5 class="card-title">Blog</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-chat-left-text-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h1 class="fw-bold"><?php echo $blog['total_blog']; ?></h1>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- interviews Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Interviews</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-camera-reels-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h1 class="fw-bold"><?php echo $interview['total_interview']; ?></h1>
                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->



                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Recent Stories</h5>
                            <table id="" class="table  hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Upload Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-bold">
                                    <tr>
                                        <th scope="row">#1</th>
                                        <td>Brandon Jacob</td>
                                        <td>At praesentium minu</td>
                                        <td> 11 Aug, 2023</td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">#2</th>
                                        <td>Bridie Kessler</td>
                                        <td>Blanditiis dolor omnis similique</td>
                                        <td>09 April, 2023</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">#3</th>
                                        <td>Ashleigh Langosh</td>
                                        <td>At recusandae consectetur</td>
                                        <td> 6 Oct, 2023</td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">#4</th>
                                        <td>Angus Grady</td>
                                        <td>Ut voluptatem id earum et</td>
                                        <td> 02 Jan, 2023</td>
                                        <td><span class="badge bg-danger">Rejected</span></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">#5</th>
                                        <td>Raheem Lehner</td>
                                        <td>Sunt similique distinctio</td>
                                        <td> 26 May, 2023</td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card top-selling overflow-auto">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Top Interviews</h5>

                            <table class="table table-border">
                                <thead class="border">
                                    <tr>
                                        <th scope="col">Preview</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Upload Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                        </div>
                        </th>
                        <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas
                                nulla</a></td>
                        <td>$64</td>
                        <td class="fw-bold">124</td>
                        <td>$5,828</td>
                        </tr>
                        <tr>
                            <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                            <td><a href="#" class="text-primary fw-bold">Exercitationem similique
                                    doloremque</a></td>
                            <td>$46</td>
                            <td class="fw-bold">98</td>
                            <td>$4,508</td>
                        </tr>
                        <tr>
                            <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                            <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a>
                            </td>
                            <td>$59</td>
                            <td class="fw-bold">74</td>
                            <td>$4,366</td>
                        </tr>
                        <tr>
                            <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                            <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum
                                    error</a></td>
                            <td>$32</td>
                            <td class="fw-bold">63</td>
                            <td>$2,016</td>
                        </tr>
                        <tr>
                            <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                            <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus
                                    repellendus</a></td>
                            <td>$79</td>
                            <td class="fw-bold">41</td>
                            <td>$3,239</td>
                        </tr>
                        </tbody>
                        </table>

                    </div>

                </div>
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Power Of Words</a></li>
                                <li><a class="dropdown-item" href="#">Power Of Action</a></li>
                                <li><a class="dropdown-item" href="#">Power Of Charity</a></li>
                                <li><a class="dropdown-item" href="#">Power Of Health</a></li>
                                <li><a class="dropdown-item" href="#">Power Of Life's Work</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Recent Blogs</h5>
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Title </th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Upload Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><a href="#">#2457</a></th>
                                        <td>Brandon Jacob</td>
                                        <td><a href="#" class="text-primary">At praesentium minu</a></td>
                                        <td>$64</td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#">#2147</a></th>
                                        <td>Bridie Kessler</td>
                                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                                        <td>$47</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#">#2049</a></th>
                                        <td>Ashleigh Langosh</td>
                                        <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                                        <td>$147</td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#">#2644</a></th>
                                        <td>Angus Grady</td>
                                        <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                                        <td>$67</td>
                                        <td><span class="badge bg-danger">Rejected</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#">#2644</a></th>
                                        <td>Raheem Lehner</td>
                                        <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                        <td>$165</td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-4">

        <!-- Recent Activity -->
        <div class="card">
            <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
            </div>

            <div class="card-body">
                <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                <div class="activity">

                    <div class="activity-item d-flex">
                        <div class="activite-label">32 min</div>
                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                        <div class="activity-content">
                            <span><b>Blog</b></span> &nbsp;<span>title</span>
                        </div>
                    </div><!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">56 min</div>
                        <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                        <div class="activity-content">
                            <span><b>Story</b></span> &nbsp;<span>title</span>
                        </div>
                    </div><!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">2 hrs</div>
                        <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                        <div class="activity-content">
                            <span><b>Interview</b></span> &nbsp;<span>title</span>
                        </div>
                    </div><!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">1 day</div>
                        <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                        <div class="activity-content">
                            <span><b>Gallery</b></span> &nbsp;<span>title</span>
                        </div>
                    </div><!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">2 days</div>
                        <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                        <div class="activity-content">
                            <span><b>Interview</b></span> &nbsp;<span>title</span>
                        </div>
                    </div><!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">4 weeks</div>
                        <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                        <div class="activity-content">
                            <span><b>Blog</b></span> &nbsp;<span>title</span>
                        </div>
                    </div><!-- End activity item-->
                    <div class="activity-item d-flex">
                        <div class="activite-label">32 min</div>
                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                        <div class="activity-content">
                            <span><b>Blog</b></span> &nbsp;<span>title</span>
                        </div>
                    </div><!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">56 min</div>
                        <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                        <div class="activity-content">
                            <span><b>Story</b></span> &nbsp;<span>title</span>
                        </div>
                    </div><!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">2 hrs</div>
                        <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                        <div class="activity-content">
                            <span><b>Interview</b></span> &nbsp;<span>title</span>
                        </div>
                    </div><!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">1 day</div>
                        <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                        <div class="activity-content">
                            <span><b>Gallery</b></span> &nbsp;<span>title</span>
                        </div>
                    </div><!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">2 days</div>
                        <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                        <div class="activity-content">
                            <span><b>Interview</b></span> &nbsp;<span>title</span>
                        </div>
                    </div><!-- End activity item-->

                    <div class="activity-item d-flex">
                        <div class="activite-label">4 weeks</div>
                        <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                        <div class="activity-content">
                            <span><b>Blog</b></span> &nbsp;<span>title</span>
                        </div>
                    </div><!-- End activity item-->
                    <div class="activity-item d-flex">
                        <div class="activite-label">2 days</div>
                        <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                        <div class="activity-content">
                            <span><b>Interview</b></span> &nbsp;<span>title</span>
                        </div>
                    </div><!-- End activity item-->

                </div>

            </div>
        </div><!-- End Recent Activity -->



        <!-- Website Traffic -->
        <div class="card">
            <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
            </div>

            <div class="card-body pb-0">
                <h5 class="card-title">Story Chart</h5>

                <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                <script>
                document.addEventListener("DOMContentLoaded", () => {
                    echarts.init(document.querySelector("#trafficChart")).setOption({
                        tooltip: {
                            trigger: 'item'
                        },
                        legend: {
                            botton: '1%',
                            left: 'center'
                        },
                        series: [{
                            name: 'Access From',
                            type: 'pie',
                            radius: ['40%', '70%'],
                            avoidLabelOverlap: false,
                            label: {
                                show: false,
                                position: 'center'
                            },
                            emphasis: {
                                label: {
                                    show: true,
                                    fontSize: '14',
                                    fontWeight: 'bold'
                                }
                            },
                            labelLine: {
                                show: false
                            },
                            data: [{
                                    value: <?php echo $blog['total_blog']; ?>,
                                    name: 'Power Of Words'
                                },
                                {
                                    value: <?php echo $interview['total_interview']; ?>,
                                    name: 'Power Of Action'
                                },
                                {
                                    value: <?php echo $blog['total_blog']; ?>,
                                    name: 'Power Of Charity'
                                },
                                {
                                    value: <?php echo $interview['total_interview']; ?>,
                                    name: 'Power Of Health'
                                },
                                {
                                    value: <?php echo $blog['total_blog']; ?>,
                                    name: 'Power Of Lifes Work'
                                }
                            ]
                        }]
                    });
                });
                </script>

            </div>
        </div>
        <div class="card">
            <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
            </div>

            <div class="card-body pb-0">
                <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

                <div class="news">
                    <div class="post-item clearfix">
                        <img src="assets/img/news-1.jpg" alt="">
                        <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                        <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                    </div>

                    <div class="post-item clearfix">
                        <img src="assets/img/news-2.jpg" alt="">
                        <h4><a href="#">Quidem autem et impedit</a></h4>
                        <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                    </div>

                    <div class="post-item clearfix">
                        <img src="assets/img/news-3.jpg" alt="">
                        <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                        <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                    </div>

                    <div class="post-item clearfix">
                        <img src="assets/img/news-4.jpg" alt="">
                        <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                        <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                    </div>

                    <div class="post-item clearfix">
                        <img src="assets/img/news-5.jpg" alt="">
                        <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                        <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
                    </div>

                </div><!-- End sidebar recent posts-->

            </div>
        </div><!-- End News & Updates -->

    </div><!-- End Right side columns -->

    </div>
</section>


</main>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
<script>
$(document).ready(function() {
    $('#story').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        ajax: 'dashboard/fetch_story_list',
    });
});
</script>