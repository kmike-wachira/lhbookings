<?php include 'backend/functions.php';
include 'header.php' ?>
<!-- END head -->

<section class="site-hero overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
            <div class="col-md-10 text-center" data-aos="fade-up">
                <span class="custom-caption text-uppercase text-white d-block  mb-3">Welcome To LH Booker<span class="fa fa-star text-primary"></span></span>
                <h6 class="heading">Book a lecture hall for your students with less hustle</h6>
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

<section class="section bg-light pb-0">
    <div class="container">

        <div class="row check-availabilty" id="next">
            <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

                <form action="/backend/functions.php" method="post">
                    <div class="row">
                        <div class="col-md-4 mb-3 mb-lg-0 col-lg-3">
                            <label for="checkin_date" class="font-weight-bold text-black">Lecture Date</label>
                            <div class="field-icon-wrap">
                                <div class="icon"><span class="icon-calendar"></span></div>
                                <input type="date" id="checkin_date" name="lecture_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2 mb-3 mb-md-0">
                            <label for="adults" class="font-weight-bold text-black">Lecture periods</label>
                            <div class="field-icon-wrap">
                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                <select name="lecture_period" id="adults" class="form-control">
                                    <option value="1">7-9 am</option>
                                    <option value="2">9-11 am</option>
                                    <option value="3">11-13pm</option>
                                    <option value="4">2pm-4pm</option>
                                    <option value="5">4pm-6pm</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3 mb-lg-0 col-lg-3">
                            <label for="checkin_date" class="font-weight-bold text-black">No Of Students</label>
                            <div class="field-icon-wrap">
                                <div class="icon"><span class="icon-calendar"></span></div>
                                <input type="number" name="no_of_students" id="max-students" class="form-control w-100">
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 align-self-end">
                            <button class="btn btn-primary btn-block text-white" type="submit" name="check">Check Availabilty</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="section blog-post-entry bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
                <h2 class="heading" data-aos="fade-up">Institution Lecture Halls</h2>
                <p data-aos="fade-up"> Select the lecture hall that matches your needs</p>
            </div>
        </div>
        <div class="row">
            <?php
            $lecturehalls = getAllLectureHalls();
            foreach ($lecturehalls as $lecturehall) : ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="100">
                    <div class="media media-custom d-block mb-4 h-100">
                        <a href="#" class="mb-4 d-block"><img src="uploadimages/<?php echo $lecturehall['lh_cover_image'] ?>" alt="Image placeholder" class="img-fluid"></a>
                        <div class="media-body">
                            <!-- <span class="meta-post">February 26, 2018</span> -->
                            <h2 class="mt-0 mb-3"><a href="/reservation.php?id=<?php echo $lecturehall['id'] ?>"><?php echo $lecturehall['lh_name'] ?></a></h2>
                            <span class="meta-post"> Maximum No of Students <strong><?php echo $lecturehall['lh_capacity'] ?> </strong> </span>
                            <h4>Brief</h4>
                            <p><?php echo $lecturehall['lh_desc'] ?> </p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php include 'footer.php' ?>