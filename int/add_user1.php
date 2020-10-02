<?php
include"../admin/config/db.php";
session_start();

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
move_uploaded_file($img1,"images/avatar1/".$imgn) ;   
}else
{
$img="default.png";
}
  $s="insert into users (name,username,password,email,etat,image,adresse,postcode,phone_number,role)values('$n','$u','$p','$e','$et','$imgn','$ad','$post','$ph','$ro')";
    $r1=mysqli_query($c,$s);         
    }else
header("location:add_user1.php");        
}
    
    
    ?>
<html>
    <head>
    
    <title>acceuil</title>   
    </head>
    <body>
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

    </body>
</html>