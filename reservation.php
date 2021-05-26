<?php
include 'backend/functions.php';
$hall_id = (int) $_GET['id'];
include 'header.php';
?>

<!-- END head -->

<section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
            <div class="col-md-10 text-center" data-aos="fade">
                <h1 class="heading mb-3">Reservation Form</h1>
                <ul class="custom-breadcrumbs mb-4">
                    <li><a href="index.php">Home</a></li>
                    <li>&bullet;</li>
                    <li>Reservation</li>
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

                <?php
            
                if ($_SESSION['response_message'] == "correct") : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Correct</strong> Lecture Hall booked
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php elseif ($_SESSION['response_message'] == "error") : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Holy guacamole!</strong> An error ocured
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php elseif ($_SESSION['response_message'] == "trouble") : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Holy guacamole!</strong> The Lecture Hall is already Booked.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php endif ?>

                <form action="/backend/functions.php" method="post" class="bg-white p-md-5 p-4 mb-5 border">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="text-black font-weight-bold" for="name">Unit Name</label>
                            <input type="text" name="unit_name" required id="name" class="form-control ">
                        </div>
                        <div class="col-md-6 form-group">
                            <!-- <label class="text-black font-weight-bold" for="name">No of Students</label>
                                <input type="number" name="number_of_students" required id="name" class="form-control "> -->
                            <input type="text" class=" d-none" name="hall_id" value="<?= $hall_id ?>" id="name" class="form-control ">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="text-black font-weight-bold" for="lh_date">Lecture Date</label>
                            <input type="date" id="lh_date" name="l_date" required class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="adults" class="font-weight-bold text-black">Lecture Duration</label>
                            <div class="field-icon-wrap">
                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                <select name="lh_periods" id="adults" class="form-control">
                                    <option value="1"> 8 am -11 am</option>
                                    <option value="2">11 am - 2pm</option>
                                    <option value="3">2pm -5pm</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <button type="submit" name="book_lh" class="btn btn-primary text-white py-3 px-5 font-weight-bold">Book Now</button>
                        </div>
                    </div>
                </form>

            </div>
            <?php
            $lh_descs = getSingleHall($hall_id);
            foreach ($lh_descs as $lh_desc) : ?>
                <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="row">
                        <div class="col-md-10 ml-auto contact-info">
                            <a href="#" class="mb-4 d-block"><img src="uploadimages/<?php echo $lh_desc['lh_cover_image'] ?>" alt="Image placeholder" class="img-fluid"></a>
                            <p><span class="d-block">Hall Name</span> <span class="text-black"> <?php echo $lh_desc['lh_name'] ?> </span></p>
                            <p><span class="d-block">Max Stutents</span> <span class="text-black"> <?php echo $lh_desc['lh_capacity'] ?></span></p>
                            <p><span class="d-block">Description</span></p>
                            <p class="fa fa-1x"> <?php echo $lh_desc['lh_desc'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>