<?php
include"config/db.php";
session_start();
if(!isset($_SESSION['admin']))
   header('location:login.php');
if(isset($_POST['btn-update']))
            {
            $n=$_POST['name'];
            $u=$_POST['username'];
            $p=$_POST['password'];
            $e=$_POST['email'];
            $et=$_POST['etat'];
            $ad=$_POST['adresse'];
            $post=$_POST['postcode'];
            $ph=$_POST['phone_number'];
            $ro=$_POST['role'];
            $q="select * from users where username='$u' or email='$e'";
            $r=mysqli_query($c,$q);
            $t=mysqli_num_rows($r);
               if($t==0)
                   {
                    if($_FILES['image']['name']!='')
                      {
                         $img=$_FILES['image']['name'];
                         $img1=$_FILES['image']['tmp_name'];
                         $ex=explode('.',$img);
                         $ex=end($ex);
                         $imgn=md5(rand(0,1000).'_'.$img).'.'.$ex;  
                         move_uploaded_file($img1,"images/avatar/".$imgn) ;   
                        } else
                        {
                        $img="default.png";
                        }
                       $s="insert into users (name,username,password,email,etat,image,adresse,postcode,phone_number,role)values('$n','$u','$p','$e','$et','$imgn','$ad','$post','$ph','$ro')";
                       $r1=mysqli_query($c,$s);         
                     }else
                  header("location:add_user.php");        
              }
    
    
    ?>
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


 <div class="container">
        <nav id="navbar-example2" class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="index.php">acceuil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">mol</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php 
          
        echo "<img src='images/avatar/".$_SESSION['admin']['image']. "' style='width:20px; border-radius:60%'/>";
     
          
          echo $_SESSION['admin']['name'];?></a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">modifier mon compte</a>
        <a class="dropdown-item" href="queries/logout.php">se déconnecter</a>
        </div>
        
    </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">utilisateurs</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="gest_users.php">liste des utilisateurs</a>
        <a class="dropdown-item" href="add_user.php">ajouter utilisateur</a>
        </div>
        
    </li>
  </ul>
</nav>

        </div>
<div class="container">
<form method="post" action="" enctype="multipart/form-data">
<table >
<tr>
<td>
<label id="for">name</label><br>    
<input type="text" name="name" id="for"   />  </td>
</tr>
<tr>
     
<td>
<label id="u">username</label><br>     
<input type="text" name="username" id="u" /> </td>
</tr>
<tr>
    
   
<td>
<label id="p">password</label><br>     
<input type="password" name="password" id="p"   /> </td>
</tr>
<tr>

<td>
<label id="e">email</label><br>        
<input type="text" name="email"  id="e" /> </td>
</tr>
<tr>

<td>
<label id="et">etat</label><br>        
<input type="text" name="etat" id="et" /> </td>
</tr>

<tr>
<td>
 <label id="i">image</label><br>
    
<input type="file" name="image" id="i"  /> </td>
</tr>
<tr>
    
<td>
<label id="a">adresse</label><br>    
<input type="text" name="adresse"  id="a"/> </td>
</tr>
<tr>
    
<td>
<label id="po">postcode</label><br>    
<input type="text" name="postcode"  id="po" /> </td>
</tr>
<tr>
    
<td>
<label id="ph">phone_number</label><br/>    
<input type="text" name="phone_number"  id="ph" /> </td>
</tr> 
<tr>
<tr>    
<td>
<label for="role">role</label><br/>
<select name="role" id="role">
<option value="webmaster">webmaster</option>
<option value="admin">admin</option>
<option value="user">user</option>
</select>
</td>    
</tr>     
<tr>
<td><br/>
<button type="submit" name="btn-update"><strong>ajouter</strong></button>
</td>
</tr>
</table>
</form>
</div>    
                      <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
