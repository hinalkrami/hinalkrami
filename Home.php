<?php
session_start();
include 'connection.php';
$pq=mysqli_query($connection,"SELECT * FROM tbl_product  limit 8");
$proq=mysqli_query($connection,"SELECT * FROM tbl_product order by pro_name");
$wq = mysqli_query($connection,"select * from tbl_wishlist limit 8");
$sq = mysqli_query($connection,"select * from tbl_subcategory limit 14");
$oq = mysqli_query($connection,"select * from tbl_order_details limit 8");
$fq = mysqli_query($connection,"select * from tbl_feedback");

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
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


<body class="sticky-header newsletter-popup-modal">

    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <?php include './Header.php';?>

    <main class="main-wrapper">
        <div class="axil-main-slider-area main-slider-style-1">
            <div class="container">
                <div class="row align-items-center space">
                    <div class="col-lg-5 col-sm-6">
                        <div class="main-slider-content">
                        <div class="slider-content-activation-one">
                                <?php
                                $q=mysqli_query($connection,"SELECT * FROM tbl_producthomepage");
                                while($data=mysqli_fetch_array($q))
                                {
                                ?>
                                <div class="single-slide slick-slide" data-sal="slide-up" data-sal-delay="400" data-sal-duration="800">
                                    <span class="subtitle"><i class="fas fa-fire"></i> Hot Deal In This Week</span>
                                    <h1 class="title"><?php echo $data['ph_name']?></h1>
                                    <div class="slide-action">
                                        <div class="shop-btn">
                                            <a href="Product.php" class="axil-btn btn-bg-white"><i class="fal fa-shopping-cart"></i>Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-6">
                        <div class="main-slider-large-thumb">
                            <div class="slider-thumb-activation-one axil-slick-dots">
                                <?php 
                                $q=mysqli_query($connection,"SELECT * FROM tbl_producthomepage");
                                while($data=mysqli_fetch_array($q))
                                {
                                ?>
                                <div class="single-slide slick-slide" data-sal="slide-up" data-sal-delay="600" data-sal-duration="1500">
                                    <img src="assets/images/product/<?php echo $data['ph_photo_path']?>" alt="Product">
                                    <div class="product-price" style="background-color:white;">
                                        <span class="text">From</span>
                                        <span class="price-amount"><?php echo "₹".$data['ph_price']?></span>
                                    </div>
                                </div>
                                <?php } ?>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <ul class="shape-group">
                <li class="shape-1"><img src="assets/images/others/shape-1.png" alt="Shape"></li>
                <li class="shape-2"><img src="assets/images/others/shape-2.png" alt="Shape"></li>
            </ul> -->
        </div>

        <!-- Start Categorie Area  -->
        <div class="axil-categorie-area bg-color-white axil-section-gapcommon">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-secondary"> <i class="far fa-tags"></i> SubCategory</span>
                    <h2 class="title">Browse by SubCategory</h2>
                </div>
                <div class="categrie-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide" style="margin-bottom:0px;">
                <?php
                    while($subcdata = mysqli_fetch_array($sq))
                     {
                            $subcid = $subcdata['subc_id'];
                            $pcq = mysqli_query($connection,"select * from tbl_product where subcategory_id='{$subcid}'");
                            $productdata = mysqli_fetch_array($pcq);
                     ?>
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500">
                            <a href="Single-product.php?pid=<?php echo "{$productdata['pro_id']}" ?>">
                                <?php
                            echo "<img class='img-fluid' src='Admin Panel/doc/uploads/{$productdata['pro_photo_path']}' alt='Product Images'>" ?>
                                <h6 class="cat-title"><?php echo "{$subcdata['subc_name']}"?></h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <?php
                     }
                  ?>
                </div>
                
            </div>
        </div>
        <!-- End Categorie Area  -->

        <!-- Poster Countdown Area  -->
        
        <!-- End Poster Countdown Area  -->

        <!-- Start Expolre Product Area  -->
       
        <div class="axil-product-area bg-color-white axil-section-gap">
            <div class="container space">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Our Products</span>
                    <h2 class="title">Explore our Products</h2>
                </div>
                <div class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="row row--15">    
                        <?php
                         while($data=mysqli_fetch_array($pq))
                        {
                        ?>            
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                    <a href="Single-product.php?pid=<?php echo $data['pro_id']?>">
                                            <?php 
                                            echo "<img width='100px' height='300' src='Admin Panel/doc/uploads/{$data['pro_photo_path']}' alt='Product Images'>" ?>
                                        </a>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="select-option"><a href="Single-product.php?pid=<?php echo $data['pro_id']?>">Select Option</a></li>
                                                <li class="wishlist"><a href="Wishlistprocess.php?proid=<?php echo $data['pro_id']?>"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content"> 
                                        <div class="inner">
                                            <h5 class="title"><a href="Single-product.php"><?php echo $data['pro_name']?></a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">₹ <?php echo $data['pro_price']?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <!-- End Single Product  -->
                        <?php } ?>

                        </div>
                    </div>
                    
                    <!-- End .slick-single-layout -->
                   
                    <!-- End .slick-single-layout -->
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mt--20 mt_sm--0">
                        <a href="Product.php" class="axil-btn btn-bg-lighter btn-load-more">View All Products</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- End Expolre Product Area  -->

        <!-- Start Testimonila Area  -->
        <div class="axil-testimoial-area axil-section-gap bg-vista-white">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-secondary"> <i class="fal fa-quote-left"></i>Testimonials</span>
                    <h2 class="title">Users Feedback</h2>
                </div>
                <!-- End .section-title -->
                <div class="testimonial-slick-activation testimonial-style-one-wrapper slick-layout-wrapper--20 axil-slick-arrow arrow-top-slide">
                            <?php
                            
                            while($feedbackdata=mysqli_fetch_array($fq))
                            {
                             ?>
                             <div class="slick-single-layout testimonial-style-one">
                            <div class="review-speech">
                                <?php  echo "{$feedbackdata['feedback_details']}"; ?>

                                </div>
                                <div class="media">
                                    <div class="thumbnail">
                                    </div>
                                    <div class="media-body">
                                        <span class="designation">Head of Idea</span>
                                        <h6 class="title"><?php echo "{$feedbackdata['user_name']}" ?></h6>
                                    </div>
                                </div>
                                <!-- End .thumbnail -->
                          </div>
                             <?php
                            }
                    ?>
    
                </div>
            </div>
        </div>
        <!-- End Testimonila Area  -->
        <div class="axil-new-arrivals-product-area bg-color-white axil-section-gap pb--0">
            <div class="container">
                <div class="product-area pb--50">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>This Week’s</span>
                        <h2 class="title">Most Liked Product</h2>
                    </div>
                    <div class="new-arrivals-product-activation slick-layout-wrapper--30 axil-slick-arrow  arrow-top-slide">
                        <?php

                        while($pdata = mysqli_fetch_array($proq))
                        {
                        ?>
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-two">
                                <div class="thumbnail">
                                    <a href="Single-product.php?pid=<?php echo $pdata['pro_id']?>">
                                        <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500"  src="<?php echo "Admin Panel/doc/uploads/{$pdata['pro_photo_path']}" ?>" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.php"><?php echo "{$pdata['pro_name']}" ?></a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">₹ <?php echo "{$pdata['pro_price']}" ?> </span>
                                            
                                        </div>
                                        
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="select-option"><a href="Cartprocess.php?proid=<?php echo $pdata['pro_id']?>"> Add to Cart</a></li>
                                                <li class="wishlist"><a href="Wishlistprocess.php?proid=<?php echo $pdata['pro_id']?>"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Start New Arrivals Product Area  -->
        <!-- End New Arrivals Product Area  -->

        <!-- Start Most Sold Product Area  -->
        <!-- <div class="axil-most-sold-product axil-section-gap">
            <div class="container">
                <div class="product-area pb--50">
                    <div class="section-title-wrapper section-title-center">
                        <span class="title-highlighter highlighter-primary"><i class="fas fa-star"></i> Most Sold</span>
                        <h2 class="title">Most Sold in Greenheaven</h2>
                    </div>
                    <div class="row row-cols-xl-2 row-cols-1 row--15">
                        <?php
                        while($orderdata = mysqli_fetch_array($oq))
                        {
                            if($orderdata['pro_id']==$productdata['pro_id'])
                            {
                                continue;
                            }
                            $productid = $orderdata['pro_id'];
                            $productq = mysqli_query($connection,"select * from tbl_product where pro_id='{$productid}'");
                            $productdata = mysqli_fetch_array($productq);
                        ?>
                        <div class="col">
                            <div class="axil-product-list">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="zoom-in" data-sal-delay="100" data-sal-duration="1500" src="<?php echo "Admin Panel/doc/uploads/{$productdata['pro_photo_path']}" ?>" width="80px" alt="Yantiti Leather Bags">
                                    </a>
                                </div>
                                <div class="product-content">
                                    
                                    <h6 class="product-title"><a href="single-product.html"><?php echo "{$productdata['pro_name']}"; ?></a></h6>
                                    <div class="product-price-variant">
                                    <span class="price current-price">₹ <?php echo $orderdata['pro_price'] ?> </span>

                                    </div>
                                    <div class="product-cart">
                                        <a href="Cartprocess.php?proid=<?php echo $productdata['pro_id']?>" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                        <a href="Wishlistprocess.php?proid=<?php echo $productdata['pro_id']?>" class="cart-btn"><i class="fal fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- End Most Sold Product Area  -->

        <!-- Start Why Choose Area  -->
        <div class="axil-why-choose-area pb--50 pb_sm--30">
            <div class="container">
                <div class="section-title-wrapper section-title-center">
                    <span class="title-highlighter highlighter-secondary"><i class="fal fa-thumbs-up"></i>Why Us</span>
                    <h2 class="title">Why People Choose Us</h2>
                </div>
                <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 row--20">
                <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="assets/images/icons/service6.png" alt="Service">
                            </div>
                            <h6 class="title">Fast , Secure and trustable Delievery</h6>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="assets/images/icons/service7.png" alt="Service">
                            </div>
                            <h6 class="title">100% Guarantee On Product</h6>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="assets/images/icons/service5.png" alt="Service">
                            </div>
                            <h6 class="title">Providing with Proper Packaging</h6>
                        </div>
                    </div>
                   
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="assets/images/icons/service9.png" alt="Service">
                            </div>
                            <h6 class="title">Providing Next Level Pro Quality</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Why Choose Area  -->

        <div class="axil-newsletter-area axil-section-gap pt--0">
            <div class="container">
                <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                    <div class="newsletter-content">
                        <form action="Contact.php">
                        <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
                        <h2 class="title mb--40 mb_sm--30">Get in Touch</h2>
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <?php if(!isset($_SESSION['uemail']))
                                { ?>
                                <input type="text" placeholder="example@gmail.com">
                                <?php }else
                                { ?>
                                <input  type="text" value="<?php echo $_SESSION['uemail']?>">
                                <?php } ?>
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
    <?php include 'Footer.php'; ?>
    <!-- End Footer Area  -->

    <!-- Product Quick View Modal Start -->
   
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
                                <a href="Wishlist.php" class="cart-btn"><i class="fal fa-heart"></i></a>
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
                                <a href="Wishlist.php" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Search Modal End -->


   

    <!-- Offer Modal Start -->
    <div class="offer-popup-modal" id="offer-popup-modal">
        <div class="offer-popup-wrap">
            <div class="card-body">
                <button class="popup-close"><i class="fas fa-times"></i></button>
                <div class="content">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Don’t Miss!!</span>
                        <h3 class="title">Best Sales Offer<br> Grab Yours</h3>
                    </div>
                    <div class="poster-countdown countdown"></div>
                    <a href="shop.html" class="axil-btn btn-bg-primary">Shop Now <i class="fal fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="closeMask"></div>
    <!-- Offer Modal End -->
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