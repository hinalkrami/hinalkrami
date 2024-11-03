<?php
session_start();
include 'Firstlogin.php';
?>
<html>
    <head>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">
        <style>
            *{
            box-sizing:border-box;
            /* outline:1px solid ;*/
            }
            body{
            background: #ffffff;
            background-image: url("Thanks.png");
                height: 100%;
                
                    margin: 0;
                    background-size:cover;
                    background-repeat: no-repeat;
                    background-attachment: fixed;
            
            }

            .wrapper-1{
            width:100%;
            height:100%;
            display: flex;
            flex-direction: column;
            }
            .wrapper-2{
            padding :30px;
            text-align:center;
            }
            h1{
                font-family: 'Kaushan Script', cursive;
            font-size:4em;
            letter-spacing:3px;
            color:#07644b ;
            margin:0;
            margin-bottom:20px;
            }
            .wrapper-2 p{
            margin:0 175px 0 175px;
            font-size:1.3em;
            color:#aaa;
            font-family: 'Source Sans Pro', sans-serif;
            letter-spacing:1px;
            }
            .go-home{
            color:#fff;
            background:#07644b;
            border:none;
            padding:12px 50px;
            margin:20px;
            border-radius:30px;
            text-transform:capitalize;
            box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
            }
            
            .footer-like{
                
            /* background:#ace1d2; */
            /* padding:6px; */
            margin-top:15px;
            text-align:center;
            }
            .footer-like p{
            margin:0;
            padding:4px;
            color:#07644b;
            font-family: 'Source Sans Pro', sans-serif;
            letter-spacing:1px;
            }
            .footer-like  a{
            text-decoration:none;
            color:#07644b;
            font-weight:600;
            }
            button a
            {
                color:white;
                margin:20px;
                
                text-decoration:none;
            }

            @media (min-width:360px){
            h1{
                font-size:4.5em;
            }
            .go-home{
                margin-bottom:20px;
            }
            }

            @media (min-width:600px){
            .content{
            max-width:1000px;
            margin:0 auto;
            }
            .wrapper-1{
            height: 100%;
            max-width:100%;
            margin:0 auto;
            padding-top:180px;
            box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
            }
            
            }
        </style>
    </head>
    <body>
        <div class>
        <div class="wrapper-1">
            <div class="wrapper-2">
            <h1>Thank you <?php echo $_SESSION['uname']?> !</h1>
            <p>"Thank you for choosing GreenHeaven for your plant needs! We appreciate your support and look forward to providing you with lush, green beauties that will brighten your space and nurture your soul."  </p>
            <button class="go-home">
           
            <a href="Product.php">Purchase More....</a>
            
            </button>
            <button class="go-home">
                <a href="Feedback.php">
            Give Feedback
                </a>
            </button>
            </div>
            
        </div>
        </div>
    </body>
</html>