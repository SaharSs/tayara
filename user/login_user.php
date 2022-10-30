<?php
include('../admin/config/db.php');
session_start();

if(isset($_POST['submit']))
{
$u=$_POST['username'];    
$p=$_POST['password'];
$q="select * from users where (username='$u' and password='$p') AND (role='user') ";
    $r=mysqli_query($c,$q);
    $n=mysqli_num_rows($r);
    if($n>0)
    {
        $l=mysqli_fetch_assoc($r);
       $_SESSION['user']=$l;
        
        header('location:user.php');    
    }else{
          echo 'Vos cordonnées sont incorrectes veuillez <a href="login_user.php">se connecter de nouveau</a>';
    }

}

?>
<html>
    <head>
 
    <title>Authentification</title>    
    
    
    </head>
    <body>
    
   
            <form action="" method="post">
  <div class="form-group">
    <label for="username">Nom d'utilisateur</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="nom d'utilisateur">
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="mot de passe">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Se connecter</button>
</form>
        
    </body>
</html>