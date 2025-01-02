<?php
session_start();
include 'Firstlogin.php';
 include './connection.php';
 $eid=$_GET['eid'];
 if(!isset($_GET['eid']))
 {
    header("localhost:Order_Details-Table.php");
 }
 $sq=mysqli_query($connection,"SELECT * FROM tbl_order_details where order_details_id='{$eid}'");
 $row=mysqli_fetch_array($sq);
 if($_POST)
  {
    $order_name=$_POST['txt1'];
    $proid=$_POST['proid'];
    $pro_qty=$_POST['txt2'];
    $total_price=$_POST['txt3'];
    $q=mysqli_query($connection,"UPDATE `tbl_order_details` SET `order_name`='{$order_name}',`pro_id`='{$proid}',`product_qty`='{$pro_qty}',`total_price`='{$total_price}' WHERE order_details_id='{$eid}'");
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
    <title>Ordedetails</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <script src="js/jquery-3.7.1.js" type="text/javascript"></script> -->
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function()
      {
        $("#orderdetailsedit").validate();
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
          <h1><i class="bi bi-ui-checks"></i> Order Form </h1>
          
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
                    </div><script>window.location='Order_Details-Table.php'</script>";
				}
		?>
          <div class="tile">
          
            <h3 class="tile-title">Order Details</h3>
            
            <div class="tile-body">
              <form class="form-horizontal" method="post" id="orderdetailsform">
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Order Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter Order name" value="<?php echo $row['order_name']?>" name="txt1" require>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Id</label>
                  <div class="col-md-8">
                    <?php
                    $sq=mysqli_query($connection,"SELECT * FROM tbl_product");
                    echo "<select name='proid' class='form-control'>";
                    echo "<option value=''>Select</option>";
                    while($prow=mysqli_fetch_array($sq))
                    {
                      echo "<option value='{$prow['pro_id']}'>{$prow['pro_name']}</option>";
                    }
                    echo "</select>";
                    ?>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Quantity</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="text" placeholder="Enter Order quantity" value="<?php echo $row['product_qty']?>" name="txt2" require>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3"> Total Price</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" rows="4" placeholder="Enter Total price" value="<?php echo $row['total_price']?>" name="txt3" require>
                  </div>
                </div>
                
                <div class="mb-3 row">
                  <div class="col-md-8 col-md-offset-3">
                    <div class="form-check">
                      <div class="tile-footer">
                        <div class="row">
                          <div class="col-md-9 col-md-offset-6">
                            <button class="btn btn-success" type="submit">Submit</button>
                            <button type="reset" class="btn btn-primary" fdprocessedid="x1iuls">Reset</button>
                            <button class="btn btn-success" type="button"><a href="Order_Details-Table.php" id="link">View</a></button>
                            
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