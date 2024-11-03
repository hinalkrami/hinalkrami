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
  
  $uid=$_SESSION['uid'];
  $oq=mysqli_query($connection,"SELECT * FROM tbl_user WHERE user_id='{$uid}'");
  $odata=mysqli_fetch_array($oq);
  if($odata['user_password']==$opassword)
  {
    if($npassword==$cpassword)
    {
      if($opassword==$npassword)
      {
        echo "<script>alert('New Password Can not be same as Old Password.')</script>";
      }
      else
      {
        $uq=mysqli_query($connection,"UPDATE tbl_user SET user_password='{$npassword}' WHERE user_id='{$uid}'");
        
        if(isset($_POST['changepassword']))
        {
         echo  "<script>alert('Password Updated.');window.location.assign('Sign-in.php');</script>";
        }
      }
    }
    else{
      echo "<script>alert('New Password and Confirm Password Needs to be Same.')</script>";
    }
  }
  else
  {
    echo "<script>alert('Old Password Not Match.')</script>";
  }

}
if(isset($_POST['fp']))
   {
      $femail=$_POST['femail'];
      $q=mysqli_query($connection,"SELECT * FROM tbl_user WHERE user_email='{$femail}'");
      $count=mysqli_num_rows($q);
      if($count==1)
      {
               $newotp=rand(11111,99999);
               mysqli_query($connection,"UPDATE tbl_user SET user_password='{$newotp}' WHERE user_email='{$femail}'");
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
               echo "<script>alert('Password Sent on your Email.')</script>";
             header("location:Sign-in.php");
               
           } catch (Exception $e) {
               echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
           }
       }
       else
       {
           echo "<script>alert('Email not found 😥.');window.location='Change-password.php';</script>";
       }
   }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Change Password</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
      
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/plant.png">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="assets/css/vendor/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/css/vendor/slick.css">
    <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/vendor/sal.css">
    <link rel="stylesheet" href="assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/vendor/base.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

</head>


<body>
    <div class="axil-signin-area">

        <!-- Start Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-xl-4 col-sm-6">
                    <a href="Product.php" class="site-logo"></a>
                </div>
                <div class="col-md-2 d-lg-block d-none">
                <a href="Forgot-password.php" class="back-btn"><i class="far fa-angle-left"></i></a>
                </div>
                <div class="col-xl-6 col-lg-4 col-sm-6">
                    <div class="singin-header-btn">
                        <p>Already a member?</p>
                        <a href="Sign-in.php" class="sign-up-btn axil-btn btn-bg-secondary">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--10">
                    <h2 class="title"></h2>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title mb--35">Change Password</h3>
                        <form class="singin-form" method="post" id="change">
                            <div class="form-group">
                                <label>Old password</label>
                                <input type="password" class="form-control" name="opassword" placeholder="Enter Current password" maxlength="16" minlength="8" required>
                            </div>
        
                            <div class="form-group">
                                <label >New password</label>
                                <input type="password" class="form-control" name="npassword" placeholder="Enter New password" maxlength="16" minlength="8" required>
                            </div>
                            <div class="form-group">
                                <label >Confirm password</label>
                                <input type="password" class="form-control" name="cpassword" placeholder="Enter Confirm password" maxlength="16" minlength="8" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn" name="changepassword">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/js.cookie.js"></script>
    <!-- <script src="assets/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="assets/js/vendor/jquery-ui.min.js"></script>
    <script src="assets/js/vendor/jquery.countdown.min.js"></script>
    <script src="assets/js/vendor/sal.js"></script>
    <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/vendor/isotope.pkgd.min.js"></script>
    <script src="assets/js/vendor/counterup.js"></script>
    <script src="assets/js/vendor/waypoints.min.js"></script>
    <script src="assets/jquery-3.7.1.js" type="text/javascript"></script> 
    <script src="assets/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function()
      {
        $("#change").validate();
      });
      </script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <style>
    .error {
    color:red !important;
    }
    </style>

</body>

</html>