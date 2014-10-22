<?php
 session_start();
 
 
?>
<html lang="en">
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

  <body>    
      
       <div class="myheader">
     <div class="navbar navbar-default navbar-fixed-top myheader">
        <div class="container">
          
          <div class="collapse navbar-collapse sticky">
            <ul class="nav navbar-nav ">
                        <li ><a href="#" style=" color:white;">Home</a></li>
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
        <form class="form-horizontal" role="form" method="post" action="postblog.php">
     <h2 class="form-signin-heading">Create Blog</h2>
   <div> <label for="title" class="col-lg-2 control-label">Blog Title:</label>
    <div class="col-lg-10">
      <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
    </div>
  </div>
   

    <div> <label for="content"  class="col-lg-2 control-label">Blog Content:</label>
    <div class="col-lg-10">
     <textarea class="form-control"  name="content" placeholder="Enter Blog"></textarea>     
    </div> 
  </div>
  <br>
 <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
     &nbsp&nbsp <button type="submit" class="btn btn-default">Post</button>
    </div>
  </div>
  
</form>
        
 </div>       
</div>

    </div> <!-- /container -->


 
  </body>
</html>
