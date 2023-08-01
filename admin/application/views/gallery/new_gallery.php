<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<section>
    <div class="card">
        <div class="container p-5">
            <div class="g-upload-box">
                <form action="" id="gallery_form" name="gallery_form" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3 form-group">
                                <label for="title" class="form-label">Title :</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label for="tags" class="form-label">Upload Image :</label>
                                                        <div class="field" align="left">
                                <input type="file" id="files" class="dragBox" name="files" multiple />
                            </div>
                        </div>
                        <div class="col-lg-12 text-center mt-5">
                            <button class="btn btn-outline-success float-end">Upload</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
        $("#files").on("change", function(e) {
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<span class=\"pip\">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result +
                        "\" title=\"" + file.name + "\"/>" +
                        "<br/><span class=\"remove\"><i class='bi bi-x'></i></span>" +
                        "</span>").insertAfter("#files");
                    $(".remove").click(function() {
                        $(this).parent(".pip").remove();
                    });

                });
                fileReader.readAsDataURL(f);
            }
            console.log(files);
        });
    } else {
        alert("Your browser doesn't support to File API")
    }
});
</script>
<style>

input[type="file"] {
    display: block;

}

.imageThumb {
    width: 6rem;
    margin: 0 17px;
    height: 75px;
    border: 2px solid;
    padding: 1px;
    cursor: pointer;
}

.pip {
    display: inline-block;
    margin: 10px 10px 0 0;
}

.remove {
    margin: -4.7rem 7rem;
    position: absolute;
    display: block;
    background: #f00;
    color: white;
    text-align: center;
    cursor: pointer;
}

.remove:hover {
    background-color: green;
    color: white;
}
</style>