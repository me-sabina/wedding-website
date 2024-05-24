<?php
?>
<!Doctype html>
<html>
    <head>
        <title>Submitted</title>
        <style>
            /* Popup container styles */
.success-popup {
  display: block;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #ecf8e6;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  padding: 20px;
  width: 400px;
  height: 300px;
}
#tick{
    width: 160px;
    height: 150px;
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
  text-decoration: none;
}
#smsg{
  font-size: 1cm;

}

/* Show popup animation */
@keyframes showPopup {
  0% {
    opacity: 0;
    transform: translate(-50%, -50%) scale(3);
  }
  50%{
    opacity: 0;
    transform: translate(-50%, -50%) scale(2.5);
  }
  100% {
    opacity: 1;
    transform: translate(-50%, -50%) scale(2);
  }
}

/* Hide popup animation */
@keyframes hidePopup {
  0% {
    opacity: 1;
    transform: translate(-50%, -50%) scale(2);
  }
  50%{
    opacity: 0;
    transform: translate(-50%, -50%) scale(1.5);
  }
  100% {
    opacity: 0;
    transform: translate(-50%, -50%) scale(1);
  }
}

        </style>
      
    </head>
        <body style="background-color:rgba(0, 0, 0, 0.445)">
           
            
            <div id="popup" class="success-popup">
              <a  href="index.php"><span class="close">&times;</span></a><br>
              <img id="tick" src="signtick.png">
              <h1 id="smsg">Successfully Registered!</h1>

            </div>
            <script src="script.js"></script>
            
</body>
    
    </html>