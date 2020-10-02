<?php
include('config/db.php');
session_start();
if(!isset($_SESSION['admin']))
   header('location:login.php');
?>
<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>acceuil</title>   
    </head>
    <body>
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
<?php
 $q="select* from users";
$r=mysqli_query($c,$q);

$l=mysqli_num_rows($r);
        
if($l>0)
{
?>    
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Nom d'utilisateur</th>
      <th scope="col">email</th>
      <th scope="col">teléphone</th>
    </tr>
  </thead>
  <tbody>
    <?php  
    while($row=mysqli_fetch_assoc($r)){
    ?>    
    <tr>
      <th scope="row"><?php echo $row['id'];?></th>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['username'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['phone_number'];?></td>
      
    </tr>
      <?php
    }
        ?>
  </tbody>
</table>    
<?php 
}
?>        
        
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
--------------------------------------------------------
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
    <body><div class="container">
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
        <div class="row">
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
    <?php if($_SESSION['admin']['role']=='webmaster'){?> <th scope="col">role</th>  <?php } ?>
        
      </tr>
      <tbody>
          <?php
        while($row=mysqli_fetch_assoc($s))
        {
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
      <?php if($_SESSION['admin']['role']=='webmaster'){?>  <td><?php echo $row['role'];?></td> <?php } ?>
        <td>
          <a href="update_user.php?id=<?=$row['id'];?>"><i class="fas fa-edit"></i></a>
          <a href="delete_user.php?id=<?=$row['id'];?>"><i class="fas fa-trash"></i></a>
        </td>
    </tr>
        <?php } ?>  
          
  </tbody>
</table>    
<a  href="add_user.php"class="btn btn-primary">Ajouter Utilisateur</a>    
          </div>
        
        
             
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
----------------------------------------------------------------
<?php

session_start();

if(isset($_SESSION['admin']))
   headxer('location:index.php');
?>
<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Authentification</title>    
    
    
    </head>
    <body>
        <div class="container">
            <form action="queries/submit_login.php" method="post">
  <div class="form-group">
    <label for="username">Nom d'utilisateur</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="nom d'utilisateur">
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="mot de passe">
  </div>
  <button type="submit" class="btn btn-primary">Se connecters</button>
</form>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
----------------------------------------------------------------------
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
    <body><div class="container">
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
        <div class="row">
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
    <?php if($_SESSION['admin']['role']=='webmaster'){?> <th scope="col">role</th>  <?php } ?>
        
      </tr>
      <tbody>
          <?php
        while($row=mysqli_fetch_assoc($s))
        {
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
      <?php if($_SESSION['admin']['role']=='webmaster'){?>  <td><?php echo $row['role'];?></td> <?php } ?>
        <td>
          <a href="update_user.php?id=<?=$row['id'];?>"><i class="fas fa-edit"></i></a>
          <a href="delete_user.php?id=<?=$row['id'];?>"><i class="fas fa-trash"></i></a>
        </td>
    </tr>
        <?php } ?>  
          
  </tbody>
</table>    
<a  href="add_user.php"class="btn btn-primary">Ajouter Utilisateur</a>    
          </div>
        
        
             
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
------------------------------------------------------------------------------
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
move_uploaded_file($img1,"images/avatar/".$imgn);    
}else
{
$imgn="default.png";    
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
    <title>acceuil</title>   
    </head>
    <body>
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
--------------------------------------------------------------------------------
<?php
session_start();
include('../admin/config/db.php');
if(!isset($_SESSION['user']))
   header('location:login_user.php');
if(isset($_GET['id']))
    $id=$_GET['id'];
$sid = $_SESSION['user']['id'];
$msg="SELECT m.*,(
    SELECT username from users where users.id = m.sender_id
)as username,
  (SELECT image from users where users.id = m.sender_id
)as  image
FROM `messages`as m where (m.r_id='$id' and m.sender_id='$sid') or (m.r_id='$sid' and m.sender_id='$id')";
$h=mysqli_query($c,$msg);
if(isset($_POST['envoyer']))
{
if(isset($_POST['message']) AND  !empty($_POST['message'])) {
$message = htmlspecialchars($_POST['message']);
    $date = date('Y-m-d H:i:s');
$q="insert into messages(r_id,sender_id,message,date) VALUES ('$id', '{$_SESSION['user']['id']}','$message','$date')";
$l=mysqli_query($c,$q);
}
}
?>
<html>
<body>
    <?php
    while($row=mysqli_fetch_assoc($h))
    {
        if($_SESSION['user']['id']==$row['sender_id']){
        echo "<img src='../admin/images/avatar/".$row['image']."' width='50' style='border-radius:50%'/>".$row['username']." à dit : ".$row['message']."<a href='deletus.php?msg_id=".$row['id']."&id_discussion=".$id."'>supprimer message</a><br>";   
    }else
        {
        
        echo "<img src='../admin/images/avatar/".$row['image']."' width='50' style='border-radius:50%'/>". $row['username']." à dit : ".$row['message']."<br>";
        }
    }
    ?>
      <form  action="" method="post">
         <label>message:</label>
     
         <br /><br />
         <textarea placeholder="Votre message" name="message"></textarea>
         <br /><br />
        <input type="submit"  name="envoyer" />
        
      </form>
    </body>
       </html>
---------------------------------------------------------------------------------------
<?php
session_start();
include('../admin/config/db.php');
if(!isset($_SESSION['user']))
   header('location:login_user.php');
if(isset($_GET['id']))
    $id=$_GET['id'];
$sid = $_SESSION['user']['id'];
$msg="SELECT m.*,(
    SELECT username from users where users.id = m.sender_id
)as username,
  (SELECT image from users where users.id = m.sender_id
)as  image
FROM `messages`as m where (m.r_id='$id' and m.sender_id='$sid') or (m.r_id='$sid' and m.sender_id='$id')";
$h=mysqli_query($c,$msg);
if(isset($_POST['envoyer']))
{
if(isset($_POST['message']) AND  !empty($_POST['message'])) {
$message = htmlspecialchars($_POST['message']);
    $date = date('Y-m-d H:i:s');
$q="insert into messages(r_id,sender_id,message,date) VALUES ('$id', '{$_SESSION['user']['id']}','$message','$date')";
$l=mysqli_query($c,$q);
}
}
?>
<html>
<body>
    <?php
    while($row=mysqli_fetch_assoc($h))
    {
        if($_SESSION['user']['id']==$row['sender_id']){
        echo "<img src='../admin/images/avatar/".$row['image']."' width='50' style='border-radius:50%'/>".$row['username']." à dit : ".$row['message']."<a href='deletus.php?msg_id=".$row['id']."&id_discussion=".$id."'>supprimer message</a><br>";   
    }else
        {
        
        echo "<img src='../admin/images/avatar/".$row['image']."' width='50' style='border-radius:50%'/>". $row['username']." à dit : ".$row['message']."<br>";
        }
    }
    ?>
      <form  action="" method="post">
         <label>message:</label>
     
         <br /><br />
         <textarea placeholder="Votre message" name="message"></textarea>
         <br /><br />
        <input type="submit"  name="envoyer" />
        
      </form>
    </body>
       </html>
       
---------------------------------------------------------------------------------------------------------
<?php
include"config/db.php";
session_start();
if(!isset($_SESSION['admin']))
header('location:login.php');
?>
<ul>  
<?php     
$query = "SELECT * FROM categories where p_id=0  ";
$result = mysqli_query($c, $query);
$p=mysqli_num_rows($result);    
while($row=mysqli_fetch_assoc($result))
{
?>
<li><?php echo  $row['cat'] ?></li>
<ul>    
 <?php     
$q = "SELECT * FROM categories where p_id=".$row['id'];
$r= mysqli_query($c, $q);
$k=mysqli_num_rows($result);    
while($row1=mysqli_fetch_assoc($r))
{
?>
    
    <li><?php echo  $row1['cat'] ?></li>
          
     <?php     
$q1 = "SELECT * FROM categories where p_id=".$row1['id'];
$r1= mysqli_query($c, $q1);
$i=mysqli_num_rows($result);    
while($row2=mysqli_fetch_assoc($r1))
{
?>
    <ul>   
    
    <li><?php echo  $row2['cat'] ?></li>
     
</ul>        
   
<?php    
}
}
?>
</ul>    
<?php    
}
?>



</ul>
---------------------------------------------------------------------------------------------
<?php
include"config/db.php";
session_start();
if(!isset($_SESSION['admin']))
header('location:login.php');
if(isset($_POST['submit']))
{
$d=$_POST['fname'];
$ra=$_POST['rank'];    
    
$q="INSERT INTO `categories`( p_id, cat) VALUES ('$ra','$d')";
$l=mysqli_query($c,$q);    
}
?>
<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>
   
<form action="" method="post">
  <label for="fname">catégories</label><br>
  <input type="text" id="fname" name="fname" ><br>
   
    <label for="cars">Choose :</label>
<select  id="cars" name="rank">
  
    <?php 
$query = "SELECT id FROM categories  ";
$result = mysqli_query($c, $query);
$row = mysqli_num_rows($result);
 
 for ($i =0; $i <= $row+1 ; $i++) {
	

?>
   
<option  value="<?php  echo $i ; ?>">  <?php  echo $i ; ?>  </option>
 
 
 <?php    } ?>
    

  </select>
<input type="submit" name="submit" value="Submit"/>
    
</form> 

</body>
</html>
--------------------------------
<?php
include"config/db.php";
session_start();
if(!isset($_SESSION['admin']))
header('location:login.php');
if(isset($_POST['submit']))
{
$d=$_POST['fname'];
$ra=$_POST['rank'];  
if($ra="catégories mère")
{
 $q="INSERT INTO `categories`(  cat,p_id) VALUES ('$d','0') ";
}else
$q="INSERT INTO `categories`(  cat,p_id) VALUES ('$d','$ra')";

 
    
$l=mysqli_query($c,$q);    
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>HTML Forms</h2>
<form action="" method="post">
<label for="fname">catégories</label><br>
<input type="text" id="fname" name="fname" ><br>
<label for="cars">Choose :</label>
<select  id="cars" name="rank" >
<option value="catégories mère" >catégories mère  </option>
<ul>    
<?php
    $query = "SELECT * FROM categories where p_id=0 ";
$result = mysqli_query($c, $query);
    
while($row=mysqli_fetch_assoc($result))
{
?>
    
<option  value="<?php echo $row['id']; ?> "><?php echo $row['cat']; ?>  </option>
<?php    
$q = "SELECT * FROM categories where p_id= ".$row['id'];
$r = mysqli_query($c, $q);

while($row1=mysqli_fetch_assoc($r))
{
?>
<ul>    
<option value="<?php echo $row1['id']; ?> "><?php echo $row1['cat']; ?>  </option>
</ul>    
<?php
}
}
?>
</ul>    
</select>
<input type="submit" name="submit" value="Submit"/>
</form> 
</body>
</html>

    