<?php
include('../config/include.php');
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $_ENV['APP_NAME'] ?></title>

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" type="text/css" href="<?= route('css/style.css') ?>">
</head>

<body>

    <header class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow p-2">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="<?= route('teacher/') ?>"><?= $_ENV['APP_NAME'] ?></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="<?= route('teacher/index.php?logout=1') ?>">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">

            <?php include(asset('teacher/inc/sidebar.php')) ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Profile</h1>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Teacher</strong><small> Personal Details</small></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Teacher Name</label>
                                        <input type="text" name="tname" value="John" class="form-control" id="tname" required="true">
                                    </div>

                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Teacher Photo</label> &nbsp;
                                        <img src="<?= route('img/teacher.jpg') ?>" width="100" height="100" class="mt-2">
                                        <a href="changeimage.php"> &nbsp; Edit Image</a>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="street" class=" form-control-label">Teacher Email</label>
                                        <input type="text" name="email" value="john@email.com" id="email" class="form-control" required="true">
                                    </div>

                                    <div class="row form-group mb-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Teacher Mobile Number</label>
                                                <input type="text" name="mobilenumber" id="mobilenumber" value="012355555" class="form-control" required="true" maxlength="10">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group mb-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Teacher Address</label>
                                                <textarea type="text" name="address" id="address" class="form-control" rows="3" cols="12" required="true">North Dakota</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group mb-2">
                                        <div class="col-12">
                                            <div class="form-group"><label for="city" class=" form-control-label">Joining Date</label>
                                                <input type="date" name="joiningdate" id="joiningdate" value="2000" class="form-control" required="true">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Teacher</strong><small> Professional Details</small></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Teacher Qualifications</label>
                                                <input type="text" name="qualifications" id="qualifications" value="Master" class="form-control" required="true">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Teaching Experience (in Years)</label>
                                                <input type="text" name="teachingexp" id="teachingexp" pattern="[0-9]+" title="only numbers" value="20" class="form-control" required="true">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group"><label for="city" class=" form-control-label">Teacher Subjects</label>
                                                <select type="text" name="tsubjects" id="tsubjects" value="" class="form-control" required="true">
                                                    <option value="">Science</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Description (if Any)</label>
                                                <textarea type="text" name="description" id="description" class="form-control" rows="3" cols="12" required="true">No description</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Profile Status <small style="color:red">(Public profile anybody can your details and not public only you can view)</small></label>
                                                <select type="text" name="status" id="status" value="" class="form-control" required="true">
                                                    <option value="1">Public</option>
                                                    <option value="0">Not public</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit"><i class="fa fa-dot-circle-o"></i> Update</button></p>
                        </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
</body>

</html>