<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login - Power Of People</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/logo.png" rel="apple-touch-icon">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo2 d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="Power Of People">
                                </a>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    </div>
                                    <form method="POST" onsubmit="return validateLogin(this);" id="login" name="login"
                                        enctype="multipart/form-data">
                                        <div class="row g-3">
                                            <div class="col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="text" name="email" class="form-control" id="email">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="password" class="form-label">Password</label>
                                                    <div class="input-group ">
                                                        <input type="password" name="password" class="form-control"
                                                            id="password">
                                                        <span class="input-group-text"> <i class="bi bi-eye-slash"
                                                                id="togglePassword"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        value="true" id="rememberMe">
                                                    <label class="form-check-label" for="rememberMe">Remember
                                                        me</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-success w-100" type="submit">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="credits"> Designed by <a href="">Mobisoftseo Technologies</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <style>
    .logo2 img {
        max-height: 200px;
        margin-right: 6px;
    }
    </style>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form.js"></script>

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
</body>

</html>