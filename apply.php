<?php

include_once "config.php";
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

    <?php include "include/header.php"; ?>


    <div class="container mt-5">
        <div class="row">
            <div class="col-4 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>Apply for Admission</h5>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example1" name="name" class="form-control" />
                                        <label class="form-label" for="form3Example1">Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example1" name="contact" class="form-control" />
                                        <label class="form-label" for="form3Example1">Contact</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form3Example3" name="email" class="form-control" />
                                <label class="form-label" for="form3Example3">Email address</label>
                            </div>
                            <div class="form-outline mb-4">
                                <select id="form3Example3" name="gender" class="form-select">
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                    <option value="o">Other</option>
                                </select>
                                <label class="form-label" for="form3Example3">Gender</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="form3Example4" name="password" class="form-control" />
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <textarea type="text" id="form3Example4" name="address" class="form-control"></textarea>
                                <label class="form-label" for="form3Example4">Address</label>
                            </div>

                           

                            <!-- Submit button -->
                            <button type="submit" name="send" class="btn btn-primary btn-block mb-4">Sign up</button>

                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>or sign up with:</p>
                                <button type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="bi bi-facebook"></i>
                                </button>

                                <button type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="bi bi-google"></i>
                                </button>

                                <button type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="bi bi-twitter"></i>
                                </button>

                                <button type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="bi bi-github"></i>
                                </button>
                            </div>
                        </form>

                        <?php 

                            if(isset($_POST['send'])){
                                $data = [
                                    'name' => $_POST['name'],
                                    'contact' => $_POST['contact'],
                                    'email' => $_POST['email'],
                                    'gender' => $_POST['gender'],
                                    'address' => $_POST['address'],
                                    'password' => md5($_POST['password'])
                                ];
                                $result = insertData("students", $data);
                               
                                ($result)? redirect("index.php") : alert("failed");
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>