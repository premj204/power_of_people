<link href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">

<section>
    <div class="pagetitle">
        <h1>Blogs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Blog List</li>
            </ol>
        </nav>
    </div>
</section>

<div class="card">
    <div class="card-body">
        <a href="<?php echo base_url('blog/new_blog'); ?>"><button type="button" class="btn btn-success float-end my-3">
                <i class="bi bi-plus-square"></i> Add Blog
            </button></a>
        <h5 class="card-title">Blog list</h5>
        <div class="table-responsive">
            <table id="blog" class="table table-responsive cell-border hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Upload Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
</main>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<!-- <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/vendor/simple-datatables/simple-datatables.js"></script> -->

<script>
$(document).ready(function() {
    $('#blog').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        ajax: 'blog/fetch_blog_list',
    });
});
</script>
<style>
    .table-responsive {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
</style>