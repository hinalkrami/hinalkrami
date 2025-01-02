<?php
    session_start();
  include './connection.php';
  include './Firstlogin.php';
  if(!isset($_SESSION['id']))
{
  echo "<script>alert('Login required');window.location:'login.php';</script>";
}

  if(isset($_POST['btnsubmit']))
  {
    $filename = $_FILES['txt2']['name'];
    $filepath = $_FILES['txt2']['tmp_name'];
    $filename2 = $_FILES['txt3']['name'];
    $filepath = $_FILES['txt3']['tmp_name'];
    $filename3 = $_FILES['txt4']['name'];
    $filepath = $_FILES['txt4']['tmp_name'];
    move_uploaded_file($filepath,"uploads/".$filename);
    move_uploaded_file($filepath,"uploads/".$filename2);
    move_uploaded_file($filepath,"uploads/".$filename3);

    $name=$_POST['txt1'];
    $details=$_POST['txt5'];
    $price=$_POST['txt6'];
    $category = $_POST['txt7'];
    $subcategory = $_POST['txt8'];
    $q=mysqli_query($connection,"INSERT INTO tbl_product(pro_name, pro_photo_path,pro_photo_path2,pro_photo_path3,pro_price, pro_details,category_id,subcategory_id) VALUES ('{$name}','{$filename}','{$filename2}','{$filename3}','{$price}','{$details}','{$category}','{$subcategory}')");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="js/jquery-3.7.1.js" type="text/javascript"></script>
    <script src="js/jquery.validate.js" type="text/javascript"></script>

    <script>

       $(document).ready(function(){
        $("#myform7").validate();
       });
      </script>
      <style>
        .error{
          color : #00695c;
        }
        </style>

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
    <title>Form Samples - Vali Admin</title>
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
                  <button class='btn-close' type='button' data-bs-dismiss='alert'></button> Record Inserted.  
                    </div>";
				}
		?>
          <div class="tile">
          
            <h3 class="tile-title">Product Details</h3>
            
            <div class="tile-body">
              <form class="form-horizontal" method="post" enctype="multipart/form-data" id="myform7">
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter Product name" name="txt1" required/>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Photo 1</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="file"  name="txt2" required/>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Photo 2</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="file"  name="txt3" required/>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Photo 3</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="file"  name="txt4" required/>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Details</label>
                  <div class="col-md-8">
                    <textarea  class="form-control" rows="4" placeholder="Enter product details" name="txt5" required/></textarea>
                  </div>
                </div>
                
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Product Price</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter product price" name="txt6" required/>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="form-label col-md-3">Category</label>
                  <div class="col-md-8">
                    <?php
                    $cq=mysqli_query($connection,"SELECT * FROM tbl_category");
                    echo "<select name='txt7' class='form-control'required>";
                    echo "<option value=''>Select</option>";
                    while($row=mysqli_fetch_array($cq))
                    {
                      echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                    }
                    echo "</select>";
                    ?>
                  </div>
                </div>
                
                 <div class="mb-3 row">
                  <label class="form-label col-md-3">Subcategory </label>
                  <div class="col-md-8">
                  <?php
                    $scq=mysqli_query($connection,"select * from tbl_category");
                    echo "<select name='txt8' class='form-control'required>";
                    echo "<option value=''>Select</option>";
                   
                    while($row=mysqli_fetch_array($scq))
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
                            <input class="btn btn-success"  type="submit" value="submit" name="btnsubmit"/>
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
    
    <style>

    .error{
     color:red;
    }
      </style>
  </body>
</html>