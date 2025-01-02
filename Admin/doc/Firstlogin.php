<?php
if(!isset($_SESSION['id']))
{
 
 echo " <script>alert('Login Requird');window.location='Admin-login.php'</script>";
    
}
?>