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
        <li>
       <form method="POST" action=""> 
     Recherchez  
    <input type="text" name="recherche">
     <input type="submit" value="recherche"> 
     </form>
        </li>    
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
if(isset($_POST['recherche']) AND !empty($_POST['recherche'])) {
    $m = htmlspecialchars($_POST['recherche']);
    $q = "SELECT * FROM annonce WHERE titre LIKE '%".$m."%' && a_id={$_SESSION['user']['id']}  && cas=1";
     $r=mysqli_query($c,$q); 
   
        ?>
          <a href="acceuil.php">annuler</a>
        <?php
        
     echo "resultat de la recherche:";
         while( $row = mysqli_fetch_assoc($r)){
            
 echo $row['titre'];



      
    }
    }
        
        if(isset($_POST['recherche']) AND !empty($_POST['recherche'])) {
    $m = htmlspecialchars($_POST['recherche']);
    $q = "SELECT * FROM annonce WHERE titre LIKE '%".$m."%' && a_id={$_SESSION['user']['id']} && cas=1 ";
        
            $r=mysqli_query($c,$q);                       
            while($row = mysqli_fetch_assoc($r))
                
              {


               $q1="select * from image_an where i_id='{$row['id']}' ";
               $r1=mysqli_query($c,$q1);
               
              while ($row2 = mysqli_fetch_assoc($r1)) {
                   
                  echo "<br><center><img src='images/avatar1/".$row2['image']."' width='100' style='border-radius:50%'/></center>"; 
              
           echo "<center>".$row['prix']. "<center>";
        
                    
                ?>
                 <a href="voir.php?id=<?= $row['id']?>">voir</a>
        
        <?php
                    
                    }
                
            }
        }else
        {
                ?>
        
        
        
        <?php
          $q = "SELECT * FROM annonce where cas=1 ";
            $r=mysqli_query($c,$q);                       
            while($row = mysqli_fetch_assoc($r))
                
              {


               $q1="select * from image_an where i_id='{$row['id']}' ";
               $r1=mysqli_query($c,$q1);
               
              while ($row2 = mysqli_fetch_assoc($r1)) {
                   
                  echo "<br><center><img src='images/avatar1/".$row2['image']."' width='100' style='border-radius:50%'/></center>"; 
              
           echo "<center>".$row['prix']. "<center>";
        
                    
                ?>
                 <a href="voir.php?id=<?= $row['id']?>">voir</a>
        
        <?php
                    
                    }
                
            }
        }
        
                ?>
        
            
               <script src="../admin/js/jquery.min.js"></script>
        <script src="../admin/js/bootstrap.min.js"></script>
    </body>
</html>