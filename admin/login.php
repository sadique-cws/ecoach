<?php include "../config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - E- coach | An Application for Coaching</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <?php include "admin_header.php"; 

    // $data = [
    //     'email' => 'sadique@gmail.com',
    //     'password' => md5('123456789')
    // ];

    // insertData("admin",$data);
    
    // 
    
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-4 mx-auto">
                <div class="card">
                    <div class="card-body">

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


                            <!-- Submit button -->
                            <button type="submit" name="admin_login" class="btn btn-primary btn-block">Sign in</button>
                        </form>

                        <?php 

                            if(isset($_POST['admin_login'])){
                                $email = $_POST['email'];
                                $password = md5($_POST['password']);

                                $query = $conn->query("select * from admin where email='$email' AND password='$password'");

                                $count = $query->num_rows;
                                if($count > 0){
                                    $_SESSION['admin'] = $email;
                                    redirect('index.php');
                                }
                                else{
                                    alert("email or password may incorrect try again");
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