<?php
session_start();
include 'Firstlogin.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include 'connection.php';


if(isset($_POST['changepassword']))
{
  $opassword=$_POST['opassword'];
  $npassword=$_POST['npassword'];
  $cpassword=$_POST['cpassword'];
  $aid=$_SESSION['id'];
  $oq=mysqli_query($connection,"SELECT * FROM tbl_admin WHERE admin_id='{$aid}'");
  $odata=mysqli_fetch_array($oq);
  if($odata['admin_password']==$opassword)
  {
    if($npassword==$cpassword)
    {
      if($opassword==$npassword)
      {
        echo "<div class='alert alert-dismissible alert-success'>
        <button class='btn-close' type='button' data-bs-dismiss='alert'></button> New Password Can not be same as Old Password.
      </div>";
      }
      else
      {
        $uq=mysqli_query($connection,"UPDATE tbl_admin SET admin_password='{$npassword}' WHERE admin_id='{$aid}'");
        echo "<div class='alert alert-dismissible alert-success'>
        <button class='btn-close' type='button' data-bs-dismiss='alert'></button> Password Updated.
      </div>";
        if(isset($_POST['changepassword']))
        {
          header("location:Admin-login.php");
        }
      }
    }
    else{
      echo "<div class='alert alert-dismissible alert-success'>
        <button class='btn-close' type='button' data-bs-dismiss='alert'></button> New Password and Confirm Password Needs to be Same.
      </div>";
    }
  }
  else
  {
    echo "<div class='alert alert-dismissible alert-success'>
        <button class='btn-close' type='button' data-bs-dismiss='alert'></button> Old Password Not Match.
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
               $msg="Hello <br/> Yore Password is ".$newotp." keep the password in your mind 😝.";
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
               $mail->setFrom('greenheven2041@gmail.com', 'Tester');
               $mail->addAddress($femail, 'Greenheaven.com');     //Add a recipient
               // $mail->addAddress('ellen@example.com');               //Name is optional
               // $mail->addReplyTo('info@example.com', 'Information');
               // $mail->addCC('cc@example.com');
               // $mail->addBCC('bcc@example.com');

               //Attachments
               // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
               // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

               //Content
               $mail->isHTML(true);                                  //Set email format to HTML
               $mail->Subject = 'forgot Password';
               $mail->Body    = $msg;
               $mail->AltBody = $msg;

               $mail->send();
               echo "<div class='alert alert-dismissible alert-success'>
               <button class='btn-close' type='button' data-bs-dismiss='alert'></button> Password Sent on your Email.
             </div>";
             header("location:Admin-login.php");
               
           } catch (Exception $e) {
               echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
           }
       }
       else
       {
           echo "<div class='alert alert-dismissible alert-success'>
               <button class='btn-close' type='button' data-bs-dismiss='alert'></button> Email not found.<script>window.location.assign('Admin-changepassword.php');</script>
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
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Admin Changepassword</title>
   
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Admin</h1>
      </div>
      <div class="login-box change">
        <form class="login-form" name="changeform" method="post" id="adminchange" >
          <h3 class="login-head"><i class="bi bi-person me-2"></i>Change Password</h3>
          <div class="mb-3">
            <label class="form-label">OLD PASSWORD</label>
            <input class="form-control" type="password"  placeholder="Old Password" name="opassword"  autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">NEW PASSWORD</label>
            <input class="form-control" type="password" name="npassword" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required>
          </div>
          <div class="mb-3">
            <label class="form-label">CONFIRM PASSWORD</label>
            <input class="form-control" type="password" name="cpassword" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  minlength="8" required >
          </div>
          <div class="mb-3">
            <div class="utility">
              
              <p class="semibold-text mb-2"  ><a  href="#" data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="mb-3 btn-container d-grid">
            <button  class="btn btn-primary btn-block"  name="changepassword"><i class="bi bi-box-arrow-in-right me-2 fs-5"></i>CHANGE PASSWORD</button>
          </div>
        </form>
        <form class="forget-form forgotp" method="post" id="forgot" >
          <h3 class="login-head"><i class="bi bi-person-lock me-2"></i>Forgot Password ?</h3>
          <div class="mb-3">
            <label class="form-label">EMAIL</label>
            <input class="form-control" type="text" name="femail" placeholder="Email" required>
          </div>
          <div class="mb-3 btn-container d-grid">
            <button class="btn btn-primary btn-block" name="fp"><i class="bi bi-unlock me-2 fs-5"></i>RESET PASSWORD</button>
          </div>
          <div class="mb-3 mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="bi bi-chevron-left me-1"></i> Back to Changepassword</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box,.change').toggleClass('flipped');
      	return false;
      });
    </script>
    <script src="js/jquery-3.7.1.js" type="text/javascript"></script> 
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function()
      {
        $("#adminchange").validate();
        $("#forgot").validate();
       
      });
      </script>
   <style>
    .error{
      color:red !important;
    }
    </style>
  </body>
</html>
