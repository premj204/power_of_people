<script src="<?php echo base_url(); ?>assets/editor/ckeditor/ckeditor.js"></script>

<section>
    <div class="container">
        <div class="card p-5 m-auto">
            <div class="mb-3">
                <h3>Add Event</h3>
            </div>
            <?php 
          if(isset($msg) && !empty($msg)){
            // echo "<pre>";print_r($msg); 
            if($msg['status']==200){ ?>
              <div style="display: block;" class="alert alert-success" role="alert"><span><?php echo $msg['msg']; ?></span></div>
            <?php }else{?> 
              <div style="display: block;" class="alert alert-danger" role="alert"><span><?php echo $msg['msg']; ?></span></div>
            <?php } ?>
        <?php }else{ ?>
              <div style="display: none;" class="alert alert-success" role="alert"><span></span></div>
              <div style="display: none;" class="alert alert-danger" role="alert"><span></span></div>
        <?php } ?>
            <form method="POST" onsubmit="return validateEventFrm(this);" id="EventFrm" name="EventFrm">
                <div class="mb-3 form-group mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>

                <div class="mb-3 form-group mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control" rows="1"></textarea>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3 form-group mb-3">
                            <label for="state" class="form-label">Select State</label>
                            <select id="state" name="state" class="form-select"
                                aria-label="Default select example">
                                <option selected disabled>Select State</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Goa">Goa</option>
                            </select>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 form-group mb-3">
                            <label for="city" class="form-label">Select City</label>

                            <select title="Select City" name="city" class="form-control" id="city">
                            <option selected disabled>Select City</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Thane">Thane</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 form-group mb-3">
                            <label for="pincode" class="form-label">Pincode</label>
                            <input type="number" onkeypress="if(this.value.length==6) return false;"
                                class="form-control" name="pincode" id="pincode">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3 form-group mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" id="date">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 form-group mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" class="form-control" name="time" id="time">
                        </div>
                    </div>

                </div>

                <div class="mb-3 form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="1"></textarea>
                    <script>
                    CKEDITOR.replace('description');
                    </script>
                </div>
                <div>
                    <button type="submit" class="btn btn-outline-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</section>