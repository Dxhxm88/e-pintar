<?php
include('config/include.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?= $_ENV['APP_NAME'] ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" type="text/css" href="<?= route('css/style.css') ?>">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <?php include('inc/topbar.php') ?>

        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder">John's Details</h1>
                    <p class="lead fw-normal text-muted mb-0">Registered Since 2000</p>
                </div>
                <div class="row gx-5">
                    <div class="col-xl-8">
                        <div class="accordion mb-5" id="accordionExample">
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingOne"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Personal Details</button></h3>
                                <div class="accordion-collapse collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <table class="table table-bordered">

                                            <tr>
                                                <th></th>
                                                <td><img src="<?= route('img/teacher.jpg') ?>" width="200"></td>
                                            </tr>
                                            <tr>
                                                <th>Teacher Name</th>
                                                <td>John</td>
                                            </tr>

                                            <tr>
                                                <th>Teacher Email ID</th>
                                                <td>jhon@email.com</td>
                                            </tr>

                                            <tr>
                                                <th>Teacher Mobile Number</th>
                                                <td>012947464</td>
                                            </tr>
                                            <tr>
                                                <th>Teacher Address</th>
                                                <td>North Dakota</td>
                                            </tr>
                                            <tr>
                                                <th>Registered Since</th>
                                                <td>2000</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- FAQ Accordion 2-->

                        <div class="accordion mb-5 mb-xl-0" id="accordionExample2">
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingOne"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Professional Details</button></h3>
                                <div class="accordion-collapse collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Teacher Qualifications</th>
                                                <td>Degree</td>
                                            </tr>

                                            <tr>
                                                <th>Teaching Experience (in Years)</th>
                                                <td>10</td>
                                            </tr>

                                            <tr>
                                                <th>Teacher Subject</th>
                                                <td>Science</td>
                                            </tr>
                                            <tr>
                                                <th>Description (if Any)</th>
                                                <td>Good to student</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card border-0 bg-light mt-xl-5">
                            <div class="card-body p-4 py-lg-5">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="text-center">
                                        <div class="h6 fw-bolder">Have more questions?</div>
                                        <p class="text-muted mb-4">
                                            Contact me at
                                            <br />
                                            <a href="#!">john@rmail.com</a>
                                        </p>
                                        <h5>OR</h5>
                                        <form method="post">
                                            <p> <input type="text" name="fname" placeholder="Enter your fullname" class="form-control" required></p>
                                            <p><input type="email" name="emailid" placeholder="Enter your emaild" class="form-control" required></p>
                                            <p><input type="text" name="mobileno" placeholder="Enter your mobile no" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required></p>
                                            <p><textarea class="form-control" name="query" placeholder="Query / Message" required></textarea>
                                            </p>
                                            <input type="submit" class="btn btn-primary" name="submit">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include('inc/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>