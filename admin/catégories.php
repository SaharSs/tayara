<?php
include"config/db.php";
session_start();
if(!isset($_SESSION['admin']))
header('location:login.php');
if(isset($_POST['submit']))
{
        $d=$_POST['fname'];
        $ra=$_POST['rank'];  
        $q1 = "SELECT * FROM categories where cat='$d'";
        $k=mysqli_query($c,$q1);
        $p=mysqli_num_rows($k);
        if($p>0)
              {
              echo " exist";        
              }else
              {
         if($ra!=null)
         {
         $q="INSERT INTO `categories`(cat,p_id) VALUES ('$d','$ra')";
         }else
         {
         $q="INSERT INTO `categories`(cat) VALUES ('$d')";
         }
         $l=mysqli_query($c,$q); 
         }
}
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>acceuil</title>   
    </head>
    <body>

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



<h2>HTML Forms</h2>
<form action="" method="post">
<label for="fname">catégories</label><br>
<input type="text" id="fname" name="fname" ><br>
<label for="cars">Choose :</label>
<select  id="cars" name="rank" >
<option value="<?php echo null;?>" >catégories mère  </option>
<ul>    

<?php
function cate($p_id=null)
{  
global $c;     
if($p_id==null)
     {
     $query = "SELECT * FROM categories where p_id is null ";
     }else
     {
     $query = "SELECT * FROM categories where p_id='$p_id' ";
     }
     $result = mysqli_query($c, $query);
     $p=mysqli_num_rows($result);    
     while($row=mysqli_fetch_assoc($result))
     {
     ?>
    
      <option  value="<?php echo $row['id']; ?> "><?php echo $row['cat']; ?>  </option>
      <?php    
      cate($row['id']) ;   
      }
}
?>
<ul> 
      <?php    
      echo  cate();
      ?>
</ul>
</ul>    
</select>
<input type="submit" name="submit" value="Submit"/>
</form> 
<script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
