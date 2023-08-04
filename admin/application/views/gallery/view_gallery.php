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
    <div class="container">
    <p class=""><?php echo $gallery[0]['title']; ?> </p>
        <div class="row">
            <div class='content col-lg-3 col-sm-12'>
                <img
                    src='<?php echo base_url(); ?>gallery_docs/<?php echo $gallery[0]['id']?>/photo/<?php echo $gallery_child[0]['file']?>'>
            </div>
        </div>
    </div>
</section>