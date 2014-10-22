<?php
session_start();
if(isset($_SESSION['name']))
    echo "session exist";
else {
 header("Location: index.php?msg= login your account ");
 exit (0);
}


?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="./assets/ico/favicon.png">

        <title>blog Template for mydesign</title>   
        <link href="./dist/css/bootstrap.css" rel="stylesheet">    
        <link href="signin.css" rel="stylesheet">
        
        
        <style>  
            body{
                background-color:#E0E0E0;

            }  
            
            .myheader
            {  

                margin-left:0px;
                margin-right:0px;
                background-color: #1E8CBE;

            }

            .myname
            {   
                margin-left: 500px;
                color: white;
            }
            </style>
        
        
        
        
    </head>
    <body>
          
        <div class="myheader">
     <div class="navbar navbar-default navbar-fixed-top myheader">
        <div class="container">
          
          <div class="collapse navbar-collapse sticky">
            <ul class="nav navbar-nav ">
                        <li ><a href="#" style=" color:white;">Home</a></li>
                        <li><a href="#about" style=" color:white;">About</a></li>
                        <li><a href="#contact" style=" color:white;">Contact</a></li>
                         <li><a href="changepassword.php" style=" color:white;">Change Password</a></li>
                        <li class="myname">             
                            <a href="#" style=" color:white;"><?php echo "<b>" . $_SESSION['name'] . "</b>"; ?></a>                   
                        </li>
                        <?php if ($_SESSION['status'] == "login") { ?> 
                            <li> <a href="signout.php" style=" color:white;">signout   </a>   </li>
                        <?php } else { ?>
                            <li> <a href="index.php" style=" color:white;">Signin   </a>   </li>
                             <li><a href="index.php" style=" color:white;">Register</a></li>
                        <?php } ?>
                    </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>  
        </div> 
        
        
        
        
        hello
    </body>
</html>
