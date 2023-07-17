<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<section class="login-block">
    <div class="container">
        <div class="log-tab">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">Login Now</h2>
                    <form method="POST" class="login-form" action="#" id="login" name="login"
                        onsubmit="return validateLogin(this)">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="fw-semibold">Email</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="fw-semibold">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="*******">
                        </div>
                        <div>
                            <a href="#"> <small>Forgot Password ?</small></a>
                        </div>
                        <div class="mt-3 text-center">
                            <button type="submit" class="btn bg-login text-white ">Submit</button>
                        </div>

                        <div class="form-check py-3">
                            <label class="form-check-label">
                                <small>Don't have an account?</small>
                                <a href="#">Create Account</a>
                            </label>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid"
                                    src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">

                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid"
                                    src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg"
                                    alt="Second slide">

                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid"
                                    src="https://images.pexels.com/photos/12993526/pexels-photo-12993526.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                    alt="Third slide">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js">
</script>
<script src="js/form.js"></script>
<style>
.login-block {
    background: linear-gradient(150deg, #FFB88C, #fff, #beffd0);
    height: 100%;
    width: 100%;
    animation: gradient 1s ease infinite;
    padding: 50px 0;
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }

    50% {
        background-position: 100% 50%;
    }

    100% {
        background-position: 0% 50%;
    }
}

.banner-sec {
    background: url(https://static.pexels.com/photos/33972/pexels-photo.jpg) no-repeat left bottom;
    background-size: cover;
    min-height: 500px;
    border-radius: 0 10px 10px 0;
    padding: 0;
}

.container {
    justify-content: center;
    background: #fff;
    border-radius: 10px;
    /* box-shadow: 15px 20px 0px rgba(0, 0, 0, 0.1); */
}

.carousel-inner {
    border-radius: 0 10px 10px 0;
}

.carousel-caption {
    text-align: left;
    left: 5%;
}

.login-sec {
    padding: 50px 30px;
    position: relative;
}



.login-sec .copy-text i {
    color: orange;
}

.login-sec .copy-text a {
    color: #E36262;
}

.login-sec h2 {
    margin-bottom: 30px;
    font-weight: 800;
    font-size: 30px;
    color: orange;
}
.errorMsgArrow{color: red;}
.login-sec h2:after {
    content: " ";
    width: 100px;
    height: 5px;
    background: orange;
    display: block;
    margin-top: 20px;
    border-radius: 3px;
    margin-left: auto;
    margin-right: auto
}

.log-tab {
    margin-top: 20%;
}

a {
    color: green;
    text-decoration: none;
}

a:hover {
    color: orange;
    text-decoration: none;
}

.bg-login {
    width: 100%;
    background: green;
    color: #fff;
    font-weight: 600;
}

.banner-text {
    width: 70%;
    position: absolute;
    bottom: 40px;
    padding-left: 20px;
}

.banner-text h2 {
    color: #fff;
    font-weight: 600;
}

.banner-text h2:after {
    content: " ";
    width: 100px;
    height: 5px;
    background: #FFF;
    display: block;
    margin-top: 20px;
    border-radius: 3px;
}

.banner-text p {
    color: #fff;
}
</style>