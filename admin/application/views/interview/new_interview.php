<section>
    <div class="container">
        <div class="card p-5 m-auto text-center">
            <img src="<?php echo base_url(); ?>assets/img/cameraman.png" class="mx-auto d-block cameraman"
                alt="cameraman">
            <p>Want to see metrics on your recent video?</p>
            <p> Upload and publish a video to get started.</p>
            <div class="text-center">
                <button type="button" class="btn btn-outline-success video-upload" data-bs-toggle="modal"
                    data-bs-target="#interview">
                    Upload Video
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="interview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="interviewLabel" aria-hidden="true">
    <div class="modal-area modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="interviewLabel">Upload videos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                <form method="POST" onsubmit="return validateInterviewFrm(this);"
                id="InterviewFrm" name="InterviewFrm">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="mb-3 form-group">
                                    <label for="details" class="form-label">Youtube Video Link</label>
                                    <input type="text" class="form-control" name="video_link" id="video_link">
                                    <small>(example : https://www.youtube.com/embed/x56adyd)</small>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="details" class="form-label">Details</label>
                                    <input type="text" class="form-control" name="details" id="details">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description"
                                        rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="mb-3 form-group">
                                    <div class="thumbnail">
                                        <label for="uploadThumbnail"><i class="bi bi-images"></i></label>
                                        <p class="">
                                            Upload Thumbnail
                                            <input type="file" style="display:none;" onChange="dragNdrop(event)"
                                                ondragover="drag()" ondrop="drop()" name="uploadThumbnail"
                                                id="uploadThumbnail"/>
                                            <label for="uploadThumbnail"><span class="btn btn-danger">Choose
                                                    Image</span></label>
                                        </p>
                                    </div>
                                </div>
                                <span id="thumbnail"></span>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-outline-success">Upload</button>
                            </div>
                    </form>
                </div>


            </div>

        </div>
    </div>
</div>