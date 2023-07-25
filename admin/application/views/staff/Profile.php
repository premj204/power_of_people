<section>
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div>
</section>
<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="<?php echo base_url(); ?>assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <h2><?php echo $staff[0]['fname']; ?> <?php echo $staff[0]['lname']; ?></h2>
                    <h3><?php echo $staff[0]['position']; ?></h3>
                    <div class="social-links mt-2">
                        <a href="<?php echo $staff[0]['twitter']; ?>" target="_" class="twitter">
                            <i class="bi bi-twitter"></i></a>
                        <a href="<?php echo $staff[0]['facebook']; ?>" target="_" class="facebook"><i
                                class="bi bi-facebook"></i></a>
                        <a href="<?php echo $staff[0]['instagram']; ?>" target="_" class="instagram"><i
                                class="bi bi-instagram"></i></a>
                        <a href="<?php echo $staff[0]['linkedin']; ?>" target="_" class="linkedin"><i
                                class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#profile-overview">Overview</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#profile-change-password">Change Password</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">About</h5>
                            <p class="small fst-italic"><?php echo $staff[0]['about']; ?></p>

                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                <div class="col-lg-9 col-md-8"><?php echo $staff[0]['fname']; ?>
                                    <?php echo $staff[0]['lname']; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Position</div>
                                <div class="col-lg-9 col-md-8"><?php echo $staff[0]['position']; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Address</div>
                                <div class="col-lg-9 col-md-8"><?php echo $staff[0]['address']; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Phone</div>
                                <div class="col-lg-9 col-md-8"><?php echo $staff[0]['mobile']; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8"><?php echo $staff[0]['email']; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Gender</div>
                                <div class="col-lg-9 col-md-8"><?php echo $staff[0]['gender']; ?></div>
                            </div>

                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                            <form method="POST" onsubmit="return ValidateEditprofile(this);" id="ProfileeditFrm"
                                name="ProfileeditFrm">
                                <input type="hidden" name="id" id="id" value="<?php echo $staff[0]['id']; ?>">
                                <div style="display: none;" class="alert alert-success" role="alert"><span></span></div>
                                <div style="display: none;" class="alert alert-danger" role="alert"><span></span></div>
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                        Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="pt-2">
                                            <img src="<?php echo base_url(); ?>assets/img/profile-img.jpg" id="blah"
                                                alt="Img">
                                            <div class="py-2 ms-2">
                                                <label for="inputFile">
                                                    <span class="btn btn-primary btn-sm"
                                                        title="Upload new profile image">
                                                        <i class="bi bi-upload"></i>
                                                    </span>
                                                </label>
                                                <input type="file" id="inputFile" style="display: none;"
                                                    onchange="readUrl(this)" name="photo">

                                                <button type="button" onclick="removeImg()"
                                                    class="btn btn-danger btn-sm" title="Remove my profile image"><i
                                                        class="bi bi-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 ">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label ">Full Name</label>
                                    <div class="col-md-4 col-lg-4 form-group">
                                        <input name="fname" type="text" class="form-control" id="fname"
                                            value="<?php echo $staff[0]['fname']; ?>">
                                    </div>
                                    <div class="col-md-4 col-lg-4 form-group">
                                        <input name="lname" type="text" class="form-control" id="lname"
                                            value="<?php echo $staff[0]['lname']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                    <div class="col-md-8 col-lg-9 form-group">
                                        <textarea name="about" class="form-control" id="about"
                                            style="height: 100px"><?php echo $staff[0]['about']; ?></textarea>
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                                    <div class="col-md-8 col-lg-9 form-group">
                                        <select id="gender" name="gender" class="form-control">
                                            <option disabled>Select Gender </option>
                                            <option value="Lifestyle"
                                                <?php if($staff[0]['gender'] == 'Male'){ echo "selected";} ?>>
                                                Male
                                            </option>
                                            <option value="Health"
                                                <?php if($staff[0]['gender'] == 'Female'){ echo "selected"; } ?>>Female
                                            </option>
                                            <option value="Bussiness"
                                                <?php if($staff[0]['gender'] == 'Other'){ echo "selected"; } ?>>
                                                Other</option>
                                        </select>
                                    </div>
                                </div>










                                <div class="row mb-3">
                                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                    <div class="col-md-8 col-lg-9 form-group">
                                        <textarea name="address" class="form-control" id="address"
                                            style="height: 100px"><?php echo $staff[0]['address']; ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                    <div class="col-md-8 col-lg-9 form-group">
                                        <input name="mobile" type="text" class="form-control" id="mobile"
                                            value="<?php echo $staff[0]['mobile']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9 form-group">
                                        <input name="email" type="email" class="form-control" id="email"
                                            value="<?php echo $staff[0]['email']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                        Profile</label>
                                    <div class="col-md-8 col-lg-9 form-group">
                                        <input name="twitter" type="text" class="form-control" id="twitter"
                                            value="<?php echo $staff[0]['twitter']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                        Profile</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="facebook" type="text" class="form-control" id="facebook"
                                            value="<?php echo $staff[0]['facebook']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                        Profile</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="instagram" type="text" class="form-control" id="instagram"
                                            value="<?php echo $staff[0]['instagram']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                        Profile</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="linkedin" type="text" class="form-control" id="linkedin"
                                            value="<?php echo $staff[0]['linkedin']; ?>">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                </div>
                            </form><!-- End Profile Edit Form -->

                        </div>


                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            <form>

                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                        Password</label>
                                    <div class="col-md-8 col-lg-9">

                                        <div class="input-group ">
                                            <input type="password" name="password" class="form-control" id="password">
                                            <span class="input-group-text"> <i class="bi bi-eye-slash"
                                                    id="togglePassword"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                        Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                        Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="renewpassword" type="password" class="form-control"
                                            id="renewPassword">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form><!-- End Change Password Form -->

                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>
<script>
var a = document.getElementById("blah");

function readUrl(input) {
    if (input.files) {
        var reader = new FileReader();
        reader.readAsDataURL(input.files[0]);
        reader.onload = (e) => {
            a.src = e.target.result;
        }
    }
}

var inputFile = document.getElementById("inputFile");
removeImg = () => {
    a.src = "<?php echo base_url(); ?>assets/img/profile-img.jpg";
    inputFile.value = "";
}
</script>
<script>
const togglePassword = document
    .querySelector('#togglePassword');
const password = document.querySelector('#password');
togglePassword.addEventListener('click', () => {
    const type = password
        .getAttribute('type') === 'password' ?
        'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('bi-eye');
});
</script>