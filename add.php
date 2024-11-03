if($add1 != $_SESSION['user_address'])
    {
        mysqli_query($connection,"UPDATE tbl_user set user_address='{$add1}' where user_id='{$uid}'");
        $_SESSION['user_address']=$add1;
    }