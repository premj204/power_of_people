<link href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">

<section>
<div class="pagetitle">
    <h1>Staff</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Staff List</li>
        </ol>
    </nav>
</div>
</section>

<div class="card">
    <div class="card-body">
        <a href="<?php echo base_url('staff/new_staff'); ?>"><button type="button" class="btn btn-success float-end my-3">
                <i class="bi bi-plus-square"></i> Add Staff
            </button></a>
        <h5 class="card-title">Story list</h5>

        <table id="staff" class="table cell-border hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Gender</th>
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
    $('#staff').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      ajax:'staff/fetch_staff_list',
    });
  });
</script>
<!-- <script>
new DataTable('#blog');
</script> -->
