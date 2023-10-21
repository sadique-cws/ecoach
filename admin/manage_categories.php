<?php include "../config.php";


checkAdmin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories - Admin Panel - E- coach | An Application for Coaching</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <?php include "admin_header.php"; ?>

    <div class="bg-success px-5 py-3 d-flex justify-content-between">
        <h2 class="text-white">Admin / Manage Categories</h2>

        <a href="#rock" class="btn btn-light pt-2" data-bs-toggle="modal">Insert New Category</a>

        <div class="modal fade" id="rock">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-uppercase fw-bold">Insert New Categories</div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="cat_title">Title</label>
                                <input type="text" name="cat_title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="cat_description">Description</label>
                                <textarea rows="5" name="cat_description" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="insert_cat" class="btn btn-primary w-100" value="Insert Category">
                            </div>
                        </form>
                        <?php 
                            if(isset($_POST['insert_cat'])){
                                    $data =  [
                                        'cat_title' => $_POST['cat_title'],
                                        'cat_description' => $_POST['cat_description']
                                    ];

                                    if(insertData("categories",$data)){
                                        redirect("manage_categories.php");
                                    }
                                    else{
                                        alert("failed");
                                        redirect("manage_categories.php");
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
                            <th>Cat id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $callingData = callingData("categories");
                        foreach ($callingData as $value) :
                        ?>
                            <tr>
                                <td><?= $value['cat_id']; ?></td>
                                <td><?= $value['cat_title']; ?></td>
                                <td><?= $value['cat_description']; ?></td>
                            
                                <td>
                                    <div class="btn-group">
                                        <a href="?cat_delete=<?= $value['cat_id'];?>" class="btn btn-danger">Delete</a>
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
if(isset($_GET['cat_delete'])){
    $id = $_GET['cat_delete'];

    if(deleteRecord('categories', "cat_id='$id'")){
        redirect("manage_categories.php");
    }
    else{
        alert("fail to delete ");
    }
}
?>