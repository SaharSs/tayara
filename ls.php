<?php

include "../admin/config/db.php";
session_start();
if (!isset($_SESSION['user']))
    header('location:login_user.php');


if(isset($_POST['submit']))
{
 $msg=$_POST['name'];
$q="insert into message (message,sender_id,r_id)values($msg,'{$_SESSION['user']['id']}','$id')";
$r=mysqli_query($c,$q);
    
    
}


?>
<html>
    <head>
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/all.min.css">
    <title>acceuil</title>   
    </head>
    <body>
        















 <form  action="" method="post">
         <label>message:</label>
         <br /><br />
         <textarea placeholder="Votre message" name="message"></textarea>
         <br /><br />
        <input type="submit"  name="envoyer" />
        
      </form>





     <script src="../admin/js/jquery.min.js"></script>
        <script src="../admin/js/bootstrap.min.js"></script>
    </body>
</html>