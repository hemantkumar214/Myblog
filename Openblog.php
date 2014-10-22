<?php
session_start();
if(isset($_SESSION['name']))
    echo "session exist";
else {
 header("Location: index.php?msg= login your account ");
 exit (0);
}
$blogid=$_GET['blogid'];
if(!$blogid)
{
    header("Location: showblog.php?msg= login your account ");
    exit(0);
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

            body{
                background-color:#E0E0E0;
            }  

            .mydiv{
                margin-top: 40px;


            }
            .mydiv1
            {
                background-color:#FFFFFF ;
                min-height:  auto;
                margin-top: 40px;

            }



            .heading
            {   margin-left: 0px;                        
                color :#000000;
                border: medium none;
                font-size: 25px;
            }
            .text
            {
                margin-left: 10px;                    
            }

            .detail
            {
                margin-left: 0px;
                margin-right: 0px;
            }

            .create
            {
                margin-top: 50px;
                margin-left: 25px;
                position: fixed;
            }
            .posted
            {
                margin-top: 60px;
                position: fixed;
            } 


            .space
            {
                height:10px;
                background-color: #D8D8D8;
                
            }

             .comment{
                background-color:#989898 ;
                margin-bottom:-10px;
            }
            .input
            {
                width: 104% ;
                margin-top: 3px;
                margin-left:-10px;
            }

        </style>
        
        
        
        
        
        
      <script type="text/javascript">
            
            
            
              
          function runScript(e,id) {
    if (e.keyCode == 13) {
   
        var a = document.getElementById(id).value.trim();
          
            if(a=="") 
            {
            alert ("enter comment1");  
            return true;
             }       
            else
            {
           var id=id.substring(1);
            window.location.href = "insertcomment.php?id=" + id + "&comment=" + a ; 
            return false;
            }
        
    }
}  
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            function getid(btn)
            {
            // alert("hello");
         //   alert(btn);
            var a = document.getElementById("i"+btn).value.trim();
           // alert(a);
            if(a=="") 
            {
            alert ("enter comment1");  
            return true;
             }       
            else
            {
           
            window.location.href = "insertcomment.php?id=" + btn + "&comment=" + a ; 
            return false;
            }
            }
            
             function deletecomment(commentid)
            {       
            
             window.location.href = "deletecomment.php?commentid=" + commentid  ;
             return false;
            }
            
            
            
            function deleteblog(blogid)
            {
            
            var blogid=blogid.substring(1);
         
             window.location.href = "deleteblog.php?blogid=" + blogid  ;
            }
            
             function modifyblog(blogid)
            {
            
            var blogid=blogid.substring(1);
         
             window.location.href = "modifyblog.php?blogid=" + blogid  ;
            }
            
            
            
            

        </script>

    </head>





















    <body>

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
            <div class="row ">
                <div class="col-md-2 left">                     
                </div>









                <div class="col-md-8 mydiv">
                    <form role="form">

              <?php
                    include 'dbconnect.php';

                    $sql = "select * from blog_detail WHERE blog_id=$blogid ";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        $sql1 = "select user_name from user_detail WHERE id=$row[2]";
                        $author_name = mysqli_query($con, $sql1);
                        $row1 = mysqli_fetch_array($author_name);

                        $sql2 = "select * from comment_detail WHERE blog_id=$row[0]";
                        $comment = mysqli_query($con, $sql2);
                        ?>




                        <div class="mydiv1" <?php echo "id=b" . $row[0] . "" ?> >                
                            <pre class="heading"><?php echo $row[1] ?></pre>
                            <div class="">
                                <p style="word-wrap: break-word ; margin-left:3% ; margin-right:1%;><?php echo $row[4] ?></p>
                            </div>  
                            <br><br>

                            <div  class="row detail"  style="background-color:	#F8F8F8  ;     bottom: 0; left: 20px;  height:30px;">
                                <div class="col-md-9">   Posted By : <?php echo $row1[0] ?> on <?php echo "   " . $row[3] ?></div> <div> <a href="#" style=" color:#339966;  ">Comment</a></div>

                            </div>
                           <div class="space"></div>
                           
                           
                            <?php
                            while ($row2 = mysqli_fetch_array($comment)) {
                                $sql3 = "select user_name from user_detail WHERE id=$row2[3]";
                                $author_name1 = mysqli_query($con, $sql3);
                                $row3 = mysqli_fetch_array($author_name1);
                                ?>







                            <div  class="row detail"  style="background-color:	#F8F8F8  ;border-bottom-style: groove;     bottom: 0; left: 20px;  height:30px;">
                                <div class="col-md-11">  <?php echo $row3[0] . "  : " . $row2[1]; ?> </div>
                                <div>  <?php if($_SESSION['name']==$row3[0]) {  ?>
                                    <a href="#" style=" color:#339966; " <?php echo "id=" . $row2[0] . "" ?>  onclick="deletecomment(this.id)" >Delete</a>
                                     <?php } ?> 
                                </div>
                                    
                            </div>
                              <?php } ?>
                           
                            
                           <div  class="row detail"  style="background-color:	#F8F8F8  ;border-bottom-style:groove;     bottom: 0; left: 20px;  height:30px;">
                                <div class="col-md-11"> <?php $p = $row[0] ?>
                                    <input type="text" <?php echo "id=i" . $p . "" ?> class="comment input " placeholder="Enter comment"   onkeypress="return runScript(event,this.id)"    /> 
                                </div>
                                <div> <a href="#" style=" color:#339966; " <?php echo "id=" . $row[0] . "" ?>  onclick="getid(this.id)" >Submit</a></div>

                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </div>
                        
                            <?php
                    }
                    ?> 


                </div>

                   


                </form>
            </div>

































































            <div class="col-md-2 left">
            </div>     
        </div> 



    </body>
</html>
