<?php
session_start();
include 'Firstlogin.php';?>
<script>
     function checkdelete()
     {
      return confirm("Are you Sure?");
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
    <title>Ordermaster</title>
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
   
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include './Themepart/Sidebar.php'?>

    
        <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-table"></i> Table</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="ordermaster-form.php"><i class="bi bi-house-door fs-6"></i> OrderMaster form</a></li>
        </ul>
      </div>
      <div class="row">
      
        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">OrderMaster Table </h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>User Id/User Name</th>
                  <th>Order Date</th>
                  <th>Order Status</th>
                  <th>payment_ammount</th>
                  <th>payment_mode</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include './connection.php';
                if(isset($_GET['did']))
                {
                  $did=$_GET['did'];
                  $deleteq = mysqli_query($connection,"delete from tbl_ordermaster where order_id='{$did}'");
                  if($deleteq)
                  {
                    echo "<div class='alert alert-dismissible alert-success'>
                     <button class='btn-close' type='button' data-bs-dismiss='alert'></button> Record Deleted
                   </div>";
                  }
                }
                $selectq=mysqli_query($connection,"select * from tbl_ordermaster");
                $count=mysqli_num_rows($selectq);
                echo "$count Records found";
                $i=0;
                while($data=mysqli_fetch_array($selectq))
                {
                   
                    $i++;
                    $uq=mysqli_query($connection,"SELECT * FROM tbl_user where user_id='{$data['user_id']}'");
                    $udata=mysqli_fetch_array($uq);
                    echo "<tr>";
                    echo "<td>#{$data['order_id']}</td>";
                    echo "<td>#{$data['user_id']}-{$udata['user_name']}</td>";
                    echo "<td>{$data['order_date']}</td>";
                    echo "<td>{$data['order_status']}</td>";
                    echo "<td>{$data['payment_ammount']}</td>";
                    echo "<td>{$data['payment_mode']}</td>";
                    echo "<td><a href='ordermaster-table.php?did={$data['order_id']}' onclick='return checkdelete();'>Delete </td>";
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
