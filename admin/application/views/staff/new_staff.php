<section>
    <div class="pagetitle">
        <h1>Staff</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Staff Form</li>
            </ol>
        </nav>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="card p-5">

            <form method="POST" onsubmit="return validatestaffFrm(this);" id="StaffFrm" name="StaffFrm"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-floating form-group mb-3">
                            <input type="text" class="form-control" name="fname" id="fname">
                            <label for="fname">First Name</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-floating form-group mb-3">
                            <input type="text" class="form-control" name="lname" id="lname">
                            <label for="lname">Last Name</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-floating form-group mb-3">
                            <input type="text" class="form-control" name="email" id="email">
                            <label for="email">Email Id</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-floating form-group mb-3">
                            <select class="form-select" id="gender" name="gender">
                                <option selected disabled>select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-floating form-group mb-3">
                            <select class="form-select" id="position" name="position">
                                <option selected disabled>select position</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-floating form-group mb-3">
                            <input type="text" class="form-control" name="password" id="password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="Submit" class="btn btn-outline-secondary float-start"> Back </button>
                    <button type="Submit" class="btn btn-outline-success float-end"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php if(isset($msg) && !empty($msg)){ ?>
<script>
<?php if($msg['status']==200){ ?>
    swal({
      title: "<?php echo $msg['msg']; ?>",
      text: "You clicked the button!",
      icon: "success",
      button: "Ok Done!",
    });
<?php }else{ ?>
    swal({
      title: "<?php echo $msg['msg']; ?>",
      text: "You clicked the button!",
      icon: "error",
      button: "Ok!",
    });
<?php } ?>
</script>
<?php } ?>
<style>
label {
    font-weight: 600;
}
</style>