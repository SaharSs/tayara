<?php

include('config/db.php');
session_start();
if(!isset($_SESSION['admin']))
   header('location:login.php');
if(isset($_GET['id']))
{
     $id=$_GET['id'];
     $q="select * from users where id=".$id;
     $r=mysqli_query($c,$q);
     while($row=mysqli_fetch_assoc($r))
     {
     $na_user=$row['name'];
     $us_user=$row['username'];
     $pa_user=$row['password'];
     $em_user=$row['email'];
     $eta_user=$row['etat'];
     $adr_user=$row['adresse'];
     $postc_user=$row['postcode'];
     $phon_user=$row['phone_number'];  
     $i=$row['image'];    
     }
}
if(isset($_POST['submit']))
{
    $n_user=$_POST['name'];
    $u_user=$_POST['username'];
    $p_user=$_POST['password'];
    $e_user=$_POST['email'];
    $et_user=$_POST['etat'];
    $ad_user=$_POST['adresse'];
    $post_user=$_POST['postcode'];
    $phone_user=$_POST['phone_number'];
    $sq ="SELECT * FROM users WHERE (username = '$u_user' or password='$p_user' or email='$e_user' or phone_number='$phone_user') and id<>$id";
    $r=mysqli_query($c,$sq);
    $total = mysqli_num_rows($r);
    if($total==0)
    {
        if($_FILES['image']['name']!=null)
         {
         $img=$_FILES['image']['name'];
         $img1=$_FILES['image']['tmp_name'];
         $exp=explode('.',$img);
         $exp=end($exp);
         $imgn=md5(date('Y-m-d H:i:s').' '.$img).'.'.$exp;    
         move_uploaded_file($img1,"images/avatar/".$imgn);
         $d="select image from users where id=".$id;
         $k=mysqli_query($c,$d);
         $row=mysqli_fetch_assoc($k);
            if($row['image']!=null)
               unlink('images/avatar/'.$row['image']);
        $s="UPDATE users SET name='$n_user',username='$u_user',password='$p_user',email='$e_user',etat='$et_user',image='$imgn',adresse='$ad_user',postcode='$post_user',  phone_number='$phone_user' WHERE id='$id'";
        }else
        {
        $s="UPDATE users SET name='$n_user',username='$u_user',password='$p_user',email='$e_user',etat='$et_user',adresse='$ad_user',postcode='$post_user',  phone_number='$phone_user' WHERE id='$id'";
        }
     $l=mysqli_query($c,$s);
} else
{
 echo'data can not update';    
}
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
<label id="name">name</label> <br>   
<input type="text" name="name" id="name" value="<?=$na_user?>">    
</td>    
</tr>
<tr>
<td>
<label id="username">username</label><br>    
<input type="text" name="username" id="username" value="<?=$na_user?>">      
</td>    
</tr>    
<tr>
<td>
<label id="password">password</label><br>    
<input type="text" name="password" id="password" value="<?=$pa_user?>">    
</td>    
</tr>    
<tr>
<td>
<label id="email">email</label><br>    
<input type="email" name="email" id="email" value="<?=$em_user?>">    
</td>    
</tr>
<tr>
<td>
<label id="etat">etat</label><br>    
<input type="text" name="etat" id="etat" value="<?=$eta_user?>">    
</td>    
</tr>
<tr>
<td>    
 


<label id="image">image</label><br>

   
<input type="file" name="image" id="image">    
</td> 
    
</tr> 
<tr>
<td>
<label id="adresse">adresse</label><br>    
<input type="text" name="adresse" id="adresse" value="<?=$adr_user?>">    
</td>    
</tr> 
<tr>
<td>    
<label id="postcode">postcode</label><br>    
<input type="text" name="postcode" id="postcode" value="<?=$postc_user?>">    
</td>    
</tr>
<tr>
<td>    
<label id="phone_number">phone number</label><br>    
<input type="text" name="phone_number" id="phone_number" value="<?=$phon_user?>">    
</td>    
</tr>
<tr> 
<td>    
<button type="submit" name="submit">update</button>
</td>    
</tr>
  
</table>    
</form> 
        </div>

                <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>