<script src="<?php echo base_url(); ?>assets/editor/ckeditor/ckeditor.js"></script>

<section>
    <div class="container">
        <div class="card p-5 m-auto ">
            <div class="modal-body">
                <form method="POST" onsubmit="return ValidateEditinterview(this);" id="IntereditFrm"
                    name="IntereditFrm">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="mb-3 form-group">
                                <iframe src="<?php echo $interview[0]['video_link']; ?>" width="100%" height="300px"
                                    frameborder="0"></iframe>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="details" class="form-label fw-bold">Youtube Video Link</label>
                                <p class="border p-2"><?php echo $interview[0]['video_link']; ?></p>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="details" class="form-label fw-bold">Details</label>
                                <p class="border p-2"> <?php echo $interview[0]['details']; ?></p>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3 form-group">
                                    <label for="tags" class="form-label fw-bold">Category :</label>
                                    <p class="border p-2"><?php echo $interview[0]['category']; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3 form-group">
                                    <label for="tags" class="form-label">#Tags :</label>
                                    <p class="border p-2"><?php echo $interview[0]['tags']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="thmb">
                                <img src="<?php echo base_url(); ?>assets/img/cameraman.png"
                                    class="mx-auto d-block w-100" alt="">
                                    <p class="fw-bold text-center   ">Thumbnail</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-3 form-group">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <p ><?php echo $interview[0]['description']; ?></p>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-outline-success">Back</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>