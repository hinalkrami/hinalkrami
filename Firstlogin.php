<?php
if(!isset($_SESSION['uid']))
{
 
 echo " <script>alert('Login Requird');window.location='Sign-in.php'</script>";
    
}
?>