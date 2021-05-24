<?php
include 'backend/functions.php';
include 'header.php';
?>
<section class="py-5 bg-light" id="next">
</section>


<section class="section slider-section bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
                <h2 class="heading" data-aos="fade-up">Original Time Table</h2>
                <p data-aos="fade-up" data-aos-delay="100"></p>
            </div>
        </div>
        <div class="row">
            <input type="text" class="form-control mb-3 tablesearch-input" data-tablesearch-table="#data-table" placeholder="Search">

            <table id="data-table" class="table tablesearch-table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Hall id</th>
                        <th scope="col">Hall Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Period</th>
                        <th scope="col">Unit Name</th>
                        <!-- <th scope="col">Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sschedules = getOriginalBookings();
                    foreach ($sschedules as $sch) :
                    ?>
                        <tr>
                            <th scope="row"><?= $sch['gid'] ?></th>
                            <td><?= $sch['lh_name'] ?></td>
                            <td> <?= $sch['date'] ?></td>
                            <td><?= $sch['period'] ?></td>
                            <td><?= $sch['unit_name'] ?></td>
                            <!-- <td class=" text-center"><a href="/backend/functions.php?deleteid=<?= $sch['gid'] ?>"> <i class="fas fa-trash-alt text-danger"></i></a></td> -->

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</section>
<!-- END section -->
<?php
include 'footer.php';
?>