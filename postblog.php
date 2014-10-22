
<?php
session_start();
if(isset($_SESSION['name']))
    echo "session exist";
else {
 header("Location: Login.php?msg= login your account ");
 exit (0);
}
 

 
$title=$_POST['title'];
$content=$_POST['content'];
if(trim($title)!="" && trim($content)!="" )
{
    
 include 'dbconnect.php';

$date=date("y-m-d");
$author_id=$_SESSION['id'];

/*
echo $_SESSION;
echo $date;
foreach ($_SESSION as $key=>$val)
    echo $key." ".$val."<br/>"; 
*/

$sql="INSERT INTO blog_detail values(null,'$title', '$author_id','$date','$content')";

           if(mysqli_query($con,$sql)){
         
               header("Location: showblog.php?msg= blog  posted "); 
                           
           }
           else
               header("Location: createblog.php?msg= session expire "); 
               echo "error";
           
}
else
     header("Location: createblog.php?msg= Enter title as well as blog "); 
   

?>
    