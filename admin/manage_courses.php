<?php include "../config.php";


checkAdmin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses - Admin Panel - E- coach | An Application for Coaching</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <?php include "admin_header.php"; ?>

    <div class="bg-success px-5 py-3 d-flex justify-content-between">
        <h2 class="text-white">Admin / Manage Courses</h2>

        <a href="#rock" class="btn btn-light pt-2" data-bs-toggle="modal">New Course</a>

        <div class="modal fade" id="rock">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-uppercase fw-bold">Insert New Course </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label>Course Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Language</label>
                                <input type="text" name="lang" class="form-control">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control">
                                </div>
                                <div class="mb-3 col">
                                    <label>Discount Price</label>
                                    <input type="text" name="discount_price" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label>Instructor</label>
                                    <input type="text" name="instructor" class="form-control">
                                </div>
                                <div class="mb-3 col">
                                    <label>category_id</label>
                                    <select name="category_id" class="form-select">
                                        <option value="">Select your Category</option>
                                        <?php
                                        $callingCat = callingData("categories");
                                        foreach ($callingCat as $cat) :
                                            $id = $cat['cat_id'];
                                            $title = $cat['cat_title'];
                                            echo "<option value='$id'>$title</option>";
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Cover Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="cat_description">Description</label>
                                <textarea rows="5" name="description" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="insert_course" class="btn btn-primary w-100" value="Insert Category">
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['insert_course'])) {

                            // image work
                            $image = $_FILES['image']['name'];
                            $tmp_image = $_FILES['image']['tmp_name'];

                            move_uploaded_file($tmp_image, "images/courses/$image");

                            $data =  [
                                'title' => $_POST['title'],
                                'lang' => $_POST['lang'],
                                'instructor' => $_POST['instructor'],
                                'price' => $_POST['price'],
                                'discount_price' => $_POST['discount_price'],
                                'image' => $image,
                                'description' => $_POST['description'],
                                'category_id' => $_POST['category_id']
                            ];

                            if (insertData("courses", $data)) {
                                redirect("manage_courses.php");
                            } else {
                                alert("failed");
                                redirect("manage_courses.php");
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-9">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>title</th>
                            <th>Category</th>
                            <th>Instructor</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Lang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $callingData = callingData("courses JOIN categories on courses.category_id = categories.cat_id");
                        foreach ($callingData as $value) :
                        ?>
                            <tr>
                                <td><?= $value['course_id']; ?></td>
                                <td><?= $value['title']; ?></td>
                                <td><?= $value['cat_title']; ?></td>
                                <td><?= $value['instructor']; ?></td>
                                <td><del><?= $value['price']; ?></del>
                                    <span><?= $value['discount_price']; ?></span>
                                </td>
                                <td>
                                    <img width="80px" height="auto" src="images/courses/<?= $value['image']; ?>" alt="">
                                </td>
                                <td><?= $value['lang']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="?course_delete=<?= $value['course_id'];?>" class="btn btn-danger">Delete</a>
                                        <a href="" class="btn btn-info">Edit</a>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>


<?php
if (isset($_GET['course_delete'])) {
    $id = $_GET['course_delete'];

    if (deleteRecord('courses', "course_id='$id'")) {
        redirect("manage_courses.php");
    } else {
        alert("fail to delete ");
    }
}
?>