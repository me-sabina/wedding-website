<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Contact US Page</title>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css">
  
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
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
  
  
    <section class="head">
        <div class="A">
            <a href="https://www.facebook.com"> DreamWeds.com </a> 
            <h1>Keep In Touch</h1>
        </div>
        <div class="B">
            <a href="weddingplanner.html">Home </a> > <p3>Contact Us</p3>
        </div>
    </section>
    <section class="contact">
        <div class="content">
            <p>Contact Us</p>
            <h2>Keep in touch with DreamWeds.</h2>
                
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa-sharp fa-solid fa-location-dot"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>Kumaripati,14<br>Lalitpur,Nepal</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="text">
                        <h3>phone</h3>
                        <p>98-47843433</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"> <i class="fa-regular fa-clock"></i></div>
                    <div class="text">
                        <h3>Opening hours</h3>
                        <p>Sun to fri:10 AM to 6 PM<br>Saturday:closed</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"> <i class="fa-regular fa-envelope"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>DreamWeds4@gmail.com</p>
                    </div>
                </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14133.998725202076!2d85.32253821580059!3d27.6709471277286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19e58a6d1331%3A0x18ad0afdf12f826f!2sBalkumari%2C%20Lalitpur%2044600!5e0!3m2!1sen!2snp!4v1685039871555!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="contactForm">
                <h3> SEND MESSAGE!</h3>


             <!--AUTOMATED MAIL SENDING MECHANISM START-->

            <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'aayusharegmi2@gmail.com'; 
        $mail->Password = 'yucraoxtpjnfvvsk';  
        $mail->Port = 587;

        $mail->setFrom('aayusharegmi2@gmail.com');   
        $mail->addAddress('aayusharegmi2@gmail.com'); 

        $mail->isHTML(true);
        $mail->Subject = 'Message Received From contact:' . $name;
        $mail->Body = "Name: $name <br> Phone : $phone <br> Email: $email <br> Message : $message";

        $mail->send();
        $alert = "<div class='alert-success'><span> Message Sent! Thanks for contacting us.</span> </div>";
    } catch (Exception $e) {
        $alert = "<div class='alert-error'><span>Error sending message</span></div>";
    }
}
?>


<!---->
    <form method="post" action="">
       
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="phone" placeholder="Phone">
        <input type="email" name="email" placeholder="Email">
        <textarea name="message" placeholder="Message"></textarea>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php echo $alert;?>
<!--ENDD-->

        </div>
                
                
                    
        
        </div>

    <div class="last">
   <ul class="social-icon">
    <li>
        <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
    </li>
    <li>
        <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
    </li>
    <li>
        <a href="https://www.fa-whatsapp.com"><i class="fa-brands fa-whatsapp"></i></a>
    </li> <li>
        <a href="https://www.youtube.com"><i class="fa-brands fa-youtube"></i></a>
    </li>
</ul>
</div>

</section>
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
            <a href="#"><i class="fas fa-phone"></i>9804589645</a>
            <a href="#"><i class="fas fa-phone"></i>9865647891</a>

            <a href="#"><i class="fas fa-envelope"></i>DreamWeds4@gmail.com</a>
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