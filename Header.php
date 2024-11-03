<?php 
include 'connection.php';
?>
<header class="header axil-header header-style-5">
       
        <!-- Start Mainmenu Area  -->
        <div id="axil-sticky-placeholder"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <a href="Home.php" class="logo logo-dark">
                            <img src="assets/images/logo/logo.png" alt="Site Logo">
                        </a>
                        <!-- <a href="index.html" class="logo logo-light">
                            <img src="assets/images/logo/logo-light.png" alt="Site Logo">
                        </a> -->
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                        <div class="inner">
                            <div class="mobile-nav-brand">
                            </div>
                                <div class="">
                                <ul class="mainmenu">
                                    <li>
                                        <a href="Home.php">Home</a>
                                    </li>
                                    <li >
                                        <a href="Product.php">Product</a>
                                    </li>
                                    
                                    
                                    <li class="menu-item-has-children">
                                        <a href="#">Category</a>
                                        <ul class="axil-submenu">
                                        <?php
                                            $catq=mysqli_query($connection,"SELECT * FROM tbl_category");
                                            while($catdata=mysqli_fetch_array($catq))
                                            {
                                                echo "<li><a href='Product.php?catid={$catdata['category_id']}'>{$catdata['category_name']}</a></li>";
                                            }
                                            ?>
                                            <!-- <li><a href="Privacy-policy.php">Privacy Policy</a></li> -->
                                            <!-- <li><a href="coming-soon.html">Coming Soon</a></li>
                                            <li><a href="404.html">404 Error</a></li>
                                            <li><a href="typography.html">Typography</a></li> -->
                                        </ul>
                                    </li>
                                    <li><a href="About-us.php">About</a></li>
                                    <li><a href="Contact.php">Contact</a></li>
                                </ul>
                                </div>
                            </div>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <form action='Product.php'>
                            <li  class="search-button d-xl-block d-none"> 
                                
                                <input type="search" name="search" class="header-search-icon" id="search2" maxlength="128" placeholder="What are you looking for?" autocomplete="on">
                                <button type="submit" name="sbtn" style="display:none">
                                </button> 
                               
                                
                            </li>  
                            </form>
                            <li class="axil-search d-xl-none d-block">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </a>
                            </li>
                           
                            <li class="wishlist">
                                <a href="Wishlist.php" class="heart">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </li>
                            <?php
                            $q=mysqli_query($connection,"SELECT * FROM tbl_cart");
                            $count=0;
                            $count=mysqli_num_rows($q);
                            ?>
                            <li class="">
                                <a href="Cart.php" class="heart">
                                    <!-- <span class="cart-count"><?php echo $count ?></span> -->
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>
                            <li class="my-account">
                                <a href="javascript:void(0)" class="myaccount">
                                    <i class="flaticon-person"></i>
                                </a>
                                <div class="my-account-dropdown">
                                    
                                   
                                    <?php
                                    if (isset($_SESSION['uid']))
                                    {
                                        ?>
                                       <span class="title">Hii <?php echo $_SESSION['uname'] ?></span>

                                        <ul>
                                        <li><a href="My-account.php" class="account">My Account</a></li>
                                        <li><a href="Change-password.php" class="account">Change Password</a></li>
                                        <li><a href="Wishlist.php" class="account">Wishlist</a></li>
                                        <li><a href="Cart.php" class="account">Cart</a></li>                                 
                                        
                                    </ul>
                                    <a href="Sign-out.php" class="axil-btn btn-bg-primary">Logout</a>
                                    </div>
                                        <?php
                                    }else
                                    {
                                    ?>
                                   <span class="title">WELCOME IN GREENHEAVEN</span>

                                    <a href="Sign-in.php" class="axil-btn btn-bg-primary">Login</a>
                                    <div class="reg-footer text-center">No account yet? <a href="Sign-up.php" class="btn-link">REGISTER HERE.</a></div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                            </li>
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
        
    </header>