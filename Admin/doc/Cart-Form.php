<?php
session_start();
include 'Firstlogin.php';
  include './connection.php';
  if($_POST)
  {
    $product_id=$_POST['txt1'];
    $user_id=$_POST['txt2'];
    $product_qty=$_POST['txt3'];
    $product_price=$_POST['txt4'];
   
    $q=mysqli_query($connection,"INSERT INTO `tbl_cart`(`product_id`,`user_id`, `product_qty`, `product_price`) VALUES ('{$product_id}','{$user_id}','{$product_qty}','{$product_price}')");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 5 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <title>Cart</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/"></script>
    <!-- Main CSS-->
    <script src="js/jquery-3.7.1.js" type="text/javascript"></script> -->
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function()
      {
        $("#cartform").validate();
      });
      </script>
      <style>
        .error {
          color:#00695C;

        }
        </style>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include './Themepart/Header.php'?>
    <!-- Sidebar menu-->
    <?php include './Themepart/Sidebar.php'?>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-ui-checks"></i> Cart Form </h1>
          
        </div> 
        
      </div>
      <div class="row">
        <div class="col-md-6">
          
        </div>
        <div class="col-md-12">
        <?php
			if($_POST)
				{
					echo "<div class='alert alert-dismissible alert-success'>
                  <button class='btn-close' type='button' data-bs-dismiss='alert'></button> Record Inserted.  
                    </div>";
				}
		?>
          <div class="tile">
          
            <h3 class="tile-title">Cart</h3>
            
            <div class="tile-body">
              <form class="form-horizontal" id="cartform" method="post">
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Name</label>
                  <div class="col-md-8">
                    <?php
                    $sq=mysqli_query($connection,"SELECT * FROM tbl_product");
                    echo "<select name='txt1' class='form-control' required>";
                    echo "<option value=''>Select</option>";
                    while($row=mysqli_fetch_array($sq))
                    {
                      echo "<option value='{$row['pro_id']}'>{$row['pro_name']}</option>";
                    }
                    echo "</select>";
                    ?>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">User Name</label>
                  <div class="col-md-8">
                    <?php
                    $sq=mysqli_query($connection,"SELECT * FROM tbl_user");
                    echo "<select name='txt2' class='form-control' required>";
                    echo "<option value=''>Select</option>";
                    while($row=mysqli_fetch_array($sq))
                    {
                      echo "<option value='{$row['user_id']}'>{$row['user_name']}</option>";
                    }
                    echo "</select>";
                    ?>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Quantity</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="text" placeholder="Enter Product quantity" name="txt3" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3"> Product Price</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" rows="4" placeholder="Enter Price of Product" name="txt4" required>
                  </div>
                </div>
                
                <div class="mb-3 row">
                  <div class="col-md-11 col-md-offset-3">
                    <div class="form-check">
                      <div class="tile-footer">
                        <div class="row">
                          <div class="col-md-9 col-md-offset-6">
                            <button class="btn btn-success" type="submit">Submit</button>
                            <button type="reset" class="btn btn-primary" fdprocessedid="x1iuls">Reset</button>
                            <button class="btn btn-success" type="button"><a href="Cart-Table.php" id="link">View</a></button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="clearix"></div>
        
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <!-- <script src="js/jquery-3.7.0.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>