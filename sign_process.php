
<?php
echo "hello";
include 'dbconnect.php';

if(isset($_SESSION['name']))
{
    header("Location: showblog.php?msg= login your account ");
    exit (0);
}



 $sql="select * from user_detail"; 
      $result=mysqli_query($con,$sql);
      $i=0;
      while($row=  mysqli_fetch_array($result))
      {
         if($row[3]==$_POST['emailid'])
         {  global $i;
         $i=1;
             break;
         }
      }
      if($i==1){
      if($row[2]==$_POST['pass']){
          session_start();
          $_SESSION['name']=$row[1];
          $_SESSION['id']=$row[0];
          $_SESSION['email_id']=$row[3];
          $_SESSION['status']="login";
       //    
         echo "loggedin"; 
         if(isset($_POST['chkbx']))
         {
           echo "checked"; 
               $eid=   $_POST['emailid'];
               $pass=$_POST['pass'];
               setcookie($eid, $pass);
         
                       
           foreach ($_COOKIE as $key => $value) {
               echo $key ."=>". $value ;
               
               header("Location: showblog.php?msg= welcome  $row[1] ");
               
           }
           
         }
         else
             {
             echo "hello";
             }
         
           header("Location: showblog.php?msg= welcome  $row[1] ");
          
      }
      else 
     header("Location: index.php?msg1= incorrect password ");    
       
      }
      else
         header("Location: index.php?msg2= incorrect email_id ");
         

?>
