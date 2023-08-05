<script src="<?php echo base_url(); ?>assets/editor/ckeditor/ckeditor.js"></script>

<section>
    <div class="container">
        <div class="card p-5 m-auto">
            <div class="mb-3">
                <h3>Edit Event</h3>
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
            <form method="POST" onsubmit="return ValidateEditevent(this);" id="editEventFrm" name="editEventFrm">
            <input type="hidden" name="id" id="id" value="<?php echo $event[0]['id']; ?>">
                    <div style="display: none;" class="alert alert-success" role="alert"><span></span></div>
                    <div style="display: none;" class="alert alert-danger" role="alert"><span></span></div>
                <div class="mb-3 form-group mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $event[0]['title']; ?>">
                </div>

                <div class="mb-3 form-group mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control" rows="1"><?php echo $event[0]['address']; ?></textarea>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3 form-group mb-3">
                        <label for="state" class="form-label">Select State</label>
                            <select id="state" name="state" class="form-select" aria-label="Default select example">
                                <option disabled>Select State</option>
                                <option value="Maharashtra"
                                    <?php if($event[0]['state'] == 'Maharashtra'){ echo "selected";} ?>>
                                    Maharashtra
                                </option>   
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 form-group mb-3">
                            <label for="city" class="form-label">Select City</label>
                            <select id="city" name="city" class="form-select" aria-label="Default select example">
                                <option disabled>Select City</option>
                                <option value="Mumbai"
                                    <?php if($event[0]['city'] == 'Mumbai'){ echo "selected";} ?>>
                                    Mumbai
                                </option>
                                <option value="Thane"
                                    <?php if($event[0]['city'] == 'Thane'){ echo "selected";} ?>>
                                    Thane
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="mb-3 form-group mb-3">
                        <label for="pincode" class="form-label">Pincode</label>
                        <input type="number" onkeypress="if(this.value.length==6) return false;" value="<?php echo $event[0]['pincode']; ?>" class="form-control"
                            name="pincode" id="pincode">
                    </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3 form-group mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" value="" name="date" id="date">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 form-group mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" class="form-control" name="time" id="time"value="">
                        </div>
                    </div>

                </div>

                <div class="mb-3 form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="1"><?php echo $event[0]['description']; ?></textarea>
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