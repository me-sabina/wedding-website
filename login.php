<?php
session_start();
include('connection.php');
if(isset( $_SESSION['login']))
   {
   $user_name=$_POST['user_name'];
   $password=$_POST['password'];
   }
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <script src="https://kit.fontawesome.com/da3805c343.js" crossorigin="anonymous"></script>
  
<style>
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
.container {
  width: 380px;height: 400px;
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
input[type="password"] {
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
    font-size:0.4cm;
    border:none; width:3cm;height:1cm;
    background-color:whitesmoke;
}
#reg_btn:hover{
    box-shadow:0 1px 4px rgba(0, 0, 0, 0.5); ;
}
#error{
  background-color:rgb(216, 139, 139) ;
  color:#800001;
  width:100%;padding-top: 0.3cm;padding-left: 0.1cm;
  height:0.9cm;
}

#button {
  width: 100%;
  padding: 10px;
  background-color:#b328a7;
  color: #fff;font-size: 0.5cm;
  border: none;height: 1.1cm;
  border-radius: 4px;
  cursor: pointer;
}

#button:hover {
  background-color:  #703975;
}

</style>
</head>

<body>
  
  <div id=pop>

  <div class="container">
  <h1>Login</h1>

  <?php
     
if($_SERVER['REQUEST_METHOD']=="POST")
   {
    $user_name=$_POST['user_name']; 
      $password=$_POST['password'];
    //SOMETHING WAS POSTED
  
   

    // Check if user already exists
    $query = "SELECT * FROM user WHERE user_name = '$user_name' AND password='$password'";
    $result= mysqli_query($con,$query);
    $rows= mysqli_num_rows($result);

    if ($rows > 0) {
     header('location:weddingplanner.php');
  
    }
    else{
      echo'<div id="error">Invalid username or password.</div>';
    }
  }

 
?>

    <form method="POST">
        <div><span style="font-size:0.5cm"> Don't have an account?</span> &nbsp;&nbsp;&nbsp;<button id="reg_btn"><a id="reg_atag" href="signup.php">Register</a> <i class="fa-solid fa-arrow-right"></i> </button></div>
     <br><br> <input type="text" name="user_name" placeholder="Username"><br><br>

      <input type="password" name="password" placeholder="Password"><br><br>

      <button id="button"type="submit"name="login">Login</button>
    </form>
  </div>

  </div>

</body>
</html>
