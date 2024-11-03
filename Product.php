<?php
session_start();
include './connection.php';

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Product</title>
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
                                <li class="axil-breadcrumb-item"><a href="Home.php">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Shop Now</li>
                            </ul>
                            <h1 class="title">Explore All Products</h1>
                            
                        </div>
                </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="axil-shop-sidebar" id="sticky-sidebar">
                            <div class="d-lg-none">
                                <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                            </div>
                            <form method="post">
                            <div class="toggle-list product-categories active">
                                    <h6 class="title">CATEGORIES</h6>
                                    <div class="axil-footer-widget">
                                        <div class="shop-submenu">
                                            <div class="inner">
                                                <ul>
                                                    <?php
                                                    $catq=mysqli_query($connection,"SELECT * FROM tbl_category");
                                                    while($cdata=mysqli_fetch_array($catq))
                                                    {
                                                        echo "<li><a href='Product.php?catid={$cdata['category_id']}'>{$cdata['category_name']}</a></li>";
                                                    }
                                                    ?>
                                                
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <button type="submit" class="axil-btn btn-bg-primary" name="reset">All Reset</button>
                            </form>
                            
                        </div>
                        <!-- End .axil-shop-sidebar -->
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="axil-shop-top mb--40">
                                    <?php
                                    if(isset($_GET['catid']))
                                    {
                                        if(isset($_POST['reset']))
                                        {
                                            $q=mysqli_query($connection,"SELECT * FROM tbl_product");
                                            $count=mysqli_num_rows($q);
                                            echo "<div class='category-select align-items-center justify-content-lg-end justify-content-between'>";
                                            echo  "<span class='filter-results'>Total $count products</span>";
                                            echo "</div>";
                                        }
                                        else
                                        {
                                            $catid=$_GET['catid'];
                                            $q=mysqli_query($connection,"SELECT * FROM tbl_product WHERE category_id='{$catid}'");
                                            $count=mysqli_num_rows($q);
                                            echo "<div class='category-select align-items-center justify-content-lg-end justify-content-between'>";
                                            echo  "<span class='filter-results'>$count Product found</span>";
                                            echo "</div>";
                                        }
                                    }
                                    else if(isset($_GET['sbtn'])){
                                        if(isset($_POST['reset']))
                                        {
                                            $q=mysqli_query($connection,"SELECT * FROM tbl_product");
                                            $count=mysqli_num_rows($q);
                                            echo "<div class='category-select align-items-center justify-content-lg-end justify-content-between'>";
                                            echo  "<span class='filter-results'>Total $count products</span>";
                                            echo "</div>";
                                        }
                                        else
                                        {
                                            $search = $_GET['search'];
                                            $q = mysqli_query($connection,"select * from tbl_product where pro_name like '%$search%' ");
                                            $count=mysqli_num_rows($q);
                                            echo "<div class='category-select align-items-center justify-content-lg-end justify-content-between'>";
                                            echo  "<span class='filter-results'> $count Product found</span>";
                                            echo "</div>";
                                        }
                                        

                                    }
                                    else
                                    {
                                        $q = mysqli_query($connection,"select * from tbl_product");
                                        $count=mysqli_num_rows($q);
                                        echo "<div class='category-select align-items-center justify-content-lg-end justify-content-between'>";
                                        echo  "<span class='filter-results'>Total $count Product found</span>";
                                        echo "</div>";
                                        
                                    }
                                   
                                    
                                    ?>
                                    <div class="d-lg-none">
                                        <button class="product-filter-mobile filter-toggle"><i class="fas fa-filter"></i> FILTER</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <!-- End .row -->
                        <form method="post">
                        <div class="row row--15">
                            <?php

                            while($data=mysqli_fetch_array($q))
                            {
                            
                            ?>
                            <div class="col-xl-4 col-sm-6">
                                <div class="axil-product product-style-one mb--30">
                                    <div class="thumbnail">
                                        <a href="Single-product.php?pid=<?php echo $data['pro_id']?>">
                                            <?php 
                                            echo "<img width='100px' height='300' src='Admin Panel/doc/uploads/{$data['pro_photo_path']}' alt='Product Images'>" ?>
                                        </a>
                                        <div class="label-block label-right">
                                
                                            <!-- <div class="product-badget">10% OFF</div> -->
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="wishlist"><a href="Wishlistprocess.php?proid=<?php echo $data['pro_id']?>"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="Cartprocess.php?proid=<?php echo $data['pro_id']?>" name="cart">Add to Cart</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="Single-product.php?pid=<?php echo $data['pro_id'] ?>"><?php echo $data['pro_name']?></a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price"><?php echo '₹'.$data['pro_price']?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?> 
                            <!-- End Single Product  -->
                        </div>
                            </form>
                        <div class="text-center pt--20">
                            <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End Shop Area  -->

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
                                <?php 
                                if(!isset($_SESSION['uemail']) )
                                {?>
                                <input type="text" placeholder="example@gmail.com">
                                <?php }
                                else
                                { ?>
                                <input type="text" value="<?php echo $_SESSION['uemail']?>">
                                <?php }
                                ?>
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
                        <?php
                        $proid=$_GET['proid'];
                        $view=mysqli_query($connection,"SELECT * FROM tbl_product where pro_id='{$proid}'");
                        $viewdata=mysqli_fetch_array($view);
                        ?>
                        <div class="row">
                            <div class="col-lg-7 mb--40">
                                <div class="row">
                                    <div class="col-lg-10 order-lg-2">
                                        <div class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                                        
                                            <div class="thumbnail">
                                            <?php
                                            echo "<img width='100px' height='300' src='Admin Panel/doc/uploads/{$viewdata['pro_photo_path']}' alt='Product Images'>" 
                                            ?>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 order-lg-1">
                                        <div class="product-small-thumb small-thumb-wrapper">
                                            <div class="small-thumb-img">
                                                <img width="px" src="Admin Panel/doc/uploads/<?php echo $viewdata['pro_photo_path'] ;?>" alt="thumb image">
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
                                       
                                        <h3 class="product-title"></h3>
                                        <span class="price-amount">$155.00 - $255.00</span>
                                        <ul class="product-meta">
                                            <li><i class="fal fa-check"></i>In stock</li>
                                            <li><i class="fal fa-check"></i>Free delivery available</li>
                                        </ul>
                                        <p class="description">In ornare lorem ut est dapibus, ut tincidunt nisi pretium. Integer ante est, elementum eget magna. Pellentesque sagittis dictum libero, eu dignissim tellus.</p>

                                       

                                        <!-- Start Product Action Wrapper  -->
                                        <div class="product-action-wrapper d-flex-center">
                                            <!-- Start Quentity Action  -->
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                            <!-- End Quentity Action  -->

                                            <!-- Start Product Action  -->
                                            <ul class="product-action d-flex-center mb--0">
                                                <li class="add-to-cart"><a href="cart.html" class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                                <li class="wishlist"><a href="Wishlist.php" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
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