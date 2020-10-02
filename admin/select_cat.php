<?php
include"config/db.php";
session_start();
if(!isset($_SESSION['admin']))
header('location:login.php');
?>
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
<li><?php echo  $row['cat'] ?></li>
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

    