<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include 'Firstlogin.php';
include 'connection.php';
// $ui=$_SESSION['uid'];
// $cartq=mysqli_query($connection,"SELECT * from tbl_cart WHERE user_id='{$uid}'");
// $count=mysqli_num_rows($cartq);
// $cd=mysqli_fetch_array($cartq);
// if($count<0)
// {
//     echo "<script>alert('cart is empty');window.location.assign('Home.php')</script>";
// }


if($_POST)
{
    $shipname=$_POST['name'];
    $add1=$_POST['add1'];
    $uid=$_SESSION['uid'];
    $total_price=0;
   
    $shipmobile=$_POST['mobile'];
    $payment_mode=$_POST['payment'];
    $date= date('d-m-Y');
    $status="Confirm";
    //shipping
    $shipq=mysqli_query($connection,"insert into tbl_shipping(shipping_name,shipping_address,shipping_mobile,user_id)
    values('{$shipname}','{$add1}','{$shipmobile}','{$uid}')");
    if($add1 != $_SESSION['user_address'])
    {
        mysqli_query($connection,"UPDATE tbl_user set user_address='{$add1}' where user_id='{$uid}'");
        $_SESSION['user_address']=$add1;
    }
    //Inserted orderid order_id
    $orderid=mysqli_insert_id($connection);
    //
    $ordermasterq=mysqli_query($connection,"insert into tbl_ordermaster(order_id,user_id,order_date,order_status,payment_mode) 
    values('{$orderid}','{$uid}','{$date}','{$status}','{$payment_mode}')");
    
    
    //Fetch cart data for order deatils
    $cartq=mysqli_query($connection,"select * from tbl_cart where user_id='{$uid}'");
    while($cartdata=mysqli_fetch_array($cartq))
    {
        $pro_id=$cartdata['product_id'];
        $pro_price=$cartdata['product_price'];
        $pro_qty=$cartdata['product_qty'];
        $total_price += $pro_price;
        //Add into tbl_order_details
        $orderdetais=mysqli_query($connection,"insert into tbl_order_details (order_id,pro_id,pro_price,pro_qty) 
        values('{$orderid}','{$pro_id}','{$pro_price}','{$pro_qty}')");
        
        //Remove data from cart which has to be check out
        mysqli_query($connection,"delete from tbl_cart where cart_id='{$cartdata['cart_id']}'");

    }
    $upordermaster=mysqli_query($connection,"UPDATE tbl_ordermaster SET payment_ammount='{$total_price}' WHERE order_id='{$orderid}'");
    header("location:Thanks.php");

    //Mail to user after placing order
    
    if($upordermaster)
    {
      $femail=$_SESSION['uemail'];
      $q=mysqli_query($connection,"SELECT * FROM tbl_user WHERE user_email='{$femail}'");
      $count=mysqli_num_rows($q);
      if($count==1)
      {
               
               $od=mysqli_query($connection,"SELECT * FROM tbl_order_details where order_id='{$orderid}'");
               $dcount=mysqli_num_rows($od);
               $msg="Hello {$_SESSION['uname']}, your order have total {$dcount} item.<br> The Details is followed:
                            <thead>
                                <tr>
                                <th>    Product     </th>
                                <th></th>
                                <th>    Quantity    </th>
                                <th></th>
                                <th>   Unite Price  </th>
                                </tr>
                            </thead>";
               while($oddata=mysqli_fetch_array($od))
               {
                
                $pd=mysqli_query($connection,"SELECT * FROM tbl_product WHERE pro_id='{$oddata['pro_id']}'");
                $pddata=mysqli_fetch_array($pd);
                $mg="<tbody>
                                <tr>
                                    <td> {$pddata['pro_name']} </td>
                                    <td></td>
                                    <td> {$oddata['pro_qty']} </td>
                                    <td></td>
                                    <td> {$oddata['pro_price']} </td>
                                </tr>     
                            ";
                $msg .= $mg;
                }
                $msg .= "
                <td></td>
                <td></td>
                <td>Total Price:</td>
                <td></td>
                <td>{$total_price}</td>
                </tbody><br><br><b>Thank you for choosing us for your plant purchase!<b><br><a href='http://localhost:3000/Home.php'>Greenheaven</a> stands ready to serve you at all times.!<br>";
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
               $mail->Subject = 'Placing Order';
               echo "
               <html>
               <head>
               <link rel='stylesheet' href='assets/css/style.min.css'>
               </head>
               
               <div class='tab-pane fade' id='nav-orders' role='tabpanel'>
               <div class='axil-dashboard-order'>
                   <div class='table-responsive'>
                       <table class='table' border='1'>";
               $mail->Body = $msg;
                echo " </table>
                        </div>
                    </div>
                </div>
                </html>";
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
    <title>Checkout</title>
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
    <?php include 'Header.php';
     ?>
    <!-- End Header -->

    <main class="main-wrapper">

        <!-- Start Checkout Area  -->
        <div class="axil-checkout-area axil-section-gap">
            <div class="container">
                <form method="post" >
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="axil-checkout-billing">
                                <h4 class="title mb--40">Shipping details</h4>
                               
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Name <span>*</span></label>
                                            <input type="text" id="first-name" name="name"placeholder="Enter your name" value="<?php echo $_SESSION['uname']?>"  required>
                                        </div>
                                    </div>
                                    
                                </div>
                               
                                <div class="form-group">
                                    <label>Area <span>*</span></label>
                                   <textarea name="add1"><?php echo $_SESSION['user_address']?></textarea>

                                </div>
                               
                                <div class="form-group">
                                    <label>Town/ City <span>*</span></label>
                                    <input type="text" id="town" name="add4" value="Ahmedabad" readonly required>
                                </div>
                                
                                <div class="form-group">
                                    <label>Phone <span>*</span></label>
                                    <input type="tel" id="phone" name="mobile" placeholder="Enter your number" value="<?php echo $_SESSION['umobile']?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Email Address <span>*</span></label>
                                    <input type="email" id="email" placeholder="Enter your email" value="<?php echo $_SESSION['uemail']?>" required>
                                </div>
                               
                                
                                <div class="form-group">
                                    <label>Other Notes (optional)</label>
                                    <textarea id="notes" rows="2" placeholder="Notes about your order, e.g. speacial notes for delivery."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="axil-order-summery order-checkout-summery">
                                <h5 class="title mb--20">Your Order</h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                $uid=$_SESSION['uid'];
                                                $cartq = mysqli_query($connection,"select * from tbl_cart where user_id='{$uid}'");
                                                $grandtotal=0;
                                                
                                                while($cartdata=mysqli_fetch_array($cartq))
                                                {
                                                    $pq=mysqli_query($connection,"SELECT * FROM tbl_product WHERE pro_id='{$cartdata['product_id']}'");
                                                    $pdata=mysqli_fetch_array($pq);
                                                    $subtotal=$cartdata['product_price'];

                                                    $grandtotal += $subtotal;


                                        ?>
                                            <tr class="order-product">
                                                <td><?php echo $pdata['pro_name']?><span class="quantity"> x <?php echo $cartdata['product_qty']?></span></td>
                                                <td><?php echo $cartdata['product_price']?></td>
                                            </tr>
                                            <?php
                                             
                                            }?>
                                            
                                            
                                            
                                            <tr class="order-total">
                                                <td>Total</td>
                                                <td class="order-total-amount"><?php echo $grandtotal ?></td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                               
                                <div class="order-payment-method">
                                    
                                    <div class="single-payment">
                                        <div class="input-group">
                                            <input type="radio" id="radio5" name="payment" value="COD">
                                            <label for="radio5">Cash on delivery</label>
                                        </div>
                                        <p>Pay with cash upon delivery.</p>
                                    </div>
                                    <div class="single-payment">
                                        <div class="input-group justify-content-between align-items-center">
                                                <input type="radio" id="radio6" name="payment" value="Online" onclick="myfunction()" >
                                                <label for="radio6">Online Payment</label>
                                            <img src="assets/images/others/payment.png" id="image" alt="Paypal payment" width="150" style="display:none" >
                                        </div>
                                        <p>Pay via Any QRcode; you can pay with your paytm or google pay if you don’t have a Phisical ammount.</p>
                                    </div>
                                </div>
                                <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Checkout Area  -->

    </main>
    <script>
      function myfunction() {
        var radio=document.getElementById("radio6");
        var image=document.getElementById("image");
        if(radio.checked==true){
          image.style.display="block";
        }
        else
        {
            image.style.display="none";
        }
        
        }
    </script>


    
    <!-- Start Footer Area  -->
   <?php include 'Footer.php'; ?>
    <!-- End Footer Area  -->

    <!-- Product Quick View Modal Start -->
    <div class="modal fade quick-view-product" id="quick-view-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="single-product-thumb">
                        <div class="row">
                            <div class="col-lg-7 mb--40">
                                <div class="row">
                                    <div class="col-lg-10 order-lg-2">
                                        <div class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                                            <div class="thumbnail">
                                                <img src="assets/images/product/product-big-01.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="assets/images/product/product-big-01.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="assets/images/product/product-big-02.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="assets/images/product/product-big-02.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="assets/images/product/product-big-03.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="assets/images/product/product-big-03.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 order-lg-1">
                                        <div class="product-small-thumb small-thumb-wrapper">
                                            <div class="small-thumb-img">
                                                <img src="assets/images/product/product-thumb/thumb-08.png" alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="assets/images/product/product-thumb/thumb-07.png" alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="assets/images/product/product-thumb/thumb-09.png" alt="thumb image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 mb--40">
                                <div class="single-product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <img src="assets/images/icons/rate.png" alt="Rate Images">
                                            </div>
                                            <div class="review-link">
                                                <a href="#">(<span>1</span> customer reviews)</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">Serif Coffee Table</h3>
                                        <span class="price-amount">$155.00 - $255.00</span>
                                        <ul class="product-meta">
                                            <li><i class="fal fa-check"></i>In stock</li>
                                            <li><i class="fal fa-check"></i>Free delivery available</li>
                                            <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>
                                        </ul>
                                        <p class="description">In ornare lorem ut est dapibus, ut tincidunt nisi pretium. Integer ante est, elementum eget magna. Pellentesque sagittis dictum libero, eu dignissim tellus.</p>

                                        <div class="product-variations-wrapper">

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">Colors:</h6>
                                                <div class="color-variant-wrapper">
                                                    <ul class="color-variant mt--0">
                                                        <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-02"><span><span class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-03"><span><span class="color"></span></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Product Variation  -->

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">Size:</h6>
                                                <ul class="range-variant">
                                                    <li>xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <!-- End Product Variation  -->

                                        </div>

                                        <!-- Start Product Action Wrapper  -->
                                        <div class="product-action-wrapper d-flex-center">
                                            <!-- Start Quentity Action  -->
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                            <!-- End Quentity Action  -->

                                            <!-- Start Product Action  -->
                                            <ul class="product-action d-flex-center mb--0">
                                                <li class="add-to-cart"><a href="cart.html" class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                            <!-- End Product Action  -->

                                        </div>
                                        <!-- End Product Action Wrapper  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Quick View Modal End -->

    <!-- Header Search Modal End -->
    <div class="header-search-modal" id="header-search-modal">
        <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
        <div class="header-search-wrap">
            <div class="card-header">
                <form action="#">
                    <div class="input-group">
                        <input type="search" class="form-control" name="prod-search" id="prod-search" placeholder="Write Something....">
                        <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="search-result-header">
                    <h6 class="title">24 Result Found</h6>
                    <a href="shop.html" class="view-all">View All</a>
                </div>
                <div class="psearch-results">
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img src="assets/images/product/electric/product-09.png" alt="Yantiti Leather Bags">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="rating-icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fal fa-star"></i>
                            </span>
                                <span class="rating-number"><span>100+</span> Reviews</span>
                            </div>
                            <h6 class="product-title"><a href="single-product.html">Media Remote</a></h6>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-cart">
                                <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img src="assets/images/product/electric/product-09.png" alt="Yantiti Leather Bags">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="rating-icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fal fa-star"></i>
                            </span>
                                <span class="rating-number"><span>100+</span> Reviews</span>
                            </div>
                            <h6 class="product-title"><a href="single-product.html">Media Remote</a></h6>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-cart">
                                <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Search Modal End -->



    

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