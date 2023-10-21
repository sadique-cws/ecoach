<?php include "../config.php";

$user = getUser();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E- coach | An Application for Coaching</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">E-Coach | Student Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">My Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize fw-bold" href="#"><?= $user['name']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <h1>My Courses</h1>
                <?php
                $callingMyCourses = callingData("student_courses JOIN courses ON student_courses.course_id=courses.course_id");
                foreach ($callingMyCourses as $value) :
                ?>

                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../admin/images/courses/<?= $value['image']; ?>" class="img-fluid rounded-start" alt="Course Image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $value['title']; ?></h5>
                                    <p class="card-text"><?= $value['description']; ?></p>
                                    <p class="card-text"><?= $value['discount_price']; ?>
                                        <del><?= $value['price']; ?></del>
                                    </p>
                                    <?php 
                                    if(!$value['payment_id']):
                                    ?>
                                    <a href="" class="btn btn-success">Pay Now</a>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="col-md-4">
                <h1>Payments</h1>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Payment 1
                        <span class="badge bg-success">Paid</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Payment 2
                        <span class="badge bg-danger">Unpaid</span>
                    </li>
                    <!-- Add more payment items as needed -->
                </ul>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>