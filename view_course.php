<?php include "config.php";

if (!isset($_GET['course_id'])) redirect("index.php");

$course_id = $_GET['course_id'];

$CourseData = callingData("courses", "course_id='$course_id'");


$CourseData = $CourseData[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $CourseData['title']; ?> - E- coach | An Application for Coaching</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>

<body>

    <?php include "include/header.php"; ?>


    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <h1 class="text-capitalize"><?= $CourseData['title']; ?> </h1>
                <p><?= $CourseData['description']; ?> </p>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="admin/images/courses/<?= $CourseData['image']; ?> " class="card-img-top" alt="Course Image">
                    <div class="card-body">
                        <h5 class="card-title">Course Details</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Instructor: <?= $CourseData['instructor']; ?> </li>
                            <li class="list-group-item">Duration: 0 weeks</li>
                            <li class="list-group-item">Price: <?= $CourseData['discount_price']; ?> <del><?= $CourseData['price']; ?></del> </li>
                        </ul>
                        <a href="?enroll=<?= $CourseData['course_id'];?>&course_id=<?= $CourseData['course_id'];?>" class="btn btn-primary btn-block">Enroll Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<?php 
if(isset($_GET['enroll'])){
    $course_id = $_GET['enroll'];

    // check if login or not
    if(!isset($_SESSION['student'])) redirect("login.php");


    $user = getUser();
    $student_id = $user['roll'];

    $data = [
        'student_id' => $student_id,
        "course_id" => $course_id
    ];

    if(insertData("student_courses", $data)){
        redirect("student/index.php");
    }
    else{
        alert("something went wrong try again");
    }
}