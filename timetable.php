<?php
include 'backend/functions.php';
include 'header.php';

?>
    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">Timetable</h1>
                    <ul class="custom-breadcrumbs mb-4">
                        <li><a href="index.php">Home</a></li>
                        <li>&bullet;</li>
                        <li>Timetable</li>
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

    <section class="section pb-4">
        <div class="container">

            <div class="row check-availabilty" id="next">
                <div class="block-32" data-aos="fade-up" data-aos-offset="-200">
                    <h1>Planned Makeup classes</h1>
                </div>


            </div>
        </div>
    </section>


    <section class="section">
        <div class="container">

            <div class="row">

            <?php
            $timetable=getBookings();
            foreach($timetable as $tt):            
            ?>
                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="uploadimages/<?=$tt['lh_cover_image'] ?>" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                        <h2> Unit Name :  <?=$tt['unit_name'] ?></h2>
                            <h2> Venue :  <?=$tt['lh_name'] ?></h2>
                            <h2> Time  :  <?=period($tt['period']) ?></h2>
                            <h2> Date  :  <?=$tt['date'] ?></h2>


                            <!-- <span class="text-uppercase letter-spacing-1">90$ / per night</span> -->
                        </div>
                    </a>
                </div>

                <?php endforeach ?>

            </div>
        </div>
    </section>

    <?php include 'footer.php' ?>