
        <?php
        
     echo "   hello i m there";
        $name=$_POST["username"];
        $pass=$_POST["pass"];
        $email=$_POST["email_id"];
       
        include 'dbconnect.php';
        
        if(isset ($_POST["username"])&&isset($_POST["pass"])&&isset($_POST["email_id"])&&  $pass!="" && $name!="")
        {
         $sql="INSERT INTO user_detail values(null,'$name', '$pass','$email')";
           if(mysqli_query($con,$sql)){
               session_start();
               $_SESSION['name']=$name;
                    header("Location: showblog.php?msg= user has been registered successfully "); 
           
           }
            else  
                 header("Location: index.php?msg3= this email_id already registered & p=1  "); 
                         
        }
          else 
              header("Location: index.php?msg3= Enter complete detail ");
          
         
        ?>
