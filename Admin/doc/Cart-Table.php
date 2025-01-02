<?php
  session_start();
  include 'Firstlogin.php';?>
<script>
  function check()
  {
    return confirm("Are you sure?");
  }
</script>
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
    <title>Cart </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include './Themepart/Header.php'?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include './Themepart/Sidebar.php'?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-table"></i>  Table</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="Cart-Form.php" class="bi bi-house-door fs-6"> Cart Form</a></li>
        </ul>
      </div>
      <div class="row">
       
       
        <div class="clearfix"></div>
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Cart Table</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Product Name</th>
                  <th>User Name</th>
                  <th>Product Quantity</th>
                  <th>Product Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                    include './connection.php';
                   
                    if(isset($_GET['did']))
                    {
                      $did=$_GET['did'];
                      $dq=mysqli_query($connection,"DELETE FROM tbl_cart WHERE cart_id='{$did}'");
                      if($dq)
                      {
                        echo "<div class='alert alert-dismissible alert-success'>
                        <button class='btn-close' type='button' data-bs-dismiss='alert'></button> Record deleted.
                      </div>" ;
                      }
                    }
                    $q=mysqli_query($connection,"SELECT * FROM `tbl_cart` ");
                    $count=mysqli_num_rows($q);
                    echo "$count Recorde found.";
                    $i=0;
                    while($data=mysqli_fetch_array($q))
                    {
                        $sq=mysqli_query($connection,"SELECT * FROM tbl_product WHERE pro_id='{$data['product_id']}'");
                        $uq=mysqli_query($connection,"SELECT * FROM tbl_user WHERE user_id='{$data['user_id']}'");
                        $udata=mysqli_fetch_array($uq);
                        $pdata=mysqli_fetch_array($sq);
                        $i++;
                        echo "<tr>";
                        echo "<td> #{$data['cart_id']} </td>";
                        echo "<td> {$pdata['pro_name']} </td>";
                        echo "<td> {$udata['user_name']} </td>";
                        echo "<td> {$data['product_qty']} </td>";
                        echo "<td> {$data['product_price']} </td>";
                        echo "<td> <a href='Cart-Table.php?did={$data['cart_id']}' onclick='return check();'> Delete </a> </td>";
                        echo "</tr>";
                    }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="clearfix"></div>
        
        
        <div class="clearfix"></div>
        
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.7.0.min.js"></script>
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