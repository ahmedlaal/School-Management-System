<?php
include "partial/dbconnect.php";
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: logintech.php");
    exit;
}
// new work
$tid = $_SESSION['tid'];
$sql = "SELECT * FROM `teachers` where tid = '$tid' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
 
    $fname = $row["fname"];
    $lname = $row["lname"]; 
    $cnic = $row["cnic"];
    $phone = $row["pno"];
    $city = $row["city"];
    
  }
} else {
  echo "0 results";
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
        #form{
            background:#333;
        }
        .mb-3{
            color:white;
        }
        .p-3{
            color:white;
        }
 
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>teacher panel</title>
  </head>
  <body background="images/background.jpg" style="background-repeat: no-repeat;  height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">



  <!-------------------adding nav bar--------------------------->
    <?php require 'partial/sidebart.php' ?>
    
  <br><br><br>
    
<!-- ----------------------------------------------------------- -->
<!-- <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh">
    <div class ="border shadow p-4 rounded text-white"   style="width: 450px;" id="form"  >
    <h4 class="text-center p-3">Profile</h4> 
    </div>
</div> -->
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <div class="row">
          <div class="col-md-4">
            <!-- Profile Picture -->
            <!-- <img src="https://dummyimage.com/400x400/000/fff" alt="Profile Picture" class="img-fluid rounded-circle mb-3"> -->
            <img src="images/Teacher.jpg" alt="Profile Picture" class="img-fluid rounded-circle mb-3">
            
            <h4>Contact</h4>
            <p>Social Media</p>
            <!-- Social Media Links -->
            <ul class="list-unstyled">
              <li><a href="#" >Facebook</a></li>
              <li><a href="#">LinkedIn</a></li>
              <li><a href="#">Github</a></li>
            </ul>
          </div>
          <div class="col-md-8">
            <h2>About Me</h2>
            <p>Dr. <span><?php echo "$fname";?></span> is a qualified Dermatologist in Lahore with over 15 years of experience in the field. </p>
            <ul class="list-group">
                <li class="list-group-item">ID : <span><?php echo "$tid";?></span></li>
                <li class="list-group-item">Name : <span><?php echo "$fname " . "$lname";?></span></li>
                <li class="list-group-item">cnic : <span><?php echo "$cnic";?></span></li>
                <li class="list-group-item">Phone : <span><?php echo "$phone";?></span></li>
                <li class="list-group-item">city : <span><?php echo "$city";?></span></li>
            </ul>
            <br>
            <h3>Teacher</h3>
            <p class="font-weight-bold">MBBS, FCPS (Dermatology), CAAAM (USA)</p>
            <p>Dermatologist </p>
          </div>
        </div>
      </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 

     

<!-- ----------------------------------------------------------- -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<body>
    
</body>
</html>