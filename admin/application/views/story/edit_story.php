<script src="<?php echo base_url(); ?>assets/editor/ckeditor/ckeditor.js"></script>


<section>
    <div class="pagetitle">
        <h1>Edit Story Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Edit Story Form</li>
            </ol>
        </nav>
    </div>
</section>
<section>
    <div class="card py-5">
        <div class="card-body">
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
            <form method="POST" onsubmit="return validatestoryeditFrm(this);" id="StoryeditFrm" name="StoryeditFrm"
                enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?php echo $story[0]['id']; ?>">
                <div style="display: none;" class="alert alert-success" role="alert"><span></span></div>
                <div style="display: none;" class="alert alert-danger" role="alert"><span></span></div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="image" class="form-label">Upload Image :</label>
                        <div id="preview"></div>
                        <div class="uploadOuter form-group">
                            <label for="uploadFile" name="uploadFile" class="btn btn-outline-success"> <i
                                    class="bi bi-upload me-1"></i>Upload
                                Image</label>
                            <span>
                                <input type="file" style="display: none;" onChange="dragNdrop10(event)"
                                    ondragover="drag()" ondrop="drop()" id="uploadFile" name="uploadFile"
                                    accept=".png, .jpg, .jpeg" />
                            </span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 form-group">
                                    <label for="type" class="form-label">Type :</label>
                                    <select id="type" name="story_type_id" class="form-select"
                                        aria-label="Default select example">
                                        <option disabled>Select type </option>
                                        <?php 
                                         if(isset($story_type) && !empty($story_type)){
                                            foreach($story_type as $val){ ?>
                                                <option value="<?php echo $val['id']; ?>" <?php if($val['id'] == $story[0]['story_type_id']){ echo "selected"; } ?>><?php echo $val['story_name']; ?></option>
                                           <?php
                                            }
                                         }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 form-group">
                                    <label for="tags" class="form-label">Category :</label>
                                    <select id="category" name="category" class="form-select">
                                        <option disabled>Select Category </option>
                                        <option value="Lifestyle"
                                            <?php if($story[0]['category'] == 'Lifestyle'){ echo "selected";} ?>>
                                            Lifestyle
                                        </option>
                                        <option value="Health"
                                            <?php if($story[0]['category'] == 'Health'){ echo "selected"; } ?>>Health
                                        </option>
                                        <option value="Bussiness"
                                            <?php if($story[0]['category'] == 'Bussiness'){ echo "selected"; } ?>>
                                            Bussiness</option>
                                            <option value="Social Worker"
                                            <?php if($story[0]['category'] == 'Social Worker'){ echo "selected"; } ?>>
                                            Social Worker</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3 form-group">
                                    <label for="title" class="form-label">Title :</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="<?php echo $story[0]['title']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3 form-group">
                                    <label for="description" class="form-label">Description :</label>
                                    <div id="uploadFile" class="datainputs">
                                        <textarea name="description" rows="3" class="form-control mb-2" id="description"
                                            type="text"><?php echo $story[0]['description']; ?></textarea>
                                        <script>
                                        CKEDITOR.replace('description');
                                        </script>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3 form-group">
                                    <label for="tags" class="form-label">#Tags :</label>
                                    <input type="text" class="form-control" name="tags" id="tags">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <a href="articles.php"><button type="button" class="btn btn-outline-secondary">Back</button></a>
                    <button type="submit" class="btn btn-outline-success float-end">Submit</button>
                </div>
            </form>

        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script>
"use strict";

function dragNdrop10(event) {
    var fileName = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("preview");
    var previewImg = document.createElement("img");
    previewImg.setAttribute("src", fileName);
    preview.innerHTML = "";
    preview.appendChild(previewImg);
}

function drag() {
    document.getElementById("uploadFile").parentNode.className =
        "draging dragBox";
}

function drop() {
    document.getElementById("uploadFile").parentNode.className = "dragBox";
}
</script>
<style>
label {
    font-weight: 600;
}
</style>