<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
session_start();
if(isset($_SESSION['name']))
{   $_SESSION['status']="login";
    echo "session exist";
}
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
        

        <title>blog Template for mydesign</title>   
        <link href="dist/css/bootstrap.css" rel="stylesheet">    
        <link href="signin.css" rel="stylesheet">
            <script type='text/jacascript' src="js/jquery-2.0.3.js"></script>
            <script type='text/jacascript' src="dist/js/bootstrap.min.js"></script>
        <style type='text/css'>                   
            .myheader
            {  
               
                margin-left:0px;
                margin-right:0px;
                background-color: #1E8CBE;
               
            }
            .text{
                color:#181818;

            }                      
            .myname
            {   
                margin-left: 500px;
                color: white;
            }
            
          body{
                background-color:#E0E0E0;

            }   

            .left .right
            {
                
            position: fixed;
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
             .mybtn{


                color: #0000FF;
                display:inline; 
            }
       a :hover 
       {   
           color:#3366FF;
       }
          .alin
          {
              float:right;
             
          }
            .img
            {
                margin-right:10px;
            }
            
           
        </style>
        
         

        <script type="text/javascript">
            
           
            
            function showModelPopUp()
            {
              
               $('#myModal').modal({
                  show:true,
                  backdrop: 'static',
                  keyboard: false
              });

            }
            
            
            function getblogid(blogid)
            {
           
            window.location.href = "Openblog.php?blogid=" + blogid  ;
             return false;                     
            }
            
              function theFunction(blogid)
            {
            var blogid=blogid.substring(1);
            window.location.href = "Openblog.php?blogid=" + blogid  ;
             return false;                     
            }
            
            
            
            
            
             function getid(btn)
            {
           //alert("hello");
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
     <div class="navbar navbar-default navbar-fixed-top myheader">
        <div class="container">
          
          <div class="collapse navbar-collapse sticky">
            <ul class="nav navbar-nav ">
                        <li ><a href="#" style=" color:white;">Home</a></li>
                        <li><a href="#about" style=" color:white;">About</a></li>
                        <li><a href="#contact" style=" color:white;">Contact</a></li>
                         <li><a id="changePassword" data-toggle="modal" href="#" onclick="showModelPopUp()" style=" color:white;">Change Password</a></li>
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
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
      

        
        
        
        


        <div class="container">  
            <div class="row ">
                <div class="col-md-3 left">
                     <h2 class="posted">Posted Blogs.....</h2>
                </div>



                <div class="col-md-6 mydiv">
                    
                
            

                 

                    <form role="form">   
                        
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

                        
                        

                       
                        <div class="mydiv1" <?php echo "id=d" . $row[0] . "" ?>   >                
                                                                  
                               <div  class="heading row detail"  style="background-color:	#F8F8F8  ;     bottom: 0; left: 20px;  ">
                             <div class="col-md-11">  <a  <?php echo "id=b" .$row[0] . "" ?> href="#" onclick="theFunction(this.id)" style=" color:#339966; word-wrap: break-word; "><p> <?php echo $row[1] ?></p></a>   </div>
                             <div class="col-md-1">
                                <?php if($_SESSION['name']==$row1[0]) {  ?>
                               <a class="img" <?php echo "id=h" .$row[0] . "" ?>href="#" onclick="deleteblog(this.id)" ><img class="" src="delete.jpeg" alt="Delete" width="20" height="20"></a>  
                                 <?php } ?>                       
                            </div>
                        </div>
                               
                          
                               
                              
                            <div class="text " >
                                 <p style="word-wrap: break-word ; margin-left:3% ; margin-right:1%;" ><?php echo $row[4] ?></p>
                            </div> 
                               
                            <br><br>

                            <div  class="row detail"  style="background-color:	#F8F8F8  ;     bottom: 0; left: 20px;  height:30px;">
                             <div class="col-md-10">   Posted By : <?php echo $row1[0] ?> on <?php echo "   " . $row[3] ?></div> 
                             <div class="">
                                 &nbsp; <a <?php echo "id=" .$row[0] . "" ?> href="#" onclick="getblogid(this.id)" style=" color:#339966;  "><img src="comment.jpeg" alt="Comment" width="20" height="20"></a>
                                 &nbsp; &nbsp<a <?php echo "id=m" .$row[0] . "" ?> href="#" onclick="modifyblog(this.id)" style=" color:#339966;  "><img src="edit.jpeg" alt="Edit" width="20" height="20"></a>
                             </div>
                        </div>
                            </div>


                       


                        
                        
                        
                        
                        <?php
                    }
                    ?>  
                      
                        
                        
                        
                        

                    </form>


                </div>
                    









                <div class="col-md-3 right">
                    <a href="createblog.php" > <h3><div class="mybtn create">Create Blog</div> </h3></a>   
            </div>   
                </div>
            </div>
        
      
     <div style="margin-top:25%" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
         <form role="form" action="changepass.php" method="post">
     <div class="form-group">
    <label for="exampleInputEmail1">Current Password</label>
    <input type="password" class="form-control" id="currentpass" placeholder="Enter Current Password">
     <label for="exampleInputEmail1">New Password</label>
    <input type="password" class="form-control" id="newpass" placeholder="Enter New Password">
    </div>
      </form>      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->   
        
       

    </body>
</html>