<?php
include('../config/include.php');

include(asset('config/redirect.php'));
include(asset('admin/controller/controller.php'));
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $_ENV['APP_NAME'] ?></title>

    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" type="text/css" href="<?= route('css/style.css') ?>">
</head>

<body>

    <header class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow p-2">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="<?= route('admin/') ?>"><?= $_ENV['APP_NAME'] ?></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="<?= route('admin/index.php?logout=1') ?>">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">

            <?php include(asset('admin/inc/sidebar.php')) ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Add Teacher</h1>
                </div>

                <form method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header"><strong>Teacher </strong><small> Personal Details </small></div>
                                <div class="card-body card-block">
                                    <div class="form-group mb-2">
                                        <label for="company" class=" form-control-label">Teacher Name</label>
                                        <input type="text" name="tname" value="" class="form-control" id="tname" required="true">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="company" class=" form-control-label">Teacher Pic</label>
                                        <input type="file" name="propic" value="" class="form-control" id="propic" required="true">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="street" class=" form-control-label">Teacher Email</label>
                                        <input type="text" name="email" value="" id="email" class="form-control" required="true">
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group mb-2">
                                                <label for="city" class=" form-control-label">Teacher Mobile Number</label>
                                                <input type="text" name="mobilenumber" id="mobilenumber" value="" class="form-control" required="true" maxlength="10" pattern="[0-9]+">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group mb-2">
                                                <label for="city" class=" form-control-label">Teacher Address</label>
                                                <textarea type="text" name="address" id="address" value="" class="form-control" rows="4" cols="12" required="true"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header"><strong>Teacher </strong><small> Professional Details</small></div>
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group mb-2">
                                                <label for="city" class=" form-control-label">Teacher Qualifications</label>
                                                <input type="text" name="qualifications" id="qualifications" value="" class="form-control" required="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group mb-2">
                                                <label for="city" class=" form-control-label">Teaching Experience (in Years)</label>
                                                <input type="text" name="teachingexp" id="teachingexp" pattern="[0-9]+" title="only numbers" class="form-control" required="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group mb-2">
                                                <label for="city" class=" form-control-label">Teacher Subjects</label>
                                                <select type="text" name="tsubjects" id="tsubjects" value="" class="form-control" required="true">
                                                    <option value="">Choose Subjects</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group mb-2">
                                                <label for="city" class=" form-control-label">Description (if Any)</label>
                                                <textarea type="text" name="description" id="description" class="form-control" rows="3" cols="12" required="true"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group mb-2">
                                                <label for="city" class=" form-control-label">Joining Date</label>
                                                <input type="date" name="joiningdate" id="joiningdate" value="" class="form-control" required="true">
                                            </div>
                                        </div>

                                        <div class="col-12 mt-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>

</html>