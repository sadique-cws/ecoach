<?php 

include_once "config.php";

if(isset($_SESSION['student'])):
    redirect("student/index.php");
endif;

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
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2> Student Login </h2>
                        <form method="post">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example1">Email address</label>
                                <input type="email" name="email" id="form1Example1" class="form-control" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example2">Password</label>
                                <input type="password" name="password" id="form1Example2" class="form-control" />
                            </div>

                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                             

                                <div class="col">
                                    <!-- Simple link -->
                                    <a href="#!">Forgot password?</a>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" name="login" class="btn btn-primary btn-block">Sign in</button>
                        </form>

                        <?php 
                            if(isset($_POST['login'])){
                                $email = $_POST['email'];
                                $password = md5($_POST['password']);

                                $count = countRecords("students", " email = '$email' AND password='$password'");

                                if($count){
                                    $_SESSION['student'] = $email;
                                    redirect("student/index.php");
                                }
                                else{
                                    alert("email & password incorrect please try again");
                                    redirect("login.php");
                                }
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