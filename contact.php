<?php
 $conn = mysqli_connect('host','iuser_name','password','database_name') or die('connection failed');
 if(isset($_POST['submit'])){

   $Name = $_POST['Name'];
   $Email = $_POST['Email'];
   $Subject = $_POST['Subject'];
   $Message = $_POST['Message'];
   $Date = date("Y-m-d H:i:s");
 

   $select_users = mysqli_query($conn, "SELECT * FROM `messages` WHERE Email = '$Email' AND Subject = '$Subject'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      echo 'Sorry, ',$Name; echo'! You have already send the message regarding ',$Subject;
      }else{
         mysqli_query($conn, "INSERT INTO `messages`(Name, Email, Subject, Message, Date) VALUES('$Name', '$Email', '$Subject', '$Message', '$Date')") or die('query failed');
        header('location:Send');
      }
}
?>
