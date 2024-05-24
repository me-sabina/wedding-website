<?php

session_start();

include("connection.php");
if(isset( $_SESSION['signup']))
   {
   $user_name=$_POST['user_name'];
   $password=$_POST['password'];
   $confirm_password=$_POST['confirm_password'];

   
    
   }
?>



<!Doctype html>
<html>
    <head>
        <title>Signup page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/da3805c343.js" crossorigin="anonymous"></script>
        <style>

          /* SUCCESS BOX STYLE */

          #successpop {
  display: none;
  position: fixed;
  border-radius: 15px;
  top: 50%;
  left: 50%;margin-top:0cm;
  transform: translate(-50%, -50%);
  background-color: #ecf8e6;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  padding: 20px;
  width: 430px;
  height: 500px;
}
#tick{
    width: 210px;
    height: 190px;margin-top: 2cm;
    margin-left:110px;
    background-color: white;
    border-radius: 3cm;
}

/* Close button styles */
.close {
  float: right;
  font-size: 60px;
 
  font-weight: bold;margin-top: -5%;
  cursor: pointer;
}
#closea{
  
}
#smsg{
  
  font-size: 0.9cm;

}

/* Show popup animation */
@keyframes showPopup {
  0% {
    opacity: 0;
    transform: translate(-50%, -50%) scale(1.2);
  }
  50%{
    opacity: 0;
    transform: translate(-50%, -50%) scale(1);
  }
  100% {
    opacity: 1;
    transform: translate(-50%, -50%) scale(0.9);
  }
}


/*success box style END*/




    body {
  font-family: Arial, sans-serif;
  
  
}
#pop
{
  background-image: url(DREAMWEDS.gif);
 background-repeat: no-repeat;
 background-size: cover;
  height:100%;top:0;
  left:0; width:100%;
  position: fixed;
}
@media (max-width:785px){
  #pop{
    background-position-x: -10cm;
  }
}

.container,#formbox {
  width: 380px;height: 435px;
  margin: 0 auto;
  margin-top: 100px;
  background-color: #fff;
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 2px 5px gainsboro;
}

h1 {
  text-align: center;
  color: #333;
}

form {
  margin-top: 20px;
}

input[type="text"],
input[type="password"] , input[type="email"] {
  width: 100%;
  padding: 8px; font-size: 0.5cm;
  margin-bottom: 10px;
  border-radius: 4px;
  border: 1px solid #ccc;
}

#reg_atag{
    color:#800001;
    text-decoration: none;
}
#reg_btn{
    border-radius: 5mm;
    font-size:0.5cm;
    border:none; width:3.5cm;height:1.1cm;
    background-color:rgb(243, 237, 237);
}
#reg_btn:hover{
    box-shadow:0 1px 4px rgb(243, 237, 237); ;
}

#button {
  width: 100%;
  padding: 10px;
  background-color: #b328a7;
  color: #fff;font-size: 0.5cm;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}
#error{
  background-color:rgb(216, 139, 139) ;
  color:#800001;
  width:100%;padding-top: 0.3cm;padding-left: 0.1cm;
  height:0.9cm;
}
#errorU{
  color:darkolivegreen;
  background-color:  rgb(248, 214, 20);
  width:100%;padding-top: 0.3cm;padding-left: 0.1cm;
  height:0.9cm;
}
#success{
  color: #022c07;
  background-color: #45a049;
  width:100%;padding-top: 0.3cm;padding-left: 0.1cm;
  height:0.9cm;
}

#button:hover {
  background-color: #703975;
}



        </style>
      
   
</head>
<body> 
<div id="pop">
<div id="successpop" class="success-popup">
              <a  href="login.php"><span class="close" style="color:black">&times;</span></a><br>
              <img id="tick" src="signtick.png"><br><br>
              <h1 id="smsg">Successfully Registered!</h1>

      </div>
  

   

  <div class="container" id="formbox">
    <h1>Signup</h1>
    <?php
if($_SERVER['REQUEST_METHOD']=="POST")
   {
    //SOMETHING WAS POSTED
   $user_name=$_POST['user_name']; 
   $password=$_POST['password'];
   $confirm_password=$_POST['confirm_password'];
   $email=$_POST['email'];

    // Check if user already exists
    $query = "SELECT * FROM user WHERE email = '$email' AND password ='$password'";
    $result= mysqli_query($con,$query);

    if (mysqli_num_rows($result) > 0) {
       echo '<div id="errorU"> User already exists.</div>';
  
    }
   else if(empty($user_name)){
    echo' <div id="error">Username cannot be empty.</div>';
    
   }
    

   
   else if(empty($password)){
    echo '<div id="error">Enter a password.</div>';
    
   }
   elseif (strlen($password) < 6) {
    echo '<div id="error">Password should be at least 6 characters long.</div>';
   }

   elseif(empty($confirm_password)||$password!=$confirm_password){
    echo' <div id="error">Password mismatch.</div>';
    
   }
   elseif (empty($email)) {
    echo '<div id="error">Email cannot be empty.</div>';

   } 
 elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<div id="error">Invalid email format.</div>';
   } 
   else{
    $query= "INSERT INTO user (user_name,password,confirm_password,email) VALUES ('$user_name','$password','$confirm_password','$email')";
    $result = mysqli_query($con, $query);
    
    
   
    if ($result) {
      // User data saved successfully
      echo '<script>

      document.getElementById("successpop").style.display = "block";
      document.getElementById("successpop").style.animation = "showPopup 0.3s forwards";
      

      </script>';
      
     
      
  } else {
      // An error occurred while saving user data
      echo '<div id="error">Error: ' . mysqli_error($con) . '</div>';
  }
    
    
   }

   }
?>
     
    
    <form method="POST" action=""  >
      <input type="text" name="user_name" placeholder="Enter your name">
      <input type="email"name="email" placeholder="Enter your email id">
      <input type="password" name="password" placeholder="Enter a password">
      <input type="password" name="confirm_password" placeholder="Re-enter the password">
      <button id="button"type="submit" name="signup">Signup</button><br><br>
      <div><span style="font-size:0.5cm"> Already have an account?</span>&nbsp;&nbsp;&nbsp;<button id="reg_btn"><a id="reg_atag" href="login.php">Log In</a> <i class="fa-solid fa-arrow-right"></i> </button></div>
      
    </form>

  
            </div>
</div>
  
</body>
</html>
