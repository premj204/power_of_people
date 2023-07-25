<script src="<?php echo base_url(); ?>assets/editor/ckeditor/ckeditor.js"></script>

<section>
    <div class="container">
        <div class="card p-5 m-auto">
            <div class="mb-3">
                <h3>Edit Event</h3>
            </div>

            <div class="mb-3 form-group mb-3">
                <label for="title" class="form-label">Title</label>
                <p class="form-control"><?php echo $event[0]['title']; ?></p>
            </div>

            <div class="mb-3 form-group mb-3">
                <label for="address" class="form-label">Address</label>
                <p class="form-control"><?php echo $event[0]['address']; ?></p>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-3 form-group mb-3">
                        <label for="state" class="form-label">Select State</label>
                        <p class="form-control"><?php echo $event[0]['state']; ?></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3 form-group mb-3">
                        <label for="city" class="form-label">Select City</label>
                        <p class="form-control"><?php echo $event[0]['city']; ?></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3 form-group mb-3">
                        <label for="pincode" class="form-label">Pincode</label>
                        <p class="form-control"><?php echo $event[0]['pincode']; ?></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-3 form-group mb-3">
                        <label for="date" class="form-label">Date</label>
                        <p class="form-control"><?php echo $event[0]['date']; ?></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3 form-group mb-3">
                        <label class="form-label">Time</label>
                        <p class="form-control"><?php echo $event[0]['time']; ?></p>
                    </div>
                </div>

            </div>

            <div class="mb-3 form-group mb-3">
                <label class="form-label">Description</label>
                <p><?php echo $event[0]['description'];?></p>
            </div>
        </div>
    </div>
</section>