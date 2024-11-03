<?php
session_start();
include 'Firstlogin.php';
include 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



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
        echo "<script>alert('Password Updated👍.')</script>";
        if(isset($_POST['changepassword']))
        {
          header("location:Sign-in.php");
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


$shipping=mysqli_query($connection,"SELECT * FROM tbl_shipping WHERE user_id='{$_SESSION['uid']}'");
 $shippingdata=mysqli_fetch_array($shipping);
 
 $sname=$_SESSION['uname'];
 if($_POST)
 {
    $sadd=$shippingdata['shipping_address'];
    $name=$_POST['name'];
    $add=$_POST['add'];
    if($name != $sname || $sadd != $sadd)
    {
       $us=mysqli_query($connection,"UPDATE tbl_shipping SET shipping_address={$add} AND shipping_name={$name}");
    }
 }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My Account</title>
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
    <?php include 'Header.php';?>
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
                                <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                            </ul>
                            <h1 class="title">Welcome in your side</h1>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start My Account Area  -->
        <div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">
                    <div class="axil-dashboard-author">
                        <div class="media">
                            <div class="thumbnail">
                                <img src="assets/images/product/author1.png" alt="Hello <?php echo $_SESSION['uname'] ?>" width="70">
                            </div>
                            <div class="media-body">
                                <h5 class="title mb-0">Hello <?php echo $_SESSION['uname']?></h5>
                                <span class="joining-date">Welcome in Greeenheaven </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <div class="nav nav-tabs" role="tablist">
                                        <?php if(isset($_GET['oid']))
                                        {?>
                                        <a class="nav-item nav-link " data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="false"><i class="fas fa-th-large"></i>Dashboard</a>
                                        <a class="nav-item nav-link show active" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="true"><i class="fas fa-shopping-basket"></i>Orders details</a>
                                        <?php } 
                                        else if(isset($_GET['mainorder']))
                                        {  
                                        ?>
                                        <a class="nav-item nav-link " data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="true"><i class="fas fa-th-large"></i>Dashboard</a>
                                        <a class="nav-item nav-link show active" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false"><i class="fas fa-shopping-basket"></i>Orders</a>
                                        <?php }
                                        else
                                        {?>
                                        <a class="nav-item nav-link show active" data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="true"><i class="fas fa-th-large"></i>Dashboard</a>
                                        <a class="nav-item nav-link " data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false"><i class="fas fa-shopping-basket"></i>Orders</a>
                                        <?php } ?>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-address" role="tab" aria-selected="false"><i class="fas fa-home"></i>Addresses</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="false"><i class="fas fa-user"></i>Account Details</a>
                                        <a class="nav-item nav-link" href="Sign-out.php"><i class="fal fa-sign-out"></i>Logout</a>
                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <?php if(isset($_GET['oid']))
                                {?>
                                <div class="tab-pane fade " id="nav-dashboard" role="tabpanel">
                                    <div class="axil-dashboard-overview">
                                        <div class="welcome-text">Hello <?php echo $_SESSION['uname']?> (not <span><?php echo $_SESSION['uname']?> ?</span> <a href="Sign-out.php">Log Out</a>)</div>
                                        <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="nav-orders" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    
                                                    <tr>
                                                        <th scope="col">Order Id</th>
                                                        <th scope="col">Product Quantity</th>
                                                        <th scope="col">product Price</th>
                                                    </tr>
                                                   
                                                </thead>
                                                <tbody>
                                                <?php
                                                        $oid=$_GET['oid'];
                                                        $orderq=mysqli_query($connection,"SELECT * FROM tbl_order_details WHERE order_id='{$oid}' ");
                                                        while($orderdata=mysqli_fetch_array($orderq))
                                                        {
                                                            
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?php echo "#".$orderdata['order_id']?></th>
                                                        <td><?php echo $orderdata['pro_qty']?></td>
                                                        <td><?php echo "₹".$orderdata['pro_price']?></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <form>
                                                        <td colspan="3"><a  href="My-account.php?mainorder=0"   class="axil-btn view-btn ">Main Order</a></td>  
                                                    </form>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php } else if(isset($_GET['mainorder']))
                                {?>
                                    <div class="tab-pane fade " id="nav-dashboard" role="tabpanel">
                                    <div class="axil-dashboard-overview">
                                        <div class="welcome-text">Hello <?php echo $_SESSION['uname']?> (not <span><?php echo $_SESSION['uname']?> ?</span> <a href="Sign-out.php">Log Out</a>)</div>
                                        <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show active " id="nav-orders" role="tabpanel">
                                        <div class="axil-dashboard-order">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        
                                                        <tr>
                                                            <th scope="col">Order</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Total</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                            $orderq=mysqli_query($connection,"SELECT * FROM tbl_ordermaster WHERE user_id='{$_SESSION['uid']}'");
                                                            while($orderdata=mysqli_fetch_array($orderq))
                                                            {
                                                                $orderdetails=mysqli_query($connection,"SELECT * FROM tbl_order_details WHERE order_id='{$orderdata['order_id']}'");
                                                                $count=mysqli_num_rows($orderdetails);
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?php echo "#".$orderdata['order_id']?></th>
                                                            <td><?php echo $orderdata['order_date']?></td>
                                                            <td><?php echo $orderdata['order_status']?></td>
                                                            <td><?php echo "₹".$orderdata['payment_ammount']." for ".$count?>  items</td>
                                                            <form>
                                                            
                                                            <td><a  href="My-account.php?oid=<?php echo $orderdata['order_id'];?>"  class="axil-btn view-btn ">View</a> <a  href="Order-details.php?oid=<?php echo $orderdata['order_id'];?>"   class="axil-btn view-btn ">Download</a> </td>
                                                            
                                                            </form>
                                                        </tr>
                                                        <?php } ?>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                
                                <?php } else
                                {?>
                                <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                                    <div class="axil-dashboard-overview">
                                        <div class="welcome-text">Hello <?php echo $_SESSION['uname']?> (not <span><?php echo $_SESSION['uname']?> ?</span> <a href="Sign-out.php">Log Out</a>)</div>
                                        <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade  " id="nav-orders" role="tabpanel">
                                        <div class="axil-dashboard-order">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        
                                                        <tr>
                                                            <th scope="col">Order</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Total</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                            $orderq=mysqli_query($connection,"SELECT * FROM tbl_ordermaster WHERE user_id='{$_SESSION['uid']}'");
                                                            while($orderdata=mysqli_fetch_array($orderq))
                                                            {
                                                                $orderdetails=mysqli_query($connection,"SELECT * FROM tbl_order_details WHERE order_id='{$orderdata['order_id']}'");
                                                                $count=mysqli_num_rows($orderdetails);
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?php echo "#".$orderdata['order_id']?></th>
                                                            <td><?php echo $orderdata['order_date']?></td>
                                                            <td><?php echo $orderdata['order_status']?></td>
                                                            <td><?php echo "₹".$orderdata['payment_ammount']." for ".$count?>  items</td>
                                                            <form>
                                                            
                                                            <td><a  href="My-account.php?oid=<?php echo $orderdata['order_id'];?>"  class="axil-btn view-btn ">View</a> <a  href="Order-details.php?oid=<?php echo $orderdata['order_id'];?>"   class="axil-btn view-btn ">Download</a> </td>
                                                            
                                                            </form>
                                                        </tr>
                                                        <?php } ?>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                <div class="tab-pane fade" id="nav-downloads" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <p>You don't have any download</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-address" role="tabpanel">
                                    <div class="axil-dashboard-address">
                                        <p class="notice-text">The following addresses will be used on the checkout page by default.</p>
                                        <div class="row row--30">
                                            <div class="col-lg-6">
                                                <div class="address-info mb--40">
                                                    <div class="addrss-header d-flex align-items-center justify-content-between">
                                                        <h4 class="title mb-0">Shipping Address</h4>
                                                        <a href="#" class="address-edit"><i class="far fa-edit"></i></a>
                                                    </div>
                                                    <ul class="address-details">
                                                        <li>Name: <?php echo $_SESSION['uname']?></li>
                                                        <li>Email: <?php echo $_SESSION['uemail']?></li>
                                                        <li>Phone: <?php echo $_SESSION['umobile']?> </li>
                                                        <li class="mt--30"><?php echo $_SESSION['user_address']?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-account" role="tabpanel">
                                    <div class="col-lg-9">
                                        <div class="axil-dashboard-account">
                                            <form class="account-details-form" method="post">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['uname'] ?>" >
                                                        </div>
                                                        </div>
                                                    <div class="col-12">
                                                        <div class="form-group mb--40">
                                                            <label>Address</label>
                                                            <textarea type="text" class="form-control" name="add" ><?php echo $_SESSION['user_address']?></textarea>
                                                            <p class="b3 mt--10">This will be how your name will be displayed in the account section and in reviews</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="title">Password Change</h5>
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" name="opassword" class="form-control" value="<?php echo $_SESSION['password']?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <input type="password" class="form-control" name="npassword">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirm New Password</label>
                                                            <input type="password" class="form-control" name="cpassword">
                                                        </div>
                                                        <div class="form-group mb--0">
                                                            <input type="submit" class="axil-btn" value="Save Changes" name="changepassword">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End My Account Area  -->

        <!-- Start Axil Newsletter Area  -->
        <div class="axil-newsletter-area axil-section-gap pt--0">
            <div class="container">
                <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                    <div class="newsletter-content">
                        <form action="Contact.php">
                        <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
                        <h2 class="title mb--40 mb_sm--30">Get in Touch</h2>
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input  type="text" value="<?php echo $_SESSION['uemail']?>">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Contact us</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End Axil Newsletter Area  -->
    </main>


   
    <!-- Start Footer Area  -->
    <?php include 'Footer.php';?>
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