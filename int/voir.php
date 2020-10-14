<?php

include "../admin/config/db.php";
session_start();
if (!isset($_SESSION['user']))
    header('location:login_user.php');
?>
<html>
    <head>
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/all.min.css">
    <title>acceuil</title>   
    </head>
    <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div  class="container">
    <ul  class="navbar-nav ml-auto">
       
      <li class="nav-item active">
        <a class="nav-link" href="#">acceuil </a>
      </li>
 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php
        
        echo "<img src='images/avatar/".$_SESSION['user']['image']."' style='width:20px; border-radius:60%'/>";
         echo  $_SESSION['user']['name'];    
        ?>    
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="add_user1.php">inscription</a>
          <a class="dropdown-item" href="login_user.php">connecté</a>
          </div>
      </li>
       
         
     
    </ul>
     </div>
  </div>
</nav>
    <?php
        if(isset($_GET['id']))
        {
         $id=$_GET['id'];
         $q = "SELECT * FROM annonce where id=".$id;
         $r=mysqli_query($c,$q);
         while($row = mysqli_fetch_assoc($r)){
         echo $row['titre'];
         $q1="select image from image_an where i_id=".$id;
         $r1=mysqli_query($c,$q1);
         while ($row2 = mysqli_fetch_assoc($r1)) {
         echo "<br><img src='images/avatar1/".$row2['image']."' width='100' style='border-radius:50%'/><br>";
         }
         echo $row['prix']."<br>";     
         echo $row['texte_annonce']."<br>";
        echo $row['adresse']."<br>";
        echo $row['phone_number']."<br>";
         }
        }
        
        ?>
        
           <script src="../admin/js/jquery.min.js"></script>
        <script src="../admin/js/bootstrap.min.js"></script>
    </body>
</html>