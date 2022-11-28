<?php
    $success = 0;
    $user = 0;

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        include './partials/connect.php';

        $username = $_POST['username'];
        $password = $_POST['password'];


        $sql = "Select * from `registration` where username='$username'";

        $result = mysqli_query($con,$sql);

        if ($result){
            $num = mysqli_num_rows($result); //counts number of rows present inside the database
            if($num > 0){ //if the username already exists
                $user = 1;
            } else { //if user doesn't already exist
                $sql = "insert into `registration`(username, password) values('$username','$password')"; //insert user into db
                $result = mysqli_query($con,$sql);

                if ($result){
                    $success = 1;
                    header('location:login.php');
                } else {
                    die(mysqli_error($con));
                } 
            }
        }
    }
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
        if ($user){ //if user already exists, display error message
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error. </strong> User already exists.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    ?>

    <?php
        if ($success){ //if user already exists, display error message
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> Sign Up Completed.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    ?>

    <?php include './partials/connect.php';?>
    <?php include './partials/header.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <h1 class="text-center">Sign Up</h1>
    <div class="container mt-5">
        <form action="signup.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" placeholder="Enter your Username" name="username">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" placeholder="Enter your Password" name="password">
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

</body>

</html>