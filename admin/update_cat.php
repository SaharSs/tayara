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
$pid=$row1['p_id'];   
$cat=$row1['cat'];   
}
}
if(isset($_POST['submit']))
{
$id_cat=$_POST['p_id'];
$cate=$_POST['catégorie'];
if($id!=$id_cat)
{    
$s="UPDATE categories SET cat='$cate',p_id='$i_cat'  where id= ".$id;
}else
{
    $s="UPDATE categories SET cat='$cate',p_id='$i_cat'  where id= ".$id;
}
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
  
<input type="text" name="catégorie"   value="<?php echo $cat ?>" >      
</td>    
</tr>    
<tr>
<td>
<select   name="p_id" >
 <option value="0"   <?php if($pid=='0') {echo 'selected';}?>>catégories mère  </option>    
<?php
function cate($p_id=0)
{  
global $c;  
global $pid; 
$query = "SELECT * FROM categories where p_id='$p_id'";
$result = mysqli_query($c,$query);
$p=mysqli_num_rows($result);    
while($row=mysqli_fetch_assoc($result))
{
    

?>    
<option  value="<?php echo $row['id']; ?>"  <?php if($pid==$row['id']) {echo 'selected';}?>><?php echo $row['cat']; ?>  </option>


<?php
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
    