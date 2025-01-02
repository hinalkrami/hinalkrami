<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
include './connection.php';

if(isset($_POST['singin']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $q=mysqli_query($connection,"SELECT * FROM tbl_admin WHERE admin_email='{$email}' AND admin_password='{$password}'");
    $count=mysqli_num_rows($q);
    $row=mysqli_fetch_array($q);
    if($count==1)
    {   
        $_SESSION['id']=$row['admin_id'];
        $_SESSION['name']=$row['admin_name'];
        $_SESSION['email']=$row['admin_email'];
        $_SESSION['photo']=$row['admin_photo_path'];     
        $_SESSION['password']=$row['admin_password'];
        $_SESSION['contact']=$row['admin_contact'];
        header("location:Dashboard.php");
    }
    else
    {
      echo "<div class='alert alert-dismissible alert-success'>
      <button class='btn-close' type='button' data-bs-dismiss='alert'></button> Login failed.
    </div>";
    }
}

   if(isset($_POST['fp']))
   {
      $femail=$_POST['femail'];
      $q=mysqli_query($connection,"SELECT * FROM tbl_admin WHERE admin_email='{$femail}'");
      $count=mysqli_num_rows($q);
      if($count==1)
      {
               $newotp=rand(11111111,99999999);
               mysqli_query($connection,"UPDATE tbl_admin SET admin_password='{$newotp}' WHERE admin_email='{$femail}'");
               $msg="Hello <br/> Your Password is ".$newotp." That is temporury password you can change it by going on Change password tab. Thank you";

               //Import PHPMailer classes into the global namespace
           //These must be at the top of your script, not inside a function
           
           //Load Composer's autoloader
               require 'vendor/autoload.php';

           //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

           try {
               //Server settings
               //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
               $mail->isSMTP();                                            //Send using SMTP
               $mail->Host       ='smtp.gmail.com.';                     //Set the SMTP server to send through
               $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
               $mail->Username   = 'greenheven2041@gmail.com';                     //SMTP username
               $mail->Password   = 'zhmvwcawjafgqcop';                               //SMTP password
               $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
               $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

               //Recipients
               
               $mail->setFrom('greenheven2041@gmail.com', 'Seller');
               $mail->addAddress($femail, "Dear User");     
               

               //Content
               $mail->isHTML(true);                                  //Set email format to HTML
               $mail->Subject = 'Forgot Password';
               $mail->Body    = $msg;
               $mail->AltBody = $msg;

               $mail->send();
               echo "<div class='alert alert-dismissible alert-success'>
               <button class='btn-close' type='button' data-bs-dismiss='alert'></button> Password Sent on your Email.
             </div>";
               
           } catch (Exception $e) {
              echo "<br>";
               echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
           }
       }
       else
       {
           echo "<div class='alert alert-dismissible alert-success'>
               <button class='btn-close' type='button' data-bs-dismiss='alert'></button> Email not found 😥.
             </div>";
       }
   }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <script src="js/jquery-3.7.1.js" type="text/javascript"></script> 
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function()
      {
        $("#adminlogin").validate();
        $("#forgot").validate();
       
      });
      </script>
    <style>
      .error {
        color:red !important;}
        
    </style>
      
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Admin Login</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Admin</h1>
      </div>
      <div class="login-box login">
          <form class="login-form" id="adminlogin" method="post"  >
            <h3 class="login-head"><i class="bi bi-person me-2"></i>SIGN IN</h3>
            <div class="mb-3">
              <label class="form-label">USERNAME</label>
              <input class="form-control" type="text" placeholder="Email" name="email" autofocus required>
            </div>
            <div class="mb-3">
              <label class="form-label">PASSWORD</label>
              <input class="form-control" type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>
            <div class="mb-3">
              <div class="utility">
                <div class="form-check">
                  <label class="form-check-label">
                  <p class="semibold-text mb-1"  ><a  href="Admin-form.php" class="register">Registration</a></p>
                  </label>
                </div>
                <p class="semibold-text mb-2"  ><a  href="#" data-toggle="flip">Forgot Password ?</a></p>
              </div>
            </div>
            <div class="mb-3 btn-container d-grid">
              <button class="btn btn-primary btn-block" name="singin"><i class="bi bi-box-arrow-in-right me-2 fs-5"></i>SIGN IN</button>
            </div>
          </form>
        
        <form class="forget-form forgotp" method="post" id="forgot" >
          <h3 class="login-head"><i class="bi bi-person-lock me-2"></i>Forgot Password ?</h3>
          <div class="mb-3">
            <label class="form-label">EMAIL</label>
            <input class="form-control" type="email" name="femail" placeholder="Email" required>
          </div>
          <div class="mb-3 btn-container d-grid">
            <button class="btn btn-primary btn-block" name="fp"><i class="bi bi-unlock me-2 fs-5"></i>RESET PASSWORD</button>
          </div>
          <div class="mb-3 mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="bi bi-chevron-left me-1"></i> Back to Login</a></p>
          </div>
        </form>
      
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <!-- <script src="js/jquery-3.7.0.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
      
    </script>
  </body>
  
</html>