
<script src="<?php echo base_url(); ?>assets/editor/ckeditor/ckeditor.js"></script>


<section>
    <div class="pagetitle">
        <h1>Edit Blog Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Edit Blog Form</li>
            </ol>
        </nav>
    </div>
</section>
<img src="" alt="">
<section>
    <div class="card py-5">
        <div class="card-body">
            <form method="POST" onsubmit="return validateBlogsFrm(this);"
                id="BlogFrm" name="BlogFrm">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="image" class="form-label">Upload Image :</label>
                        <div id="preview"></div>
                        <div class="uploadOuter form-group">
                            <label for="uploadFile" class="btn btn-outline-success"> <i
                                    class="bi bi-upload me-1"></i>Upload
                                Image</label>
                            <span>
                                <input type="file" style="display: none;" onChange="dragNdrop10(event)"
                                    ondragover="drag()" ondrop="drop()" id="uploadFile" name="uploadFile" />
                            </span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 form-group">
                                    <label for="tags" class="form-label">#Tags :</label>
                                    <input type="text" class="form-control" name="tags" id="tags">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3 form-group">
                                    <label for="headline" class="form-label">Headline :</label>
                                    <input type="text" value="<?php echo "".$row['headline'].""; ?>" class="form-control" name="headline" id="headline">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3 form-group">
                                    <label for="description" class="form-label">Description :</label>
                                    <div id="uploadFile" class="datainputs">
                                        <textarea name="description"  rows="3" class="form-control mb-2" id="description"
                                            type="text"></textarea>
                                        <script>
                                        CKEDITOR.replace('description');
                                        </script>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="">
                    <a href="articles.php"><button type="button" class="btn btn-outline-secondary">Back</button></a>
                    <button type="submit" class="btn btn-outline-success float-end">Submit</button>
                </div>
            </form><!-- End floating Labels Form -->

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