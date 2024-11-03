<?php

session_start();
include './connection.php';


if(isset($_GET['proid']))
{
    $proid=$_GET['proid'];
    echo $proid;    
    $uid =$_SESSION['uid'];
    $total_price=0;
    $qty=1;
    $qc=mysqli_query($connection,"SELECT * FROM tbl_cart WHERE product_id='{$proid}' AND user_id='{$uid}'");
    $qcdata=mysqli_fetch_array($qc);
    if(!isset($_SESSION['uid']))
    {
        header("location:Sign-in.php");
    }

    if($proid==$qcdata['product_id'])
    {
        $qty += $qcdata['product_qty'];
        $q=mysqli_query($connection,"SELECT pro_price FROM tbl_product WHERE pro_id='{$proid}'");
        $data=mysqli_fetch_array($q);
        $price=$data['pro_price'];
        $total_price=$qty*$price;
        $uq = mysqli_query($connection,"UPDATE tbl_cart SET product_qty='{$qty}' , product_price ='{$total_price}' WHERE product_id='{$proid}'");
        if($uq)
        {
            header("location:Cart.php");
            

        }  
    }
    else 
    {
        $q=mysqli_query($connection,"SELECT pro_price FROM tbl_product WHERE pro_id='{$proid}'");
        $data=mysqli_fetch_array($q);
        $price=$data['pro_price'];
        $q = mysqli_query($connection,"insert into tbl_cart (product_id,user_id,product_qty,product_price) values('{$proid}','{$uid}','{$qty}','{$price}')");
        if($q)
        {
            header("location:Cart.php");
            

        }  
    }
   
}

if($_POST)
{
    $proid = $_POST['pid'];
    $uid =$_SESSION['uid'];
    $qty = $_POST['quantity'];
    $total_price=0;
    $qc=mysqli_query($connection,"SELECT * FROM tbl_cart WHERE product_id='{$proid}' AND user_id='{$uid}'");
    $qcdata=mysqli_fetch_array($qc);
    if($proid==$qcdata['product_id'])
    {
        $qty += $qcdata['product_qty']; 
        $q=mysqli_query($connection,"SELECT pro_price FROM tbl_product WHERE pro_id='{$proid}'");
        $data=mysqli_fetch_array($q);
        $price=$data['pro_price'];
        $total_price=$qty*$price;
    
        if(!isset($_SESSION['uid']))
        {
            header("location:Sign-in.php");
        }

        $uq = mysqli_query($connection,"UPDATE tbl_cart SET product_qty='{$qty}' , product_price ='{$total_price}' WHERE product_id='{$proid}'");
        if($uq)
        {
            header("location:Cart.php");

        }  
    }
    else
    {
        $q=mysqli_query($connection,"SELECT pro_price FROM tbl_product WHERE pro_id='{$proid}'");
        $data=mysqli_fetch_array($q);
        $price=$data['pro_price'];
        $total_price=$qty*$price;
    
        if(!isset($_SESSION['uid']))
        {
            header("location:Sign-in.php");
        }

        $q = mysqli_query($connection,"insert into tbl_cart (product_id,user_id,product_qty,product_price) values('{$proid}','{$uid}','{$qty}','{$total_price}')");
        if($q)
        {
            header("location:Cart.php");
        }  
    }
   
    
}
?>