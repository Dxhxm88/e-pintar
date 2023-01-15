<?php
include('config/include.php');
include(asset('admin/controller/controller.php'));

$isShow = false;
$classes = getClasses();

if (isset($_POST['submit'])) {
    $class_timetable = getClassTimetable($_POST['class']);

    $timetable = generateTimetable($class_timetable);
    $isShow = true;
}
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

        <section class="py-5 bg-light" id="scroll-target">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder">Timetable</h2>
                            <hr color="red" />
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Class</label>
                            <select name="class" class="form-control" required>
                                <option value="">Please select class</option>
                                <?php foreach ($classes as $class) { ?>
                                    <option value="<?= $class['id'] ?>"><?= $class['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <?php if ($isShow) { ?>
                    <?= $timetable ?>
                <?php } ?>

            </div>
        </section>

    </main>

    <?php include('inc/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>