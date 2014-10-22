

  <?php
 require_once "Mail.php";

 $from = " <baaahemant@gmail.com>";
 $to = " <hemant@neevtech.com>";
 $subject = "Hi!";
 $confirm_code=uniqid();
 $body = "Hi,\n\nHow are you?"."for varification click here"."http://10.132.161.85/myblog/confirmation.php?passkey=$confirm_code";



 
 $host = "smtp.gmail.com";
 $username = "baaahemant@gmail.com";
 $password ="hemant123456" ;
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 echo "hello";
 $mail = $smtp->send($to, $headers, $body);
 echo "hello";
 if (PEAR::isError($mail)) {
     echo "hello1";
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }
 ?>

