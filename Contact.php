<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include './connection.php';
    include './Firstlogin.php';

    if(isset($_POST['sendmsgbtn']))
    {   
        
        $userid = $_SESSION['uid'];
        $username = $_SESSION['uname'];
        $useremail= $_SESSION['uemail'];
        $usermsg = $_POST['umsg'];

        $usermsgq=mysqli_query($connection,"INSERT INTO `tbl_contact`( `user_id`, `user_name`,`user_email`, `user_msg`) VALUES ('{$userid}','{$username}','{$useremail}','{$usermsg}')");
        
        if($usermsgq)
        {
    
            echo "<script>alert('Your Messgae Send Successfully');</script>";
            header("location:Home.php");
        }

        if($usermsgq)
        {
         
          $q=mysqli_query($connection,"SELECT * FROM tbl_user WHERE user_email='{$useremail}'");
          $count=mysqli_num_rows($q);
          if($count==1)
          {
                   $msg=$usermsg;
                  
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
                   
                   $mail->setFrom($useremail, $username);
                   $mail->addAddress('greenheven2041@gmail.com', "Seller");     
                   
    
                   //Content
                   $mail->isHTML(true);                                  //Set email format to HTML
                   $mail->Subject = 'From User';
                   $mail->Body = $msg;
                   $mail->AltBody = $msg;
    
                   $mail->send();
                   echo "<script>alert('Your Password has been changed 😊.');</script>";
                   
               } catch (Exception $e) {
                  echo "<br>";
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
               }
           }
           else
           {
               echo "<script>alert('failed')</script>";
           }
        }
    } 

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact With Us</title>
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


<body class="sticky-header">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    <?php include './Header.php';?>
    <!-- End Header -->
 
    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Contact</li>
                            </ul>
                            <h1 class="title">Contact With Us</h1>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start Contact Area  -->
        <div class="axil-contact-page-area axil-section-gap">
            <div class="container">
                <div class="axil-contact-page">
                    <div class="row row--30">
                        <div class="col-lg-8">
                            <div class="contact-form">
                                <h3 class="title mb--10">We would love to hear from you.</h3>
                                <p>If you’ve got great products your making or looking to work with us then drop us a line.</p>
                                <form id="contact-form" method="post">
                                    <div class="row row--10">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-name">Name <span></span></label>
                                                <input type="text" name="contact-name" id="contact-name" value="<?php echo $_SESSION['uname']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-name">Email <span>*</span></label>
                                                <input type="text" name="contact-email" id="contact-email" value="<?php echo $_SESSION['uemail']?>"readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-message">Your Message</label>
                                                <textarea id="contact-message" name="umsg" cols="1" rows="2" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb--0">
                                                <button class="axil-btn btn-bg-primary" type="submit" name="sendmsgbtn">Send Message</button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="contact-location mb--40">
                                <h4 class="title mb--20">Our Store</h4>
                                <span class="address mb--20"> City Gold Ln, opposite I.O.C Petrol Pump, Swinagar Society, Shivranjani, Nehru Nagar, Satellite, Ahmedabad, Gujarat 380015</span>
                                <span class="phone">Phone: +123 456 7890</span>
                                <span class="email">Email: greenheven2041@gmail.com</span>
                            </div>
                                <div class="opening-hour">
                                <h4 class="title mb--20">Opening Hours:</h4>
                                <p>Monday to Saturday: 9:00am - 9:30pm
                                    <br> Sundays: Opens 24hours
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Google Map Area  -->
                <!-- <div class="axil-google-map-wrap axil-section-gap pb--0">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=melbourne&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe>
                        </div>
                    </div>
                </div> -->
                <!-- End Google Map Area  -->
            </div>
        </div>
        <!-- End Contact Area  -->
    </main>


    <!-- Start Footer Area  -->
    <?php include './Footer.php';?>
    <!-- End Footer Area  -->

    
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

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>