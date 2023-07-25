<link href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">

<section>
<div class="pagetitle">
    <h1>Gallery</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Gallery List</li>
        </ol>
    </nav>
</div>
</section>

<div class="card">
    <div class="card-body">
        <a href="<?php echo base_url('gallery/new_gallery'); ?>"><button type="button" class="btn btn-success float-end my-3">
                <i class="bi bi-plus-square"></i> Add Images
            </button></a>
        <h5 class="card-title">Blog list</h5>

        <table id="example" class="table cell-border hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Upload Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>                   
                    <td>2016-05-25</td> <td></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Bridie Kessler</td>
                    <td>Developer</td>  
                    <td>2014-12-05</td> <td></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Ashleigh Langosh</td>
                    <td>Finance</td>
                    <td>2011-08-12</td> <td></td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Angus Grady</td>
                    <td>28</td>
                    <td>2012-06-11</td> <td></td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Raheem Lehner</td>
                    <td>Dynamic Division Officer</td>
                    <td>2011-04-19</td> <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</main>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

<script>
new DataTable('#example');
</script>
