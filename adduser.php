<!-------------------php scripts for connectivity----------------->
<?php
    include 'partial/dbconnect.php';
$sql = "SELECT count(sid) as max_id FROM students";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$max_id = $row['max_id'];

// Generate the next ID
if ($max_id) {
    // If there are existing records, increment the last ID by 1
    $next_id = ++$max_id;
} else {
    // If there are no existing records, start from 1
    $next_id = 1;
}

// Pad the ID with leading zeros to make it 5 characters long
$next_id = str_pad($next_id, 1, '0', STR_PAD_LEFT);

// Generate the alphanumeric ID by concatenating a prefix and the padded ID
$sid = 'K' . $next_id;

// Insert a new record with the generated ID
// $sql = "INSERT INTO tab1 (id, name, email, password) VALUES ('$alphanumeric_id', 'John Doe', 'john@example.com', 'password123')";
// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully.";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// Close connection
// mysqli_close($con++n);

// echo "Successfully run $sid";
?>
<!--  ============================================================== -->
<?php

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partial/dbconnect.php';
    // @$sid = $_POST["sid"];
    @$password = $_POST["password"];
    @$fname = $_POST["fname"];
    @$lname = $_POST["lname"];
    @$city = $_POST["city"];
    @$cnic = $_POST["cnic"];
    @$pno = $_POST["pno"];

    
    $exists=false;
    if($exists==false){
       $sql = "INSERT INTO `students` ( `sid`, `fname`,`password`,`lname`,`cnic`,`pno`,`city`) VALUES ( '$sid', '$fname', '$password', '$lname', '$cnic', '$pno', '$city')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }

    }
    else{
        $showError = "Error";
    }


    
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
        form{
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

    <title>Add student</title>
  </head>
  <body background="images/background.jpg" style="background-repeat: no-repeat;  height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">



  <!-------------------adding nav bar--------------------------->
  <?php
        session_start();
        // $id = $_SESSION['id'];
  require 'partial/sidebar.php' ?>
    
  <!------------------- nav bar--------------------------->
   

 



    
    <!--------------------------- for login form------------------------------------->
    <br>
    <br><br>
<div class="container d-flex justify-content-center align-items-center mb-5" style="min-height: 80vh">
    
    <form class ="border shadow p-4 rounded "  action= "/dbproject/adduser.php" method="post" style="width: 450px;"  >
 
     <!--------------------------- for Heading ------------------------------------->
      
      <h4 class="text-center p-3">Add Student</h4> 
     

 
     <!--------------------------- for user name------------------------------------->
      <div class="mb-3">
      <label for="id" class="form-label h5 text-center" >STUDENT ID : <?php echo " $sid";?></label>
      <!-- <input type="text" class="form-control" id="sid" placeholder="Enter User ID" name="sid" Required> -->
      </div>
 
      <!--------------------------- for password------------------------------------->
      <div class="mb-3">
      <label for="password" class="form-label" >Password</label>
      <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" Required>
      </div>

      
     <!--------------------------- for First name------------------------------------->
     <div class="mb-3">
      <label for="fname" class="form-label" >First Name</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname" Required>
      </div>
   
      
     <!--------------------------- Last name------------------------------------->
     <div class="mb-3">
      <label for="lname" class="form-label" >Last Name</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" Required>
      </div>
     

     <!--------------------------- city name------------------------------------->
     <div class="mb-3">
      <label for="city" class="form-label" >city</label>
      <input type="text" class="form-control" id="city" placeholder="Enter City Name" name="city" Required>
      </div>

      <!--------------------------- cnic ------------------------------------->
     <div class="mb-3">
      <label for="cnic" class="form-label" >Cnic</label>
      <input type="text" class="form-control" id="cnic" placeholder="Enter cnic" name="cnic" Required>
      </div>

      <!--------------------------- cellphone ------------------------------------->
     <div class="mb-3">
      <label for="phone" class="form-label" >Phone</label>
      <input type="text" class="form-control" id="pno" placeholder="Enter phone no" name="pno" Required>
      </div>


      <!--------------------------- for button ------------------------------------->
      <div class="mb-3">
      <button type="submit" class="btn btn-primary" name="submit" >ADD Student</button>
      </div> 
      
      
      
 
     </form>
 
  </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

 <!-------------------Alert---------------------------------->
 <?php
  if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> student record is added successfully !!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';}
   ?>