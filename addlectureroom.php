<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sogo Hotel by Colorlib.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header class="site-header js-site-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index.php">Sogo Hotel</a></div>
                <div class="col-6 col-lg-8">


                    <div class="site-menu-toggle js-site-menu-toggle" data-aos="fade">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <!-- END menu-toggle -->

                    <div class="site-navbar js-site-navbar">
                        <nav role="navigation">
                            <div class="container">
                                <div class="row full-height align-items-center">
                                    <div class="col-md-6 mx-auto">
                                        <ul class="list-unstyled menu">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="rooms.html">Rooms</a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="events.html">Events</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li class="active"><a href="reservation.html">Reservation</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">Lecture Hall</h1>
                    <ul class="custom-breadcrumbs mb-4">
                        <li><a href="index.php">Home</a></li>
                        <li>&bullet;</li>
                        <li>Add Lecture Room</li>
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
                <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">

                    <form action="/backend/addlhall.php" method="post" class="bg-white p-md-5 p-4 mb-5 border" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="text-black font-weight-bold" for="name">Lecture Hall Name</label>
                                <input type="text" id="name" name="lh_name" class="form-control ">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="text-black font-weight-bold" for="Cover Pic">Cover Picture</label>
                                <input type="file" name="lh_cover_image" accept=".png,.jpg" id="Cover Pic" class="form-control ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="text-black font-weight-bold" for="lh_capacity"> Lecture Hall Capacity</label>
                                <input type="number" id="lh_capacity" name="lh_capacity" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12 form-group">
                                <label class="text-black font-weight-bold" for="lh_description">Lecture Hall Descrption</label>
                                <textarea name="lh_description" id="lh_description" class="form-control " cols="30" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <button type="submit" name="add_lecture_hall" class="btn btn-primary text-white py-3 px-5 font-weight-bold">Add Lecture Hall</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <footer class="section footer-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-3 mb-5">
                    <ul class="list-unstyled link">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Rooms</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-5">
                    <ul class="list-unstyled link">
                        <li><a href="#">The Rooms &amp; Suites</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Restaurant</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-5 pr-md-5 contact-info">
                    <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
                    <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> 198 West 21th Street, <br> Suite 721 New York NY 10016</span></p>
                    <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> (+1) 435 3533</span></p>
                    <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@domain.com</span></p>
                </div>
                <div class="col-md-3 mb-5">
                    <p>Sign up for our newsletter</p>
                    <form action="#" class="footer-newsletter">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email...">
                            <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row pt-5">
                <p class="col-md-6 text-left">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>

                <p class="col-md-6 text-right social">
                    <a href="#"><span class="fa fa-tripadvisor"></span></a>
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-linkedin"></span></a>
                    <a href="#"><span class="fa fa-vimeo"></span></a>
                </p>
            </div>
        </div>
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>


    <script src="js/aos.js"></script>

    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>



    <script src="js/main.js"></script>
</body>

</html>