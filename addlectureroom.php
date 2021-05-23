    <?php include 'header.php' ?>
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
    <?php include 'footer.php' ?>