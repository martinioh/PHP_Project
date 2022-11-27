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
    <h1 class="text-center text-primary my-3">Welcome to the store!</h1>
    <h1 class="text-center text-success mb-4">Shop by Category</h1>

    <div class="container">
        <div class="row">
            <!-- php code -->
            <?php
              $sql= "Select * from consoles"; //gets every piece of data from mysql
              $result = mysqli_query($con,$sql);
              if($result){ //if theres a result

                while($row = mysqli_fetch_assoc($result)){ //while there's still a result left
                  $category_id = $row['category_id']; //assign to each variable with data retrieved
                  $category_name = $row['category_name'];
                  $category_description = $row['category_description'];
                  $category_price = $row['category_price'];
                  $category_image = $row['category_image'];
                  
                  //create a card for every item in database
                  echo '<div class="col-md-4 col-sm-6 col-xm-12 mb-5"> 
                  <div class="card">
                      <img src='.$category_image.' class="card-img-top" alt="..."
                          style="height:250px;object-fit:container">
                      <div class="card-body">
                          <h5 class="card-title">'.$category_name.'</h5>
                          <p class="card-text">'.substr($category_description,0,55).'...</p>
                          <p>£'.$category_price.'</p>
                          <a href="details.php?details_id='.$category_id.'" class="btn btn-dark">Continue Reading</a>
                      </div>
                  </div>
              </div>';
                }
              }
            ?>
        </div>
    </div>

</body>

</html>