<!-------------------php scripts for connectivity----------------->
<?php
    include 'partial/dbconnect.php';
$sql = "SELECT count(tid) as max_id FROM teachers";
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
$tid = 'T' . $next_id;

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
<!-------------------php scripts for connectivity----------------->
<?php

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partial/dbconnect.php';
    // @$tid = $_POST["tid"];
    @$password = $_POST["password"];
    @$fname = $_POST["fname"];
    @$lname = $_POST["lname"];
    @$city = $_POST["city"];
    @$cnic = $_POST["cnic"];
    @$pno = $_POST["pno"];

    
    $exists=false;
    if($exists==false){
       $sql = "INSERT INTO `teachers` ( `tid`, `fname`,`password`,`lname`,`cnic`,`pno`,`city`) VALUES ( '$tid', '$fname', '$password', '$lname', '$cnic', '$pno', '$city')";
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
    <!doctype html>
    <html lang="en">
    
    <head>
      <title>Title</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
      <!-- Bootstrap CSS v5.2.1 -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    </head>
    
    <body background="images/background.jpg" style="background-repeat: no-repeat;  height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">

      <header>
        <!-- place navbar here -->
          <!-------------------adding nav bar--------------------------->
  <?php
        session_start();
        // $id = $_SESSION['id'];
  require 'partial/sidebar.php' ?>
    
  <!------------------- nav bar--------------------------->

      </header>
      <main>

    
    <!--------------------------- for login form------------------------------------->
<div class="container d-flex justify-content-center align-items-center mt-3 " style="min-height: 80vh">
    
    <form class ="border shadow p-4 rounded "  action= "addtech.php" method="post" style="width: 450px;"  >
 
     <!--------------------------- for Heading ------------------------------------->
      
      <h4 class="text-center p-3">ADD Teacher</h4> 
     

 
     <!--------------------------- for user name------------------------------------->
      <div class="mb-3">
      <label for="id" class="form-label h5  text-center" >User ID : <?php echo "$tid"; ?></label>
      <!-- <input type="text" class="form-control" id="tid" placeholder="Enter User ID" name="tid" Required> -->
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
      <button type="submit" class="btn btn-primary" name="submit" >ADD Teacher</button>
      </div> 
      
      
      
 
     </form>
 
  </div>

      </main>
      <footer>
        <!-- place footer here -->
      </footer>
      <!-- Bootstrap JavaScript Libraries -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
      </script>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
      </script>
<!-------------------Alert---------------------------------->
<?php
  if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> new course added
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
</body>
    
    </html>

  
