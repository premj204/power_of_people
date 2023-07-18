<link href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">

<section>
<div class="pagetitle">
    <h1>Story</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Story List</li>
        </ol>
    </nav>
</div>
</section>

<div class="card">
    <div class="card-body">
        <a href="<?php echo base_url('story/new_story'); ?>"><button type="button" class="btn btn-success float-end my-3">
                <i class="bi bi-plus-square"></i> Add Story
            </button></a>
        <h5 class="card-title">Story list</h5>

        <table id="story" class="table cell-border hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
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
</main>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<!-- <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/vendor/simple-datatables/simple-datatables.js"></script> -->

<script>
  $(document).ready(function () {
    $('#story').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      ajax: 'story/fetch_story_list',
    });
  });
</script>
<!-- <script>
new DataTable('#blog');
</script> -->
