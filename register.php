    <?php include 'header.php' ?>

    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">Registration Form</h1>
                    <ul class="custom-breadcrumbs mb-4">
                        <li><a href="index.php">Home</a></li>
                        <li>&bullet;</li>
                        <li>Register</li>
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
                            <div class="col-md-6 form-group">
                                <label class="text-black font-weight-bold" for="name">Name</label>
                                <input type="text" id="name" name="lecturer_name" class="form-control ">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="text-black font-weight-bold" for="phone">Phone</label>
                                <input type="text" id="phone" name="lecturer_phone" class="form-control ">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="text-black font-weight-bold" for="email">Email</label>
                                <input type="email" id="email" name="lecturer_email" class="form-control ">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="text-black font-weight-bold" for="password">Password</label>
                                <input type="text" id="password" name="lecturer_password" class="form-control ">
                            </div>
                            <div class="col-md-6 form-group ">
                                <label class="text-black font-weight-bold " for="c_password ">Confirm Password</label>
                                <input type="password " id="c_password " name="lecturer_c_password" class="form-control ">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 form-group ">
                                <button type="submit " name="register" class="btn btn-primary text-white py-3 px-5 font-weight-bold ">Register Now</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-5 " data-aos="fade-up " data-aos-delay="200 ">
                    <div class="row ">
                        <div class="col-md-10 ml-auto contact-info ">
                            <p><span class="d-block ">Address:</span> <span class="text-black "> 98 West 21th Street,
                                    Suite 721 New York NY 10016</span></p>
                            <p><span class="d-block ">Phone:</span> <span class="text-black "> (+1) 435 3533</span></p>
                            <p><span class="d-block ">Email:</span> <span class="text-black ">
                                    info@yourdomain.com</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php' ?>