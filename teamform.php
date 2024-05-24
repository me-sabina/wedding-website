<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "projecti";
error_reporting(E_ALL);
ini_set('display_errors', 1);

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$con) {
    die("Failed to connect: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send request</title>
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        <div id="cross"><a href="service.php" id="crossa"><i class="fa-regular fa-circle-xmark"></i></a></div>
        <div id="bookform">
            <div id="bookforma"></div>
            <div id="bookformb">
                <div id="title">BOOK YOUR TEAM NOW</div><br>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $date = $_POST['date'];

                    // Get the selected checkbox values as an array
                    $selectedServices = isset($_POST['cvendor']) ? $_POST['cvendor'] : [];
                    $selectedServicesText = implode(", ", $selectedServices);

                    if (empty($fname)) {
                        echo '<div id="error">First Name cannot be empty.</div>';
                    } elseif (empty($lname)) {
                        echo '<div id="error">Last Name cannot be empty.</div>';
                    } elseif (empty($email)) {
                        echo '<div id="error">Email cannot be empty.</div>';
                    } elseif (empty($date)) {
                        echo '<div id="error">Date cannot be empty.</div>';
                    } elseif (strlen($phone) < 10) {
                        echo '<div id="error">Invalid number format.</div>';
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo '<div id="error">Invalid email format.</div>';
                    } else {
                        // Perform database insert

                        $query = "SELECT * FROM servicechoice WHERE email = ?";
                        $stmt = mysqli_prepare($con, $query);
                        mysqli_stmt_bind_param($stmt, "s", $email);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        if (mysqli_num_rows($result) > 0) {
                            echo '<div id="error">YOU HAVE ALREADY BOOKED ONE VENDOR.</div>';
                        } else {
                            $query = "INSERT INTO servicechoice (First_name, Last_name, email, phone, Date_expected, services_name) VALUES (?, ?, ?, ?, ?, ?)";
                            $stmt = mysqli_prepare($con, $query);
                            mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $phone, $date, $selectedServicesText);

                            if (mysqli_stmt_execute($stmt)) {
                                echo '<div id="error">SUBMITTED SUCCESSFULLY!</div>';
                            } else {
                                echo '<div id="error">Error: ' . mysqli_error($con) . '</div>';
                            }

                            mysqli_stmt_close($stmt);
                        }
                    }

                    mysqli_close($con);
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
    <label for="cvendor">Choose type of service:</label><br>
    
      <span id="hey"><input type= "checkbox" name="cvendor[]"value="Guest Accomodation">Guest Accomodation</span><br>
      <span id="hey"><input type= "checkbox"  name="cvendor[]" value="Budget Planning">Budget Planning</span><br>
      <span id="hey"> <input type="checkbox" name="cvendor[]"value="Boutique Selection">Boutique Selection</span><br>
      <span id="hey"> <input type="checkbox"name="cvendor[]"value="Photo Booth">Photo Booth</span><br>
      <span id="hey"><input type="checkbox"name="cvendor[]"value="Invitation Cards">Invitation Cards</span><br>
      <span id="hey"><input type="checkbox"name="cvendor[]"value="Custom Decorations">Custom Decorations</span><br>
      <span id="hey"><input type="checkbox"name="cvendor[]"value="Jwellery Selection">Jwellery Selection</span><br>
      <span id="hey"><input type="checkbox"name="cvendor[]"value="Mehendi Designing">Mehendi Designing</span><br>
      <span id="hey"> <input type="checkbox"name="cvendor[]"value="Band Baja">Band Baja</span><br>
      <span id="hey"> <input type="checkbox"name="cvendor[]"value="Baggi & Horses">Baggi & Horses</span><br>
    <br>
    </div>
    <div id="date">

    <label for="date">Desired date:</label><br>
    <input type="date" id="date" name="date" ><br>
</div>
</div> <br>
    

    <input type="submit" id="button" value="BOOK">
    
    
  </form>
            </div>
        </div>
    </div>
</body>
</html>


















<!--

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "projecti";
error_reporting(E_ALL);
ini_set('display_errors', 1);

---

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
      <div id="title">BOOK YOUR TEAM NOW</div><br>

     ----------------------
      
     if ($_SERVER['REQUEST_METHOD']=="POST"){
      $fname=$_POST['fname'];
    
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $svendor=$_POST['cvendor'];
      $date=$_POST['date'];
      

      $query = "SELECT * FROM servicechoice WHERE email = '$email'";
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
        $query = "INSERT INTO servicechoice (First_name, Last_name, email, phone, Date_expected, services_name) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $phone, $date, $svendor);

        if (mysqli_stmt_execute($stmt)) {
            echo '<div id="error">SUBMITTED SUCCESSFULLY!</div>';
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
    <label for="cvendor">Choose type of service:</label><br>
    
      <span id="hey"><input type= "checkbox" name="cvendor[]"value="Guest Accomodation">Guest Accomodation</span><br>
      <span id="hey"><input type= "checkbox"  name="cvendor[]" value="Budget Planning">Budget Planning</span><br>
      <span id="hey"> <input type="checkbox" name="cvendor[]"value="Boutique Selection">Boutique Selection</span><br>
      <span id="hey"> <input type="checkbox"name="cvendor[]"value="Photo Booth">Photo Booth</span><br>
      <span id="hey"><input type="checkbox"name="cvendor[]"value="Invitation Cards">Invitation Cards</span><br>
      <span id="hey"><input type="checkbox"name="cvendor[]"value="Custom Decorations">Custom Decorations</span><br>
      <span id="hey"><input type="checkbox"name="cvendor[]"value="Jwellery Selection">Jwellery Selection</span><br>
      <span id="hey"><input type="checkbox"name="cvendor[]"value="Mehendi Designing">Mehendi Designing</span><br>
      <span id="hey"> <input type="checkbox"name="cvendor[]"value="Band Baja">Band Baja</span><br>
      <span id="hey"> <input type="checkbox"name="cvendor[]"value="Baggi & Horses">Baggi & Horses</span><br>
    <br>
    </div>
    <div id="date">

    <label for="date">Desired date:</label><br>
    <input type="date" id="date" name="date" ><br>
</div>
</div> <br>
    

    <input type="submit" id="button" value="BOOK">
    
    
  </form>

      </div>
    </div>
</div>
</body>
</html>