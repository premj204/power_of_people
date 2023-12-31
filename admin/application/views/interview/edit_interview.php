<script src="<?php echo base_url(); ?>assets/editor/ckeditor/ckeditor.js"></script>

<section>
    <div class="container">
        <div class="card p-5 m-auto ">
            <div class="modal-body">
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
                <form method="POST" onsubmit="return ValidateEditinterview(this);" id="IntereditFrm"
                    name="IntereditFrm">
                    <input type="hidden" name="id" id="id" value="<?php echo $interview[0]['id']; ?>">
                    <div style="display: none;" class="alert alert-success" role="alert"><span></span></div>
                    <div style="display: none;" class="alert alert-danger" role="alert"><span></span></div>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="mb-3 py-3 form-group">
                                <iframe src="<?php echo $interview[0]['video_link']; ?>" width="100%" height="300px"
                                    frameborder="0"></iframe>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="details" class="form-label">Youtube Video Link</label>
                                <input type="text" class="form-control" name="video_link" id="video_link"
                                    value="<?php echo $interview[0]['video_link']; ?>">
                                <small>(example : https://www.youtube.com<span
                                        style="color: red;">/embed/</span>x56adyd)</small>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="details" class="form-label">Details</label>
                                <input type="text" class="form-control" name="details" id="details"
                                    value="<?php echo $interview[0]['details']; ?>">
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3 form-group">
                                    <label for="tags" class="form-label">Category :</label>

                                    <select id="category" name="category" class="form-select">
                                        <option disabled>Select Category </option>
                                        <option value="Lifestyle"
                                            <?php if($interview[0]['category'] == 'Lifestyle'){ echo "selected";} ?>>
                                            Lifestyle
                                        </option>
                                        <option value="Health"
                                            <?php if($interview[0]['category'] == 'Health'){ echo "selected"; } ?>>
                                            Health
                                        </option>
                                        <option value="Bussiness"
                                            <?php if($interview[0]['category'] == 'Bussiness'){ echo "selected"; } ?>>
                                            Bussiness</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="mb-3 form-group">
                                        <div class="thumbnail">
                                            <label for="uploadFile"><i class="bi bi-images"></i></label>
                                            <p class="">
                                                Upload Thumbnail
                                                <input type="file" style="display:none;" onChange="dragNdrop(event)"
                                                    ondragover="drag()" ondrop="drop()" name="uploadFile"
                                                    id="uploadFile" />
                                                <label for="uploadFile"><span class="btn btn-danger">Choose
                                                        Image</span></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7"> <span id="thumbnail"></span></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3 form-group">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description"
                                    rows="3"><?php echo $interview[0]['description']; ?></textarea>
                                <script>
                                CKEDITOR.replace('description');
                                </script>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-outline-success">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>