<?php
include"../admin/config/db.php";
session_start();
if (!isset($_SESSION['user']))
    header('location:login_user.php');
if(isset($_POST['annonce']))
{
$pid=$_POST['pid'];
$ti=$_POST['titre'];
$an=$_POST["texte"];
$prix=$_POST['prix'];
$ad=$_POST['adresse'];
$ph=$_POST['phone_number'];
$img=$_FILES['image']['name'];
$img1=$_FILES['image']['tmp_name'];
$ex=explode('.',$img);
$ex=end($ex);
$imgn=md5(rand(0,1000).'_'.$img).'.'.$ex;  
move_uploaded_file($img1,"images/avatar1/".$imgn) ;   
$s="insert into annonce (pid,a_id,titre,texte_annonce,prix,adresse,phone_number,cas)values('$pid','{$_SESSION['user']['id']}','$ti','$an','$prix','$ad','$ph',1)";
$r1=mysqli_query($c,$s);
$annonce_id = mysqli_insert_id($c);
$t="insert into image_an (image,i_id) values ('$imgn','$annonce_id')";
$r2=mysqli_query($c,$t);
    
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
<label id="for">catégories</label><br>    
<select name="pid" id="for">
<option  >choisissez  </option>
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

    

</tr>
<tr>
     
<td>
<label id="u">titre</label><br>     
<input type="text" name="titre" id="u" /> </td>
</tr>
<tr>
    
   
<td>
<label id="p">texte de l'annonce</label><br>     
<input type="text" name="texte" id="p"   /> </td>
</tr>
<tr>

<td>
<label id="e">prix</label><br>        
<input type="text" name="prix"  id="e" /> </td>
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
<label id="ph">phone_number</label><br/>    
<input type="text" name="phone_number"  id="ph" /> </td>
</tr> 
<tr>
<tr>
<td><br/>
<button type="submit" name="annonce"><strong>submit</strong></button>
</td>
</tr>
</table>
</form>

    </body>
</html>
