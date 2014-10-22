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

        <!-- Bootstrap core CSS -->
        <link href="./dist/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="signin.css" rel="stylesheet">

        <style>
            .myblog
            {
                background-color:#707070;



            }
            .myheader
            {
                background-color:black;
                margin-left:0px;
                margin-right:0px;

            }
            .text{
                color:#181818;

            }
            .comment{
                background-color:#989898 ;
                margin-bottom:-10px;
            }
            .input
            {
                width: 104% ;
                margin-left:-14px;
            }


            .a{
                color:#3366FF;
            }
            .myname
            {   
                margin-left: 500px;

            }
            .mybtn{


                color: #0000FF;
                display:inline; 
            }

        </style>

        <script type="text/javascript">
            
            
            
              
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            function getid(btn)
            {
            // alert("hello");
           // alert(btn);
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


            <div class="container myheader">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                    </button>              
                </div>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>

                        <li class="myname">             
                            <a href="#"><?php echo "<b>" . $_SESSION['name'] . "</b>"; ?></a>                   
                        </li>
                        <?php if ($_SESSION['status'] == "login") { ?> 
                            <li> <a href="signout.php"">signout   </a>   </li>
                        <?php } else { ?>
                            <li> <a href="Login.php">Signin   </a>   </li>
                             <li><a href="registerdetail.php">Register</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>




        <div class="container">



            <div class="row"> <div> <h2 class="col-md-9">Posted Blogs......</h2></div>

                <div class="col-md-3 ">   <a href="createblog.php" > <h3><div class="mybtn">Create Blog</div> </h3></a>   </div>
            </div>



            <form id ="4" class="form-horizontal" role= "form"  >    
                <div class="container">

                    <?php
                    include 'dbconnect.php';

                    $sql = "select * from blog_detail ORDER BY blog_id DESC";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        $sql1 = "select user_name from user_detail WHERE id=$row[2]";
                        $author_name = mysqli_query($con, $sql1);
                        $row1 = mysqli_fetch_array($author_name);

                        $sql2 = "select * from comment_detail WHERE blog_id=$row[0]";
                        $comment = mysqli_query($con, $sql2);
                        ?>

                        <div id="">    

                            <div><h7><?php echo $row1[0] ?> &nbsp&nbsp   posted on:<?php echo " " . $row[3] ?></h7></b></div>    


                            <div class ="row"  <?php echo "id=b" . $row[0] . "" ?> >
                                <div class="myblog col-md-9">  
                                    <div class="title"><h3><b1><?php echo $row[1] ?></b1></h3></div>
                                    <div class="text">
                                        <?php echo $row[4] ?> 
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <a href="#" <?php echo "id=m" . $row[0] . "" ?>  onclick="modifyblog(this.id)" >Edit</a> /
                                    <a href="#"  <?php echo "id=h" . $row[0] . "" ?>  onclick="deleteblog(this.id)">Delete</a>
                                </div>  
                            </div>



                            <div class="a"><b>Comment</b></div>

                            <?php
                            while ($row2 = mysqli_fetch_array($comment)) {
                                $sql3 = "select user_name from user_detail WHERE id=$row2[3]";
                                $author_name1 = mysqli_query($con, $sql3);
                                $row3 = mysqli_fetch_array($author_name1);
                                ?>
                                <div class ="row">
                                    <div class="comment col-md-8 ">
                                        <?php echo $row3[0] . "  : ".  $row2[1]; ?>
                                    </div>
                                    <div class="col-md-2">
                                        
                                        <a href="#"  <?php echo "id=" . $row2[0] . "" ?>  onclick="deletecomment(this.id)">Delete</a>
                                       
                                    </div>
                                </div>
                                <br>
                            <?php } ?>



                            <div class="row" > <?php $p = $row[0] ?>
                                <div class="comment col-md-8">
                                    <input type="text" <?php echo "id=i" . $p . "" ?> class="comment input " placeholder="Enter comment"/>    
                                </div> 
                                <div> <button  <?php echo "id=" . $p . "" ?>   onClick="return getid(this.id);" >Submit</button></div> 
                            </div>

                            <br>
                            <br>
                        </div>     

                        <?php
                    }
                    ?>  
                      
                </div>


            </form>


 




    </body>
</html>
