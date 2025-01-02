<?php
session_start();
session_destroy();
header("location:Admin-login.php");
