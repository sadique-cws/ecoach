<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E- coach | An Application for Coaching</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .card-hover:hover {
            background: linear-gradient(pink, purple);
            border: 0;
            color: white;
        }
    </style>
</head>

<body>

    <?php include "include/header.php"; ?>


    <div class="container-fluid px-5 bg-success" style="height: 500px;">
        <h1 class="pt-5 text-white display-1 fw-bold">Welcome in E-Coach</h1>
        <p class="text-white display-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate, minus. Temporibus iusto ea incidunt? Deserunt molestiae voluptates unde repellat aperiam fugiat suscipit tempore, non dolorum! Adipisci eveniet praesentium obcaecati quo?</p>

        <a href="" class="btn btn-dark btn-lg">Start Learning</a>
    </div>


    <div class="container mt-4">
        <div class="row">
            <div class="row">
                <div class="col-12">
                    <h2>Categories</h2>
                </div>
            </div>
            <div class="row mb-3">
                <?php
                $callingCat = callingData("categories");
                foreach ($callingCat as $cat) :
                ?>

                    <div class="col">
                        <a href="" class="text-decoration-none">
                            <div class="card rounded-xl text-center card-hover">
                                <div class="card-body">
                                    <h6><?= $cat['cat_title']; ?></h6>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-12">
                    <h2>All Courses</h2>
                </div>
            </div>
            <?php
            $callingCourse = callingData("courses");
            foreach ($callingCourse as $value) :
            ?>

                <div class="col-md-3">
                    <div class="card">
                        <img src="admin/images/courses/<?= $value['image']; ?>" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value['title']; ?></h5>
                            <p class="card-text"><?= $value['description']; ?></p>
                            <p class="card-text"><strong>Instructor:</strong> <?= $value['instructor']; ?></p>
                            <p class="card-text"><strong>Price:</strong> <?= $value['discount_price']; ?>
                                <del><?= $value['price']; ?></del>
                            </p>
                            <a href="view_course.php?course_id=<?= $value['course_id'];?>" class="btn btn-primary">Enroll Now</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>