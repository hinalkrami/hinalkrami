<?php
session_start();
include 'Firstlogin.php';
include './connection.php';
$eid = $_GET['eid'];
if(!isset($_GET['eid']))
{
  header("localhost:user-table.php");

}
$editq = mysqli_query($connection,"select * from tbl_user where user_id='{$eid}'");
$row = mysqli_fetch_array($editq);

if($_POST)
{
   $Name = $_POST['txt1'];
   $Email = $_POST['txt2'];
   $Password = $_POST['txt3'];
   $Contact = $_POST['txt4'];
   $address = $_POST['txt5'];

   $uq=mysqli_query($connection,"update tbl_user set user_name='{$Name}',user_email='{$Email}',user_password='{$Password}',user_contact='{$Contact}',user_address='{$address}' where user_id='{$eid}'");

  
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
    <title>User</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-3.7.1.js" type="text/javascript"></script> -->
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function()
      {
        $("#useredit").validate();
      });
      </script>
      <style>
        .error {
          color:#00695C;

        }
        </style>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include './Themepart/Header.php'?>


    <?php include './Themepart/Sidebar.php'?>
        <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-ui-checks"></i> User form</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item"><a href="User-form.php">User Forms</a></li>
        </ul>
      </div>
      <div class="row">
        <?php
            if($_POST)
            {
             echo "<script>alert('Record Updated');window.location='user-table.php'</script>";
           }   
      ?>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form class="form-horizontal" method="post" name="useredit">
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter full name" name="txt1" value="<?php echo $row['user_name']?>" required/>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Email</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="email" placeholder="Enter email email" name="txt2" value="<?php echo $row['user_email']?>" required/>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Password</label>
                  <div class="col-md-8">
                    <input type="password" class="form-control" rows="4" placeholder="Enter your password" name="txt3"value="<?php echo $row['user_password']?>" required/>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Contact</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" rows="4" placeholder="Enter your Contact no." name="txt4" value="<?php echo $row['user_contact']?>" required/>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Address</label>
                  <div class="col-md-8">
                    <textarea class="form-control" name="txt5"  required><?php echo $row['user_address'] ?></textarea>
                  </div>
                </div>

                <div class="tile-footer">
                <div class="mb-3 row">
                  <div class="col-md-8 col-md-offset-3">
                      <div class="tile-footer">
                        <div class="row">
                          <div class="col-md-8 col-md-offset-3">
                          <button class="btn btn-success" type="submit">Submit</button>
                            <button type="reset" class="btn btn-primary" fdprocessedid="x1iuls">Reset</button>
                            <button class="btn btn-success" type="button"><a href="user-Table.php" id="link">View</a></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
            </div>
          </div>
        </div>
        <div class="clearix"></div>

              </form>
            </div>
                   
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