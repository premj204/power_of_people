<script src="<?php echo base_url(); ?>assets/editor/ckeditor/ckeditor.js"></script>


<section>
    <div class="pagetitle">
        <h1>View Story</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">View Story</li>
            </ol>
        </nav>
    </div>
</section>
<section>
    <div class="card py-5">
        <div class="card-body">

            <div class="row g-3">
                <div class="col-md-4">
                    <div>
                        <img src="" alt="">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3 py-2 form-group">
                                <label for="type" class="form-label">Type :</label>
                                <p class=""><?php echo $story[0]['type']; ?> </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3 py-2 form-group">
                                <label for="tags" class="form-label">Category :</label>
                                <p class=""><?php echo $story[0]['category']; ?> </p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 py-2 form-group">
                                <label for="title" class="form-label">Title :</label>
                                <p class=""><?php echo $story[0]['title']; ?> </p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 py-2 form-group">
                                <label for="description" class="form-label">Description :</label>
                                <textarea class="form-control"><?php echo $story[0]['description']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 py-2 form-group">
                                <label for="tags" class="form-label">#Tags :</label>
                                <p class="border p-2"><?php echo $story[0]['tags']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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