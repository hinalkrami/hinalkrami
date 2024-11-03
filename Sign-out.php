<?php
session_start();
session_destroy();
header("Location:Sign-in.php");
?>