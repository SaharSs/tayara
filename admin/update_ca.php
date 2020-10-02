<?php
include('config/db.php');
session_start();
if(!isset($_SESSION['admin']))
   header('location:login.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
$q2="select * from  categories where id=".$id;
$re=mysqli_query($c,$q2);
 while($row1=mysqli_fetch_assoc($re))
 {
  $cat=$row1['cat'];   
}
}
if(isset($_POST['submit']))
{
$p=$_POST['p_id'];
    
$ca=$_POST['cat'];
$s="UPDATE categories SET cat='$p'  where id='$id' ";
$l=mysqli_query($c,$s);
}
?>
<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>acceuil</title>   
    </head>
    <body>

<form method="post" action="" >       
<table >

<tr>
<td>
  
<input type="text" name="p_id" id="p_id"  value="<?php echo $cat ?>" >      
</td>    
</tr>    
<tr>
<td>
<select  id="cars" name="cat" >
 <option value="catégories mère"   >catégories mère  </option>    
<?php
  
function cate($p_id=0)
{  
global $c;  
global $id; 
$query = "SELECT * FROM categories where p_id='$p_id' ";
$result = mysqli_query($c, $query);
$p=mysqli_num_rows($result);    
while($row=mysqli_fetch_assoc($result))
{
    
 if($row['id']==$id)
     
  {
?>
<option  value="<?php echo $row['id']; ?>" selected ><?php echo $row['cat']; ?>  </option>
<?php 
  }
if($row['id']!=$id)
{
    ?>
    
  <option  value="<?php echo $row['id']; ?>"  ><?php echo $row['cat']; ?>  </option>
 <?php
}
cate($row['id']);
}
}
?>
<?php    
   echo  cate();

    ?>
    </select>
</td>    
</tr>    
    <tr> 
<td>    
<button type="submit" name="submit">update</button>
</td>    
</tr>
  
</table>    
</form> 
        

                <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
    