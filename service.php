<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "projecti";


if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("failed to connect!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
      #error{
    background-color:rgb(216, 139, 139) ;
    color:#800001;border-radius: 3px;
    width:400px;padding-top: 0.3cm;margin-left: 0.5cm; margin-right: 0.6cm;padding-left: 0.9cm;
    height:0.7cm;
  }
      </style>
    <title>Booking&Services</title>
    <!--font awesome-->
    
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="service.css">
    <link rel="stylesheet" href="booking.css">
 
   <script>// Function to handle user logout
function logoutUser() {
  // Perform your logout actions here, such as clearing session data, etc.
  // After logout, add a new state to the browser history
  history.pushState(null, null, window.location.href);
}

// Listen for the logout event (you can trigger this event when the user clicks on the logout button)
document.getElementById('logout-button').addEventListener('click', function() {
  logoutUser();
});
</script>

   
  
</head>
<body>


      <?php
      
     if ($_SERVER['REQUEST_METHOD']=="POST"){
      $fname=$_POST['fname'];
    
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $vendor=$_POST['vendor'];
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

      elseif(strlen($phone)<10){
        echo'<div id="error">Invalid number format.</div>';
      }
      elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div id="error">Invalid email format.</div>';
       } 
       
       else{
        $query= "INSERT INTO clientdetails (First_name,Last_name,email,phone,Date_expected,
        vendor_type,vendor_name,user_Message) VALUES
         ('$fname','$lname','$email','$phone','$date','Photography&Videography','$vendor','$message')";
        $resulta = mysqli_query($con, $query);

        if($resulta){
          echo'<div id="error">SUBMITTED SUCCESSFULLY!</div>';
          $fname = $lname = $email = $phone = $vendor = $date = $message = '';
        }
        else {
          // An error occurred while saving user data
          echo '<div id="error">Error: ' . mysqli_error($con) . '</div>';
      }
     }

    }

      ?>

  

    <!--HEADER SECTION-->
    <nav>
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fa-solid fa-bars" id="btn"></i>
            <i class="fa-solid fa-times" id="cancel"></i>
        </label>
        <img  style ="width:7cm;height:2cm; margin-top:-0.4cm;margin-left:1cm"src="FIXLOGO.png">
        <ul>
            <li><a href="weddingplanner.php">Home</a></li>
             <li><a href="service.php">Booking & Services</a></li>
            <li><a href="Aboutus.php">Aboutus</a></li>
            <li><a href="contactus.php">Contact</a></li>
            <li><a class="font06" id="navtag" alt="Logout"  href="login.php"><i class="fa-solid fa-user-lock"></i></a></li>
        </ul>
    </nav>

  <!--FIRST DISPLAY BOX-->

  <div id="display">
   
   <div class="banner1" >
   <div class="banner1_text">
    <p>// Exquisite and Customized Decor</p>
 </div>

     
      </div>

   

  
      <div class="banner2" >
         <div class="banner2_text">
          <p>// Photography &
             Videography</p>
       </div>
      
           
       </div>
      
        
       <div class="banner3" >
                     <div class="banner3_text">
                      <p>//Beauty Collaborations </p>
                   </div>
                  
                     
                        </div>
      

   
                  <div class="banner4" >
                     <div class="banner4_text">
                      <p>//Effective Budget planning</p>
                   </div>
                  
                       
                        </div>
   
  </div>
  
   <div id="callsection">
      <h1 id="calltext">Book a vendor in simple steps</h1>
      <div id="boxes">
      <div class="calla">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="font" class="fa-solid fa-users-viewfinder"></i>
        <P id="calldivtext">Choose vendors >><br>Send your requirements to multiple vendors.</P>
      </div>
      <div id="callb">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="font"class="fa-solid fa-file-import"></i>
        <P id="calldivtext">Match requirements >><br>Get exactly what you want.</P>
      </div>
      <div id="callc">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i id="font" class="fa-solid fa-user-lock"></i>
        <P id="calldivtext">Book now >><br>Book best vendors for your events.</P>
      </div>

    </div>
   
  </div>

  <!--CATEGORY-->
  <div id="bookmain">
    
  <div id="category">
    <div>
   <p style="font-size: 0.8cm;color:rgb(190, 93, 125); font-family:Georgia, 'Times New Roman', Times, 
   serif;background-color: rgb(255, 255, 255);padding-left: 2cm;height:1.5cm;font-style: italic;font-weight: 800;padding-top: 0.5cm;margin-top: 0.1cm;">//CATEGORY</p>
    </div>
    <Div id="choose_vendors">&rarr;&nbsp;Choose Vendors</Div><br><br>
   <div id="form">
    
     <a id="B" href="service.php" class="active">||Photography&Videography</a><br><br>
     <br><a id="A"  href="venue.php">|| Venue&Decorer</a> <br><br>
      <br><a id="A" href="makeup.php">|| Makeup&Boutique</a><br><br>
       <br><a id="A"href="cakedecor.php">|| Cake decor</a><br><br>
      
    
     
    </div><br><br><br><br>
    <Div id="choose_vendors">&rarr;&nbsp;Team Services</Div><br><br><br>
   <div id="form">
    
     <a id="A" > <i class="fa-solid fa-people-group"></i>&nbsp;&nbsp;Guest Accomodation</a><br><br>
     <br><a id="A"  ><i class="fa-solid fa-people-group"></i>&nbsp;&nbsp;Budget Planning</a> <br><br>
      <br><a id="A" ><i class="fa-solid fa-people-group"></i>&nbsp;&nbsp;Boutique Selection</a><br><br>
       <br><a id="A"><i class="fa-solid fa-people-group"></i>&nbsp;&nbsp;Photo Booth</a><br><br>
       <br><a id="A"><i class="fa-solid fa-people-group"></i>&nbsp;&nbsp;Invitation Cards</a><br><br>
       <br><a id="A"><i class="fa-solid fa-people-group"></i>&nbsp;&nbsp;Custom Decorations</a><br><br>
       <br><a id="A"><i class="fa-solid fa-people-group"></i>&nbsp;&nbsp;Jwellery Selection</a><br><br>
       <br><a id="A"><i class="fa-solid fa-people-group"></i>&nbsp;&nbsp;Mehendi Designing</a><br><br>
       <br><a id="A"><i class="fa-solid fa-people-group"></i>&nbsp;&nbsp;Band Baja</a><br><br>
       <br><a id="A"><i class="fa-solid fa-people-group"></i>&nbsp;&nbsp;Baggi & Horses</a><br>
     
    </div><br><br><br><br>
    <div id="teambookmain">
    <p ID="here">APPRECIATE ABOVE TEAM SERVICES?</p>
    <div ID="teambtn">
      <a href="teamform.php"><button class="shiningbuttona">GET YOURS NOW</button></A>
  </div>
   


  </div>
  
   
  </div>

  <div id="pages">
  <div id="pvendorII">

<div id="vimgII">
     <img id="vimg2"src="photo6.jpg" >
</div>
<div id="vdetailII">
<p id="det1">THE DREAMS PRODUCTION</p>
     <p id="det2">Experience:8 Years &nbsp; <span id="line">|&nbsp;</span>Type:Team </p>
   <span id="det_a">&nbsp; Pre-wedding&nbsp;&nbsp;</span>&nbsp;<span id="det_b">&nbsp;&nbsp;Wedding Ceremony&nbsp;&nbsp;</span>&nbsp;
   <span id="det_c">&nbsp;&nbsp;Post-wedding&nbsp;&nbsp;</span><br><span id="det_c">&nbsp;&nbsp;Cinematography&nbsp;&nbsp;</span>
   &nbsp;<span id="det_c">&nbsp;&nbsp;Portrait Photography&nbsp;&nbsp;</span>&nbsp;<span id="det_c">&nbsp;&nbsp;Product Photography&nbsp;&nbsp;</span>
   <br><br>
   <span id="detloc">Service Location: Kathmandu,Lalitpur,Bhaktapur,Pokhara</span>
</div>

</div>
<div id="book_btn">
<a href="booking_form.php"><button class="shining-button">Book Now</button></a>

</div><br><br>


<div id="pvendorIII">

<div id="vimgIII">
     <img id="vimg3"src="photo8.jpg" >
</div>
<div id="vdetailIII">
<p id="det1">CU-ZAN CREATION</p>
     <p id="det2">Experience:5 Years &nbsp; <span id="line">|&nbsp;</span>Type:Individual </p>
   <span id="det_a">&nbsp; Pre-wedding&nbsp;&nbsp;</span>&nbsp;<span id="det_b">&nbsp;&nbsp;Wedding Ceremony&nbsp;&nbsp;</span>&nbsp;<span id="det_c">&nbsp;&nbsp;Post-wedding&nbsp;&nbsp;</span>
   <br><span id="det_c">&nbsp;&nbsp;Product Photography&nbsp;&nbsp;</span><br><br>
   <span id="detloc">Service Location: Kathmandu,Lalitpur</span>
</div>

</div>
<div id="book_btn">
<a href="booking_form.php"><button class="shining-button">Book Now</button></a>

</div>
<br><br>

    <div id="pvendorI">


       <div id="vimgI">
            <img id="vimg1"src="JS Photography.jpg" >
       </div>
       <div id="vdetailI">
            <p id="det1">JS PHOTOGRAPHY</p>
            <p id="det2">Experience:3 Years &nbsp; <span id="line">|&nbsp;</span>Type:Team </p>
          <span id="det_a">&nbsp; Pre-wedding&nbsp;&nbsp;</span>&nbsp;<span id="det_b">&nbsp;&nbsp;Wedding Ceremony&nbsp;&nbsp;</span>&nbsp;<span id="det_c">&nbsp;&nbsp;Post-wedding&nbsp;&nbsp;</span>
          <br><br>
          <span id="detloc">Service Location: Kathmandu,Lalitpur</span>

       </div>

    </div>
    
    <div id="book_btn">
    <a href="booking_form.php"><button class="shining-button">Book Now</button></a>

</div><br><br>
    


    

    <div id="pvendorIV">

       <div id="vimgIV">
            <img id="vimg4"src="photo3.jpg" >
       </div>
       <div id="vdetailIV">
       <p id="det1">URBAN PHOTOGRAPHY</p>
            <p id="det2">Experience:10 Years &nbsp; <span id="line">|&nbsp;</span>Type:Team </p>
          <span id="det_a">&nbsp; Pre-wedding&nbsp;&nbsp;</span>&nbsp;<span id="det_b">&nbsp;&nbsp;Wedding Ceremony&nbsp;&nbsp;</span>&nbsp;<span id="det_c">&nbsp;&nbsp;Post-wedding&nbsp;&nbsp;</span><br>
          <span id="det_a">&nbsp; Corporate Photography&nbsp;&nbsp;</span>&nbsp;<span id="det_b">&nbsp;&nbsp;Baby shower&nbsp;&nbsp;</span>&nbsp;<span id="det_c">&nbsp;&nbsp;Birthday Party&nbsp;&nbsp;</span>
          <br><span id="det_a">&nbsp; Product Photography&nbsp;&nbsp;</span>&nbsp;<span id="det_b">&nbsp;&nbsp;Cinematography&nbsp;&nbsp;</span><br><br>
          <span id="detloc">Service Location: Kathmandu,Lalitpur,Chitwan,Pokhara,Hetauda,Bhaktapur,Surkhet,Butwal</span>
       </div>

    </div>
    <div id="book_btn">
    <a href="booking_form.php"><button class="shining-button" >Book Now</button></a>

</div><br><br>


    <div id="pvendorV">

       <div id="vimgV">
            <img id="vimg5"src="photo5a.jpg" >
       </div>
       <div id="vdetailV">
       <p id="det1">BLOOM DIGITAL STUDIO</p>
            <p id="det2">Experience:3 Years &nbsp; <span id="line">|&nbsp;</span>Type:Team </p>
          <span id="det_a">&nbsp; Pre-wedding&nbsp;&nbsp;</span>&nbsp;<span id="det_b">&nbsp;&nbsp;Wedding Ceremony&nbsp;&nbsp;</span>&nbsp;<span id="det_c">&nbsp;&nbsp;Post-wedding&nbsp;&nbsp;</span><br>
          <span id="det_a">&nbsp; Personalized Photography&nbsp;&nbsp;</span>&nbsp;<span id="det_b">&nbsp;&nbsp;Bratabandha&nbsp;&nbsp;</span>&nbsp;<span id="det_c">&nbsp;&nbsp;Rice-Feeding&nbsp;&nbsp;</span>
          <br><br>
          <span id="detloc">Service Location: Kathmandu,Lalitpur,Surkhet,Bhaktapur</span>
       </div>

    </div>
    <div id="book_btn">
    <a href="booking_form.php"><button class="shining-button">Book Now</button></a>

</div><br><br>


  </div>
</div>
<section class="footer">
    <div class="footer-wave-box">
        <div class="footer-wave footer-animation"></div>
    </div>
    <div class="box-container">
        <div class="box">
            <h3> Branches</h3>
            <a href="#"><i class="fas fa-map-marker-alt"></i>Kathmandu</a>
            <a href="#"><i class="fas fa-map-marker-alt"></i>Biratnagar</a>
            <a href="#"><i class="fas fa-map-marker-alt"></i>Pokhara</a>
            <a href="#"><i class="fas fa-map-marker-alt"></i>Illam</a>
            <a href="#"><i class="fas fa-map-marker-alt"></i>Jhapa</a>
        </div>
        <div class="box">
            <h3> Contact-info</h3>
            <a href="#"><i class="fas fa-phone"></i>9808542345</a>
            <a href="#"><i class="fas fa-phone"></i>9861282016</a>
        
            <a href="#"><i class="fas fa-envelope"></i>wedtayari3@gmail.com</a>
            <a href="#"><i class="fas fa-map-marker-alt"></i>Ktm-4000104</a>
            <a href="#"><i class="fas fa-map-marker-alt"></i>pkr-422904</a>
        </div>
        <div class="box">
            <h3>Follow us</h3>
            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a>
            <a href="#"><i class="fab fa-twitter"></i>Twitter</a>
            <a href="#"><i class="fab fa-instagram"></i>Instagram</a>
            <a href="#"><i class="fab fa-linkedin"></i>Linkedin</a>
        </div>
        <div class="credit">&copy;2023|All Rights Reserved 2023</div>
       <div class="pay"><img src="pay.png"></div>
    </div>
</section>

</body>
</html>

</body>
</html>