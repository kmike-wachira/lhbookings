<?php
// session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Make Up Booker</title>
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
    <!-- <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="site-header js-site-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-6 col-lg-4 site-logo" data-aos="fade">
                    <a href="index.php">Make Up Class Booker </a>
                </div>
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
                                            <li class="active"><a href="index.php">Home</a></li>

                                            <?php if (isset($_SESSION['id'])) : ?>
                                                <li><?= $_SESSION['username'] ?></li>
                                                <li><a href="timetable.php">Time table</a></li>
                                                <li><a href="addlectureroom.php">Add Halls</a></li>
                                                <li><a href="schedules.php"> Make Up time table </a></li>
                                                <li><a href="originalTT.php">Original Time table</a></li>
                                                <li><a href="logout.php">Logout</a></li>


                                            <?php else :  ?>
                                                <!-- <li><a href="timetable.php">Time table</a></li> -->
                                                <li><a href="login.php">Login</a></li>
                                                <li><a href="register.php">Register</a></li>
                                            <?php endif  ?>

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