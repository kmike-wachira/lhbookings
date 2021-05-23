    <?php include 'header.php' ?>

    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">Login Form</h1>
                    <ul class="custom-breadcrumbs mb-4">
                        <li><a href="index.php">Home</a></li>
                        <li>&bullet;</li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>

        <a class="mouse smoothscroll" href="#next">
            <div class="mouse-icon">
                <span class="mouse-wheel"></span>
            </div>
        </a>
    </section>
    <!-- END section -->

    <section class="section contact-section" id="next">
        <div class="container">
            <div class="row">
                <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">

                    <form action="/backend/functions.php" method="post" class="bg-white p-md-5 p-4 mb-5 border">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="text-black font-weight-bold" for="email">Email</label>
                                <input type="email" id="email" name="lecturer_email" class="form-control ">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="text-black font-weight-bold" for="password">Password</label>
                                <input type="password" id="password " name="lecturer_password" class=" form-control ">
                            </div>
                            <div class="row text-center ">
                                <div class="col-md-6 form-group ">
                                    <button type="submit " name="login" class="btn btn-primary text-white py-3 px-5 font-weight-bold ">Login Now </button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
                <div class="col-md-5 " data-aos="fade-up " data-aos-delay="200 ">
                    <div class="row ">
                        <div class="col-md-10 ml-auto contact-info ">
                            <p><span class="d-block ">Address:</span> <span class="text-black "> kcs/g/002/17,
                            Kiriri Women’s University of Science and Technology.</span></p>
                            <p><span class="d-block ">Phone: </span> <span class="text-black "> +254701010101</span></p>
                            <p><span class="d-block ">Email:</span> <span class="text-black ">
                                    info@k.com</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php include 'footer.php' ?>