<?php
include('config/db.php');
session_start();
if(!isset($_SESSION['admin']))
   header('location:login.php');
?>
<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>acceuil</title>   
    </head>
    <body>
        <div class="container">
           
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul  class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">acceuil </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">mol</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php
        
        echo "<img src='images/avatar/".$_SESSION['admin']['image']."' style='width:20px; border-radius:60%'/>";
         echo  $_SESSION['admin']['name'];    
        ?>    
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="update_user.php">modifier mon compte</a>
          <a class="dropdown-item" href="queries/logout.php">se déconnecte</a>
          </div>
      </li>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         utilisateur
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="gest_users.php">liste des utilisateurs</a>
          <a class="dropdown-item" href="add_user.php">ajouter utilisateur</a>
          </div>
      </li>
     
    </ul>
    
  </div>
</nav>
<div class='row'>
            
  <?php
        if($_SESSION['admin']['role']=='webmaster')
        {
       $q="select * from users where role='admin' or  role='user'";
        
       }else if($_SESSION['admin']['role']=='admin')
        {
        $q="select * from users where   role='user'";    
        }
        $s=mysqli_query($c,$q);
            ?> 
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom</th>
      <th scope="col">Nom d'utilisateur</th>
      <th scope="col">password</th>
      <th scope="col">email</th>
      <th scope="col">etat</th>
      <th scope="col">image</th>
      <th scope="col">adresse</th>
      <th scope="col">postcode</th>
      <th scope="col">teléphone</th>
    <?php   if($_SESSION['admin']['role']=='webmaster'){?><th scope="col">role</th><?php } ?>   
      </tr>
    </thead>
    <tbody>
    <?php while($row=mysqli_fetch_assoc($s)){
        ?>
              <tr>
      <th scope="row"><?php echo $row['id'];?></th>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['username'];?></td>
      <td><?php echo $row['password'];?></td>
    <td><?php echo $row['email'];?></td>    
    <td><?php echo $row['etat'];?></td>    
    <td><?php echo $row['image'];?></td>    
    <td><?php echo $row['adresse'];?></td>    
    <td><?php echo $row['postcode'];?></td>    
      <td><?php echo $row['phone_number'];?></td>                   
     <?php if($_SESSION['admin']['role']=='webmaster') { ?>  <td><?php echo $row['role'];?></td> <?php } ?>          <td>
          <a href="update_user.php?id=<?=$row['id'];?>"><i class="fas fa-edit"></i></a>
          <a href="delete_user.php?id=<?=$row['id'];?>"><i class="fas fa-trash"></i></a>
        </td>  
     </tr>          
    <?php
}
    ?>        
        </tbody>
        </table>
          </div>
        <a  href="add_user.php" class="btn btn-primary" >Ajouter Utilisateur</a>    
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>