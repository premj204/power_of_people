<section>
    <div class="card">
        <div class="container p-5">
            <div class="g-upload-box">
                <form action="">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3 form-group">
                                <label for="tags" class="form-label">#Tags :</label>
                                <input type="text" class="form-control" name="tags" id="tags">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label for="tags" class="form-label">Upload Image :</label>
                            <div class="uploadOuter form-group">
                                <span class="dragBox">
                                    <spam> <i class="bi bi-cloud-plus"></i> <br> </spam>
                                    <p>Darg and Drop image here</p>
                                    <input type="file" onChange="dragNdrop(event)" ondragover="drag()" ondrop="drop()"
                                        id="uploadFile" />
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center mt-5">
                            <button class="btn btn-outline-success float-end">Upload</button>
                        </div>
                        <div id="preview"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
"use strict";

function dragNdrop(event) {
    var fileName = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("preview");
    var previewImg = document.createElement("img");
    previewImg.setAttribute("src", fileName);
    preview.innerHTML = "";
    preview.appendChild(previewImg);
}

function drag() {
    document.getElementById('uploadFile').parentNode.className = 'draging dragBox';
}

function drop() {
    document.getElementById('uploadFile').parentNode.className = 'dragBox';
}
</script>
<style>
.uploadOuter {
    text-align: center;
    padding: 20px;

    padding: 0 10px
}

.dragBox i {
    font-size: 4rem;
    padding: 0;
    margin: 0;
}

.dragBox p {
    padding: 0;
    margin: -40px 0;
}

.dragBox {

    width: 250px;
    height: 100px;
    margin: 0 auto;
    position: relative;
    text-align: center;
    font-weight: bold;
    line-height: 95px;
    color: #999;
    border: 2px dashed #ccc;
    display: inline-block;
    transition: transform 0.3s;
}

input[type="file"] {
    position: absolute;
    height: 100%;
    width: 100%;
    opacity: 0;
    top: 0;
    left: 0;

}

.draging {
    transform: scale(1.1);
}

#preview {
    border: none;
    text-align: center;
    max-width: 100%
}
</style>