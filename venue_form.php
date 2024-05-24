<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "projecti";
error_reporting(E_ALL);
ini_set('display_errors', 1);



if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("failed to connect!");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send request</title>
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
      #error{
    background-color:rgb(216, 139, 139) ;
    color:#800001;border-radius: 3px;
    width:400px;padding-top: 0.3cm;margin-left: 0.5cm; margin-right: 0.6cm;padding-left: 0.9cm;
    height:0.7cm;
  }
      </style>
</head>
<body>
 
    <div id="holder">
      <div id="cross"><a href="service.php" id="crossa"><i class="fa-regular fa-circle-xmark"></a></i> </div>
    <div id="bookform">

      <div id="bookforma">
      </div>
      <div id="bookformb">
      <div id="title">BOOK APPOINMENT NOW</div><br>

      <?php
      
     if ($_SERVER['REQUEST_METHOD']=="POST"){
      $fname=$_POST['fname'];
    
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $svendor=$_POST['vvendor'];
      $date=$_POST['date'];
      $message=$_POST['message'];

      $query = "SELECT * FROM clientdetails WHERE email = '$email'";
      $result= mysqli_query($con,$query);
  
      if (mysqli_num_rows($result) > 0) {
         echo '<div id="error">YOU HAVE ALREADY BOOKED ONE VENDOR.</div>';
    
      } 

      elseif(empty($fname)){
        echo'<div id="error">FirstName cannot be empty.</div>';
      }
      elseif(empty($lname)){
        echo'<div id="error">LastName cannot be empty.</div>';
      }
      elseif(empty($email)){
        echo'<div id="error">Email cannot be empty.</div>';
      }
      elseif(empty($date)){
        echo'<div id="error">Date cannot be empty</div>';
      }      

      elseif(strlen($phone)<10){
        echo'<div id="error">Invalid number format.</div>';
      }
      elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div id="error">Invalid email format.</div>';
       } 
       
       else{
        $query= "INSERT INTO clientdetails (First_name,Last_name,email,phone,Date_expected,
        vendor_type,vendor_name,user_Message) VALUES
         ('$fname','$lname','$email','$phone','$date','Venue&decor','$svendor','$message')";
        $resulta = mysqli_query($con, $query);

        if($resulta){
          echo'<div id="error">SUBMITTED SUCCESSFULLY!</div>';
        }
        else {
          // An error occurred while saving user data
          echo '<div id="error">Error: ' . mysqli_error($con) . '</div>';
      }
     }

    }

      ?>

  <form action="" method="post">
    <br>
    <div id="name">
    <div id="fname">
    <label for="fname">First name</label><br>
    <input type="text" id="fname" name="fname">
    </div>
    <div id="lname">
    <label for="lname">Last name</label><br>
    <input type="text" id="lname" name="lname" ><br>
    </div>
    </div><br>
    
    <div id="emphn">
      <div id="email">
    <label for="email">Email ID</label><br>
    <input type="email" id="email" name="email"><br>
</div>
   <div id="phone">
    <label for="phone">Phone</label><br>
    <input type="tel" id="phone" name="phone">
</div>
</div>
    
    <div id="vendate">
      <div id="vendor">
    <label for="vvendor">Choose your vendor:</label><br>
    <select  name="vvendor">
      <option value="ROYAL PALACE BANQUET">ROYAL PALACE BANQUET</option>
      <option value="THE AZALEA HALLS">THE AZALEA HALLS</option>
      <option value="NIGHTJAR BANQUETS">NIGHTJAR BANQUETS</option>
      <option value="CLASSIC ELEGANCE BANQUET">CLASSIC ELEGANCE BANQUET</option>
      <option value="BUTTERCUP BALLROOMS">BUTTERCUP BALLROOMS</option>
    </select><br>
    </div>
    <div id="date">

    <label for="date">Desired date:</label><br>
    <input type="date" id="date" name="date" ><br>
</div>
</div> <br>
    <label for="message" style="margin-left:0.5cm">Anything you want to know:</label><br>
    <textarea id="message" name="message" rows="5" placeholder="Enter your text here."></textarea><br><br>

    <input type="submit" id="button" value="BOOK">
    
    
  </form>

      </div>
    </div>
</div>
</body>
</html>