<?php 
session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $blog_id= $_GET['id'];
         $content= $_GET['comment'];
         if(isset($_SESSION['name']))
        {
        include 'dbconnect.php' ;
        
         $uid=(int)$_SESSION['id'];
         $bid= (int)$blog_id;
         echo $uid;
         echo $bid;
         echo $content;                  
         $sql="INSERT INTO comment_detail values(default,'$content', $bid , $uid )";      
         
       if(mysqli_query($con,$sql))
        echo "row has been created";
       else
      echo "Error creating table: " . mysql_error($con);
        header("Location: Openblog.php?msg=  comment done & blogid=$blog_id");
        }
         
         else {
         header("Location: index.php?msg= login your account  ");
           }
        ?>
    </body>
</html>
