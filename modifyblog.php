<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="./assets/ico/favicon.png">

    <title>blog Template for Bootstrap</title>   
    <link href="./dist/css/bootstrap.css" rel="stylesheet">    
    <link href="signin.css" rel="stylesheet">
    
 <style>
     
  .myblog
  {
background-color:#707070;
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
   
   
 .text{
color:#181818;

}
.comment{
background-color:#E8E8E8;

margin-bottom:-10px;
}
.input
{
 width: 104% ;
margin-left:-13px;
}


.a{
color:#3366FF;
}

.mybtn{
    

color: #0000FF;
display:inline; 
}
.div
{
   margin-top: 10%; 
  background-color: #707070;
}

body{
    background-color:#E0E0E0;
}

   </style>
    </head>
    

</body>
<?php
session_start();
$blog_id = (int) $_GET['blogid'];
$_SESSION['blog_id']=$blog_id;
// echo $blog_id;
include 'dbconnect.php';
if (isset($_SESSION['name'])) {
    $mysql = "SELECT author_id FROM blog_detail WHERE blog_id=$blog_id";
    $author_id = mysqli_query($con, $mysql);
    $row = mysqli_fetch_array($author_id);
  //  echo $row[0];
  //  echo $_SESSION['id'];
    if ($row[0] == $_SESSION['id']) 
        {        
        $sql="SELECT * FROM blog_detail WHERE blog_id=$blog_id" ;
         $result=mysqli_query($con,$sql);      
          $row=  mysqli_fetch_array($result);
      
    //  echo $row['blog_content'];
    //  echo $row['blog_title'];

        ?>
        
      
  <div class="myheader">
     <div class="navbar navbar-default navbar-fixed-top myheader">
        <div class="container">
          
          <div class="collapse navbar-collapse sticky">
            <ul class="nav navbar-nav ">
                        <li ><a href="showblog.php" style=" color:white;">Home</a></li>
                        <li><a href="#about" style=" color:white;">About</a></li>
                        <li><a href="#contact" style=" color:white;">Contact</a></li>

                       
                        <?php if ($_SESSION['status'] == "login") { ?> 
                         <li class="myname">             
                            <a href="#" style=" color:white;"><?php echo "<b>" . $_SESSION['name'] . "</b>"; ?></a>                   
                        </li>
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


   
    <div class="container">
        
        
   
  <?php 
 
 echo  "&nbsp&nbsp<b>".$_GET['msg']."</b>" ;

   ?>
   <div class="row">
       <div class="col-md-3"></div>
    <div class="col-md-6 div">
        <form class="form-horizontal" role="form" method="post" action="updateblog.php">
     <h2 class="form-signin-heading">Create Blog</h2>
   <div class="row"> <label for="title" class="col-md-2 control-label">Blog Title:</label>
    <div class="col-md-10">
      <input type="text" name="title" class="form-control" id="title" <?php echo "value=". $row['blog_title'].""    ?>    placeholder="">
    </div>
  </div>
   

    <div class="row"> <label for="desc"  class="col-md-2 control-label">Blog Content:</label>
    <div class="col-md-10">
     <textarea class="form-control" rows="3" name="desc" placeholder=""><?php echo  $row['blog_content']  ?> </textarea>     
    </div> 
  </div>
  <br>
 <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
     &nbsp&nbsp <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
  
</form>
        
 </div>       
</div>
</div>

   <?php     
    }
    else
    {   header("Location: showblog.php?msg= you can not modify it  ");
        echo "you can't modify it.";
    }
}
else
    header("Location: index.php?msg= login your account  ");
?>
</body></html>  
