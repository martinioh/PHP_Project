<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }


?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eCommerce Website</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include './partials/connect.php';?>
    <?php include './partials/header.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <?php
        $id = $_GET['details_id'];
        $sql = "Select * FROM `consoles` where category_id =$id";
        $result = mysqli_query($con,$sql);
        if($result){ //if theres a result
            $row = mysqli_fetch_assoc($result);
            $category_id = $row['category_id']; //assign to each variable with data retrieved
            $category_name = $row['category_name'];
            $category_description = $row['category_description'];
            $category_price = $row['category_price'];
            $category_image = $row['category_image'];
        }
    ?>

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4 text-center text-primary"><?php echo $category_name;?></h1>
            <p class="lead"><?php echo $category_description;?></p>
            <button class="btn btn-dark"><a class="btn btn-dark" href="index.php" role="button">Continue
                    Shopping</a>
            </button>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <img src=<?php echo $category_image; ?> class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 col-sm-12">
                <h2 class="text-center text-danger"><?php echo $category_name; ?></h2>
                <p><?php echo $category_description;?></p>
                <p><strong>Price: </strong>£<?php echo $category_price;?></p>
                <button class="btn btn-success">Add to Cart</button>
            </div>
        </div>


    </div>



</body>

</html>