<?php
session_start();
include 'Firstlogin.php';
 include './connection.php';
 $eid=$_GET['eid'];
 if(!isset($_GET['eid']))
 {
    header("localhost:Product-Table.php");
 }
 $sq=mysqli_query($connection,"SELECT * FROM tbl_product where pro_id='{$eid}'");
 $row=mysqli_fetch_array($sq);
  if($_POST)
  {
    $name=$_POST['txt1'];
    $photoname=$_FILES['txt2']['name'];
    $photopath=$_FILES['txt2']['tmp_name'];
    move_uploaded_file($photopath,"uploads/".$photoname);
    $photoname2 = $_FILES['txt3']['name'];
    $photopath = $_FILES['txt3']['tmp_name'];
    move_uploaded_file($photopath,"uploads/".$photoname2);
    $photoname3 = $_FILES['txt4']['name'];
    $photopath =$_FILES['txt4']['tmp_name'];
    move_uploaded_file($photopath,"uploads/".$photoname3);
    $details=$_POST['txt5'];
    $price=$_POST['txt6'];
    $category=$_POST['txt7'];
    $subc=$_POST['txt8'];
    $up=mysqli_query($connection,"UPDATE tbl_product SET pro_name='{$name}',pro_photo_path='{$photoname}',pro_photo_path2='{$photoname2}',pro_photo_path3='{$photoname3}',pro_details='{$details}',pro_price='{$price}',category_id='{$category}',subcategory_id='{$subc}'  where pro_id='{$eid}'");

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
    <title>Product</title>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-3.7.1.js" type="text/javascript"></script> 
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function()
      {
        $("#productedit").validate();
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
    <!-- Sidebar menu-->
    <?php include './Themepart/Sidebar.php'?>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-ui-checks"></i> Product-Form </h1>
          
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
                  <button class='btn-close' type='button' data-bs-dismiss='alert'></button> Record Updated.  
                    </div><script>window.location='Product-Table.php';</script>";

				}
		?>
          <div class="tile">
          
            <h3 class="tile-title">Update Product Details</h3>
            
            <div class="tile-body">
              <form class="form-horizontal" method="post" id="productedit" enctype="multipart/form-data">
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter Product name" value="<?php echo $row['pro_name']?>" name="txt1" required/>
                  </div>
                </div>
                
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Photo 1</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="file"  value="<?php echo $row['pro_photo_path']?>"  name="txt2"  required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Photo 2</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="file"  value="<?php echo $row['pro_photo_path2']?>"  name="txt3"  required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Photo 3</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="file"  value="<?php echo $row['pro_photo_path3']?>"  name="txt4"  required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Details</label>
                  <div class="col-md-8">
                    <textarea  class="form-control" rows="4" placeholder="Enter product details"  name="txt5" required><?php echo $row['pro_details']?></textarea>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Price</label>
                  <div class="col-md-8">
                    <input class="form-control" type="number" placeholder="Enter product price" name="txt6" value="<?php echo $row['pro_price']?>"  required/>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Category</label>
                  <div class="col-md-8">
                    <?php
                      $sq=mysqli_query($connection,"SELECT * FROM tbl_category where category_id='{$row['category_id']}'");
                      $cdata=mysqli_fetch_array($sq);
                      echo "<select name='txt7' class='form-control'>";
                      echo "<option value='{$cdata['category_id']}'>{$cdata['category_name']}</option>";
                      $q=mysqli_query($connection,"SELECT * FROM tbl_category");
                      while($crow=mysqli_fetch_array($q))
                      {
                        echo "<option value='{$crow['category_id']}'>{$crow['category_name']}</option>";
                      }
                      echo "</select>";
                    ?>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Subcategory</label>
                  <div class="col-md-8">
                  <?php
                    $scq=mysqli_query($connection,"SELECT * from tbl_subcategory where subc_id={$row['subcategory_id']}");
                    $scdata=mysqli_fetch_array($scq);
                    echo "<select name='txt8' class='form-control'required>";
                    echo "<option value='{$scdata['subc_id']}'>{$scdata['subc_name']}</option>";
                    $c=mysqli_query($connection,"SELECT * from tbl_category");
              
                    while($row=mysqli_fetch_array($c))
                    {
                      echo "<optgroup label='{$row['category_name']}'>";
                      $scq1=mysqli_query($connection,"select * from tbl_subcategory where category_id ='{$row['category_id']}'");
                     while($subcadata  = mysqli_fetch_array($scq1))
                     {
                      echo "<option value='{$subcadata['subc_id']}'>{$subcadata['subc_name']}</option>";
                     }
                     echo "</optgroup>";
                    }
                    echo "</select>";
                  ?>
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
                            <button class="btn btn-success" type="button"><a href="Product-Table.php" id="link">View</a></button>
                            
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